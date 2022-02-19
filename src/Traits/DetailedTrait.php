<?php

namespace ammahmoodtork\accounting\Traits;

use ammahmoodtork\accounting\Models\Detailed;
use ammahmoodtork\accounting\Models\DocumentDetails;
use ammahmoodtork\accounting\Models\Setting;
use Exception;

trait DetailedTrait
{
    public function select($id = null, $page = null, $name = null, $code = null, $parent_id = null, $source_id = null)
    {
        if (empty($id)) {
            $where_conditions = [];
            if (!empty($name)) $where_conditions[] = ['name', 'like', '%' . $name . '%'];
            if (!empty($code)) $where_conditions[] = ['code', 'like', '%' . $code . '%'];
            if (!empty($parent_id)) $where_conditions[] = ['parent_id', $parent_id];
            if (!empty($source_id)) $where_conditions[] = ['source_id', $source_id];
            $result = Detailed::where($where_conditions);
            if (!empty($page)) {
                return $result->paginate(20);
            }
            return $result->get();
        }
        return Detailed::where('id' , $id)->first();
    }

    public function add($name, $code = null, $parent_id = null, $source_id = null)
    {
        $data = [
            'name' => $name
        ];
        if (!empty($code)) $data['code'] = $code;
        else $data['code'] = $this->generate_code($parent_id);
        if (!empty($parent_id)) $data['parent_id'] = $parent_id;
        if (!empty($source_id)) $data['source_id'] = $source_id;
        else $data['source_id'] = 3;
        return Detailed::create($data);
    }
    public function edit($id, $name, $code = null, $parent_id = null, $source_id = null)
    {
        $detailed = Detailed::where('id', $id)->first();
        if (empty($detailed)) {
            throw new Exception('Object Not Found', 404);
        }
        $data = [
            'name' => $name
        ];
        if (!empty($code)) $data['code'] = $code;
        if (!empty($parent_id)) $data['parent_id'] = $parent_id;
        if (!empty($source_id)) $data['source_id'] = $source_id;
        return $detailed->update($data);
    }

    public function delete($id)
    {
        if (DocumentDetails::where('detailed_id', $id)->count() > 0) {
            throw new Exception('DEtailed Used in Documents and Counld Not delete it', 400);
        }
        $detailed = Detailed::where('id', $id)->first();
        if (empty($detailed)) {
            throw new Exception('Object Not Found', 404);
        }
        return $detailed->delete();
    }


    private function generate_code($parent_id = null)
    {
        $setting = Setting::first();
        if (empty($parent_id)) {
            $code = Detailed::whereNull('parent_id')->orderBy('id', 'DESC')->first();
            if (empty($code)) {
                $code = 1;
            } else {
                $code = ((int)$code->code) + 1;
            }
            $code = str_pad($code, $setting->len_t1, $setting->char, STR_PAD_LEFT);
        } else {
            $result = Detailed::where('id', $parent_id)->with('detailed_parent')->first();
            $code = Detailed::where('parent_id', $parent_id)->orderBy('id', 'DESC')->first();
            if (empty($code)) {
                $code = 1;
            } else {
                $code = $code->code;
                $code = substr($code, empty($result->detailed_parent) ? $setting->len_t2 : $setting->len_t1 + $setting->len_t2, 2);
                $code = (((int)$code) + 1);
            }
            $code = $result->code . str_pad($code, empty($result->detailed_parent) ? $setting->len_t2 : $setting->len_t3, $setting->char, STR_PAD_LEFT);
        }
        return $code;
    }
}
