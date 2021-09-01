<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteSeeder extends Seeder
{
    public function run()
    {
        Website::create([
            'name' => 'Test Website',
            'url' => 'https://test.com',
            'user_id' => 1,
        ]);
        Website::create([
            'name' => 'Test Website 2',
            'url' => 'https://test2.com',
            'user_id' => 1,
        ]);
    }
}
