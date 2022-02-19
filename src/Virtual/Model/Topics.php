<?php

namespace ammahmoodtork\accounting\Virtual\Model;

/**
 * @OA\Schema(
 *     title="Topics",
 *     description="Topics model",
 *     @OA\Xml(
 *         name="Topics"
 *     )
 * )
 */
class Topics
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
     *      description="Name of the new Topics",
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
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Min Debtor",
     *     description="Min Debtor",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $min_debtor;

    /**
     * @OA\Property(
     *     title="Max Debtor",
     *     description="Max Debtor",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $max_debtor;

    /**
     * @OA\Property(
     *     title="Min Creditor",
     *     description="Min Creditor",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $min_creditor;

    /**
     * @OA\Property(
     *     title="Max Creditor",
     *     description="Max Creditor",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $max_creditor;

    /**
     * @OA\Property(
     *     title="Year Id",
     *     description="Year Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $year_id;

    /**
     * @OA\Property(
     *     title="Topic Group Id",
     *     description="Topic Group Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $topic_group_id;

    /**
     * @OA\Property(
     *     title="Topic Source Id",
     *     description="Topic Source Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $topic_source_id;

    /**
     * @OA\Property(
     *     title="Parent Id",
     *     description="Parent Id",
     *     example="1",
     *     format="int64",
     *     type="int64"
     * )
     *
     * @var integer
     */
    private $parent_id;


}