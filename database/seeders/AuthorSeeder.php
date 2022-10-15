<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Petition;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()
            ->count(3)
            ->has(Petition::factory()->count(10))
            ->create();
    }
}
