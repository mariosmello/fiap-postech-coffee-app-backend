<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnableToDeleteResource extends JsonResource
{
    protected \Throwable $e;

    public function __construct(\Throwable $e)
    {
        $this->e = $e;
    }

    public function toArray($request)
    {
        return [
            'message' => $this->e->getMessage()
        ];
    }
}
