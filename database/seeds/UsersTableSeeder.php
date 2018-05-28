<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::query()->insert($users->makeVisible(['password','remeber_token'])->toArray());

        $user = User::query()->find(1);
        $user->name = '味千年';
        $user->email = 'DaQian25@163.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
