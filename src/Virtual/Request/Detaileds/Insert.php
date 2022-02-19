<?php

namespace ammahmoodtork\accounting\Virtual\Request\Detaileds;

use ammahmoodtork\accounting\Models\Detailed;
use ammahmoodtork\accounting\Models\Setting;
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
     *      title="source_id",
     *      description="'Source's id of the new Detailed",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $source_id;

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
            'source_id' => ['required']
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        if (empty($data['code'])) {
            $setting = Setting::first();
            if (empty($data['parent_id'])) {
                $code = Detailed::whereNull('parent_id')->orderBy('id', 'DESC')->first();
                if (empty($code)) {
                    $code = 1;
                } else {
                    $code = ((int)$code->code) + 1;
                }
                $data['code'] = str_pad($code, $setting->len_t1, $setting->char, STR_PAD_LEFT);
            } else {
                $result = Detailed::where('id', $data['parent_id'])->with('detailed_parent')->first();
                $code = Detailed::where('parent_id', $data['parent_id'])->orderBy('id', 'DESC')->first();
                if (empty($code)) {
                    $code = 1;
                } else {
                    $code = $code->code;
                    $code = substr($code, empty($result->detailed_parent) ? $setting->len_t2 : $setting->len_t1 + $setting->len_t2, 2);
                    $code = (((int)$code) + 1);
                }
                $data['code'] = $result->code . str_pad($code, empty($result->detailed_parent) ? $setting->len_t2 : $setting->len_t3, $setting->char, STR_PAD_LEFT);
            }
        }
        return $data;
    }
}
