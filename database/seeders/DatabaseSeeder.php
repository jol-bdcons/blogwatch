<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => config('app.admin.admin_name'),
           'email' => config('app.admin.admin_email'),
           'email_verified_at' => now(),
           'password' => Hash::make(config('app.admin.admin_password'))
        ]);

        User::factory(10)->hasPosts(3)->create();
    }
}
