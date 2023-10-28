<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderFoundResource extends ResourceCollection
{

    public $collects = OrderCreatedResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
