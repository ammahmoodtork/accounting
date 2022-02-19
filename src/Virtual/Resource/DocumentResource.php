<?php

namespace ammahmoodtork\accounting\Virtual\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     title="DocumentResource",
 *     description="Document resource",
 *     @OA\Xml(
 *         name="DocumentResource"
 *     )
 * )
 */
class DocumentResource extends JsonResource
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