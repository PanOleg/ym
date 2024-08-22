<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            Company::factory()->count(5)->create(['user_id' => $user->id]);
        }
    }
}
