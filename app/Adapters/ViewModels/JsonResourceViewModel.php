<?php

namespace App\Adapters\ViewModels;

use App\Domain\Interfaces\ViewModel;
use Illuminate\Http\Resources\Json\JsonResource;

class JsonResourceViewModel implements ViewModel
{
    private JsonResource $resource;

    public function __construct(JsonResource $resource, ?string $message = null)
    {
        $this->resource = $resource;
        if ($message) {
            $this->resource->additional(['message' => $message]);
        }
    }

    public function getResource(): JsonResource
    {
        return $this->resource;
    }
}
