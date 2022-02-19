<?php

namespace ammahmoodtork\accounting\Virtual\Request\Topic;

use ammahmoodtork\accounting\Models\Setting;
use ammahmoodtork\accounting\Models\Topics;
use ammahmoodtork\accounting\Models\Year;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Detaileds request",
 *      description="Store Detaileds request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class Insert extends FormRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new Detailed",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="code",
     *      description="Code of the new Detailed",
     *      example="This is new Detailed's code"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *      title="min_debtor",
     *      description="'Min Debtor",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $min_debtor;

    /**
     * @OA\Property(
     *      title="max_debtor",
     *      description="'Max Debtor",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $max_debtor;

    /**
     * @OA\Property(
     *      title="min_creditor",
     *      description="'Min Creditor",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $min_creditor;

    /**
     * @OA\Property(
     *      title="max_creditor",
     *      description="'Max Creditor",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $max_creditor;

    /**
     * @OA\Property(
     *      title="year_id",
     *      description="'Source's id of the new Detailed",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $year_id;

    /**
     * @OA\Property(
     *      title="topic_group_id",
     *      description="'Group's id of the new Topic",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $topic_group_id;

    /**
     * @OA\Property(
     *      title="topic_source_id",
     *      description="'Source's id of the new Topic",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $topic_source_id;

    /**
     * @OA\Property(
     *      title="parent_id",
     *      description="Parent Detailed",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $parent_id;



    public function rules()
    {
        return [
            'name'  => ['required'],
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        if (empty($data['code'])) {
            $setting = Setting::first();
            if (empty($data['parent_id'])) {
                $code = Topics::whereNull('parent_id')->orderBy('id', 'DESC')->first();
                if (empty($code)) {
                    $code = 1;
                } else {
                    $code = ((int)$code->code) + 1;
                }
                $data['code'] = str_pad($code, $setting->len_k, $setting->char, STR_PAD_LEFT);
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
                $data['code'] = $result->code . str_pad($code, empty($result->topic_parent) ? $setting->len_m : $setting->len_m2, $setting->char, STR_PAD_LEFT);
            }
        }
        if (empty($data['min_debtor'])) {
            $data['min_debtor'] = 0;
        }
        if (empty($data['max_debtor'])) {
            $data['max_debtor'] = 0;
        }
        if (empty($data['min_creditor'])) {
            $data['min_creditor'] = 0;
        }
        if (empty($data['max_creditor'])) {
            $data['max_creditor'] = 0;
        }
        if (empty($data['year_id'])) {
            $data['year_id'] = Year::orderBy('id' , 'DESC')->first()->id;
        }
        return $data;
    }
}
