<?php

namespace ammahmoodtork\accounting\Virtual\Request\Document;

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
     *      title="des",
     *      description="des of the new Document",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $des;

    /**
     * @OA\Property(
     *      title="order",
     *      description="'order of the new Document",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $order;

    /**
     * @OA\Property(
     *      title="type_id",
     *      description="type_id",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $type_id;

    /**
     * @OA\Property(
     *      title="state_id",
     *      description="state id",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $state_id;

    /**
     * @OA\Property(
     *      title="doc_id_rel",
     *      description="related doc id",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $doc_id_rel;

    /**
     * @OA\Property(
     *      title="document_details",
     *      description="document details",
     *      format="array",
     *      example=1
     * )
     *
     * @var array
     */
    public $document_details;



    public function rules()
    {
        return [
            'des'  => ['required'],
            'document_details' =>['required']
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        if (empty($data['year_id'])) {
            $data['year_id'] = Year::orderBy('id' , 'DESC')->first()->id;
        }
        if (empty($data['order'])) {
            $data['order'] = 0;
        }
        return $data;
    }
}
