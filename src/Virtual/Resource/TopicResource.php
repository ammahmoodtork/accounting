<?php

namespace ammahmoodtork\accounting\Virtual\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     title="TopicResource",
 *     description="Topic resource",
 *     @OA\Xml(
 *         name="TopicResource"
 *     )
 * )
 */
class TopicResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Topic[]
     */
    private $data;
}