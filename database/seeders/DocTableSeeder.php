<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doc;

class DocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doc::factory()->count(100)->create();
    }
}
