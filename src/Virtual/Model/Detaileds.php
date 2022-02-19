<?php

namespace ammahmoodtork\accounting\Virtual\Model;

/**
 * @OA\Schema(
 *     title="Detaileds",
 *     description="Detaileds model",
 *     @OA\Xml(
 *         name="Detaileds"
 *     )
 * )
 */
class Detaileds
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new Detaileds",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Code",
     *     example="000000000001",
     *     format="string",
     *     type="string"
     * )
     *
     * @var \string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Source Id",
     *     description="Source Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var \integer
     */
    private $source_id;

    /**
     * @OA\Property(
     *     title="Parent Id",
     *     description="Parent Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var \integer
     */
    private $parent_id;

    /**
     * @OA\Property(
     *     title="Detailed Source",
     *     description="Detailed Source model"
     * )
     *
     * @var \App\Virtual\Model\DetailedSource
     */
    private $detailed_source;


    /**
     * @OA\Property(
     *     title="Detailed Parent",
     *     description="Detailed Parent model"
     * )
     *
     * @var \App\Virtual\Models\Detailed
     */
    private $detailed_parent;

}