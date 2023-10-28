<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\CategoryEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    protected CategoryEntity $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function toArray($request = [])
    {
        return [
            'name' => $this->category->getName(),
        ];
    }
}
