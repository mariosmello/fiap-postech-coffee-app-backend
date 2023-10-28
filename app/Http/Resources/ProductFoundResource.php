<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\ProductEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductFoundResource extends ResourceCollection
{

    public $collects = ProductCreatedResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
