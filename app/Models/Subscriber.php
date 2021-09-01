<?php

namespace Database\Seeders;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subscriber extends Model
{
    protected $fillable =[
        'email',
        'website_id',
    ];

    public function website()
    {
        return $this->hasOne(Website::class, 'id', 'website_id');
    }
}
