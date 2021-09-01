<?php

namespace Database\Seeders;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Website extends Model
{
    protected $fillable =[
        'name',
        'url',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
