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
class Update extends FormRequest
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

}
