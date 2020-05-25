<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = [
        ['id' => 1, 'name' => "Super Admin", 'email' => 'admin@mail.com', 'password' => 'mypassword']
    ];

        foreach ($items as $item) {
        User::create($item);
    }
    }
}
