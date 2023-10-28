<?php

namespace App\Models;

use App\Domain\Interfaces\CategoryEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements CategoryEntity
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sequence',
    ];

    public function getName():string
    {
        return $this->attributes['name'];
    }
}
