<?php

namespace ammahmoodtork\accounting\Virtual\Model;

/**
 * @OA\Schema(
 *     title="Document",
 *     description="Document model",
 *     @OA\Xml(
 *         name="Document"
 *     )
 * )
 */
class Document
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
     *     title="des",
     *     description="des",
     *     format="string",
     *     example='doc details'
     * )
     *
     * @var string
     */
    private $des;

    /**
     * @OA\Property(
     *     title="order",
     *     description="order",
     *     format="intiger",
     *     example=0
     * )
     *
     * @var string
     */
    private $order;

    /**
     * @OA\Property(
     *     title="Year Id",
     *     description="Year Id",
     *     format="intiger",
     *     example=0
     * )
     *
     * @var string
     */
    private $year_id;

    /**
     * @OA\Property(
     *     title="Doc Id Rel",
     *     description="Doc Id Rel",
     *     format="intiger",
     *     example=0
     * )
     *
     * @var string
     */
    private $doc_id_rel;

    /**
     * @OA\Property(
     *     title="Type Id",
     *     description="Type Id",
     *     format="intiger",
     *     example=0
     * )
     *
     * @var string
     */
    private $type_id;

    /**
     * @OA\Property(
     *     title="State Id",
     *     description="State Id",
     *     format="intiger",
     *     example=0
     * )
     *
     * @var string
     */
    private $state_id;
    /**
     * @OA\Property(
     *     title="Document Details",
     *     description="Document Details",
     *     format="array",
     *     example=0
     * )
     *
     * @var string
     */
    private $document_details;

}