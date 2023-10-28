<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderProductCollectionResource extends ResourceCollection
{

    public $collects = OrderProductResource::class;

}
