<?php

namespace ammahmoodtork\accounting\Virtual\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     title="DetailedResource",
 *     description="Detailed resource",
 *     @OA\Xml(
 *         name="DetailedResource"
 *     )
 * )
 */
class DetailedResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Detailed[]
     */
    private $data;
}