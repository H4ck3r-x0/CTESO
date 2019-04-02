<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'SuperAdmin',
          'email' => 'superadmin@gmail.com',
          'password' => bcrypt('superadmin'),
          'id_number' => '123456789',
          'passport_number' => '12345',
          'phone_number' => '0584874873',
          'admin' => 0,
          'superAdmin' => 1,

      ]);
      DB::table('users')->insert([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('admin'),
          'id_number' => '123456789',
          'passport_number' => '12345',
          'phone_number' => '0584874873',
          'admin' => 1,
          'superAdmin' => 0,

      ]);
    }
}
