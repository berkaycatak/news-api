<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

}
