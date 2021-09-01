<?php

namespace Database\Seeders;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable =[
        'title',
        'description',
        'content',
        'website_id',
    ];

    public function website()
    {
        return $this->hasOne(Website::class, 'id', 'website_id');
    }
}
