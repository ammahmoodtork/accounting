<?php

namespace ammahmoodtork\accounting\Traits;

use ammahmoodtork\accounting\Models\DocumentDetails;
use ammahmoodtork\accounting\Models\Setting;
use ammahmoodtork\accounting\Models\Topics;
use ammahmoodtork\accounting\Models\Year;
use Exception;

trait TopicTrit
{

    /**
     * Select List Of Topic
     *
     * @param integer $id Topic id for select one record
     * @param integer $page page number, send null if you want to select all
     * @param string $name select Topic with its name filter
     * @param string $code select Topic with its code filter
     * @param integer $parent_id select Topic with its parent_id filter
     * @author Amir Mahmoodtork <ammahmoodtork@gmail.com>
     * @return Topic
     */ 
    public function select($id = null, $page = null, $name = null, $code = null, $parent_id = null)
    {
        if (empty($id)) {
            $where_conditions = [];
            if (!empty($name)) $where_conditions[] = ['name', 'like', '%' . $name . '%'];
            if (!empty($code)) $where_conditions[] = ['code', 'like', '%' . $code . '%'];
            if (!empty($parent_id)) $where_conditions[] = ['parent_id', $parent_id];
            $result = Topics::where($where_conditions);
            if (!empty($page)) {
                return $result->paginate(20);
            }
            return $result->get();
        }
        return Topics::where('id', $id)->first();
    }


    /**
     * Insert a Topic
     *
     * @param string $name Topic name
     * @param string $code Topic code (send null to generate it automaticly)
     * @param integer $parent_id Topic parent_id (sned null if it's a root topic)
     * @param double $min_debtor Topic min_debtor (send null if it's 0, default value is 0)
     * @param integer $min_creditor Topic min_creditor (send null if it's 0, default value is 0)
     * @param integer $max_debtor Topic max_debtor (send null if it's 0, default value is 0)
     * @param integer $max_creditor Topic max_creditor (send null if it's 0, default value is 0)
     * @param integer $topic_group_id Topic topic_group_id witch selected from topic_group (send null if it's 1, default value is 1)
     * @param integer $topic_source_id Topic topic_source_id witch selected from topic_source (send null if it's 1, default value is 1)
     * @param integer $year_id Topic year_id witch selected from year (default value is the last id of Year table)
     * @author Amir Mahmoodtork <ammahmoodtork@gmail.com>
     * @return Topic
     */ 
    public function add(
        $name,
        $code = null,
        $parent_id = null,
        $min_debtor = null,
        $min_creditor = null,
        $max_debtor = null,
        $max_creditor = null,
        $topic_group_id = null,
        $topic_source_id = null,
        $year_id = null
    ) {
        $data = [
            'name' => $name
        ];
        if (!empty($code)) $data['code'] = $code;
        else $data['code'] = $this->generate_code($parent_id);
        if (!empty($parent_id)) $data['parent_id'] = $parent_id;
        if (empty($min_debtor)) $data['min_debtor'] = 0; else $data['min_debtor'] = $min_debtor;
        if (empty($min_creditor)) $data['min_creditor'] = 0;else $data['min_creditor'] = $min_creditor;
        if (empty($max_debtor)) $data['max_debtor'] = 0;else $data['max_debtor'] = $max_debtor;
        if (empty($max_creditor)) $data['max_creditor'] = 0;else $data['max_creditor'] = $max_creditor;
        if (empty($topic_group_id)) $data['topic_group_id'] = 1;else $data['topic_group_id'] = $topic_group_id;
        if (empty($topic_source_id)) $data['topic_source_id'] = 1;else $data['topic_source_id'] = $topic_source_id;
        if (empty($year_id))
            $data['year_id'] = Year::orderBy('id', "DESC")->first()->id;
            else
            $data['year_id'] = $year_id;
        return Topics::create($data);
    }


    /**
     * Insert a Topic
     *
     * @param string $name Topic name
     * @param string $code Topic code (send null to generate it automaticly)
     * @param integer $parent_id Topic parent_id (sned null if it's a root topic)
     * @param double $min_debtor Topic min_debtor (send null if it's 0, default value is 0)
     * @param integer $min_creditor Topic min_creditor (send null if it's 0, default value is 0)
     * @param integer $max_debtor Topic max_debtor (send null if it's 0, default value is 0)
     * @param integer $max_creditor Topic max_creditor (send null if it's 0, default value is 0)
     * @param integer $topic_group_id Topic topic_group_id witch selected from topic_group (send null if it's 1, default value is 1)
     * @param integer $topic_source_id Topic topic_source_id witch selected from topic_source (send null if it's 1, default value is 1)
     * @author Amir Mahmoodtork <ammahmoodtork@gmail.com>
     * @return Topic
     */ 
    public function edit(
        $id,
        $name,
        $code = null,
        $parent_id = null,
        $min_debtor = null,
        $min_creditor = null,
        $max_debtor = null,
        $max_creditor = null,
        $topic_group_id = null,
        $topic_source_id = null,
        $year_id = null
    ) {
        $topic = Topics::where('id', $id)->first();
        if (empty($topic)) {
            throw new Exception('Object Not Found', 404);
        }

        $data = [
            'name' => $name
        ];
        if (!empty($code)) $data['code'] = $code;
        if (!empty($parent_id)) $data['parent_id'] = $parent_id;
        if (!empty($min_debtor)) $data['min_debtor'] = 0; 
        if (!empty($min_creditor)) $data['min_creditor'] = 0;
        if (!empty($max_debtor)) $data['max_debtor'] = 0;
        if (!empty($max_creditor)) $data['max_creditor'] = 0;
        if (!empty($topic_group_id)) $data['topic_group_id'] = 1;
        if (!empty($topic_source_id)) $data['topic_source_id'] = 1;
        if (!empty($year_id))
            $data['year_id'] = $year_id;
        return $topic->update($data);
    }

    public function delete($id)
    {
        if (DocumentDetails::where('topic_id', $id)->count() > 0) {
            throw new Exception('Topic Used in Documents and Counld Not delete it', 400);
        }
        $topic = Topics::where('id', $id)->first();
        if (empty($topic)) {
            throw new Exception('Object Not Found', 404);
        }
        return $topic->delete();
    }


    private function generate_code($parent_id)
    {
        $setting = Setting::first();
        if (empty($data['parent_id'])) {
            $code = Topics::whereNull('parent_id')->orderBy('id', 'DESC')->first();
            if (empty($code)) {
                $code = 1;
            } else {
                $code = ((int)$code->code) + 1;
            }
            $code = str_pad($code, $setting->len_k, $setting->char, STR_PAD_LEFT);
        } else {
            $result = Topics::where('id', $data['parent_id'])->with('topic_parent')->first();
            $code = Topics::where('parent_id', $data['parent_id'])->orderBy('id', 'DESC')->first();
            if (empty($code)) {
                $code = 1;
            } else {
                $code = $code->code;
                $code = substr($code, empty($result->topic_parent) ? $setting->len_m : $setting->len_m + $setting->len_m2, 2);
                $code = (((int)$code) + 1);
            }
            $code = $result->code . str_pad($code, empty($result->topic_parent) ? $setting->len_m : $setting->len_m2, $setting->char, STR_PAD_LEFT);
        }

        return $code;
    }
}
