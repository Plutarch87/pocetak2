<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('RoleUserTableSeeder');
	}

}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Player',
            ],
            [
                'name' => 'Spectator'
            ]

        ];
        DB::table('roles')->delete();
        foreach($roles as $role)
        {
            Role::create($role);
        }
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('adminadmin'),
                'img' => 'storage/images/default.png',
            ],
            [
                'name' => 'UserA',
                'email' => 'user1@user.com',
                'password' => bcrypt('adminadmin'),
                'img' => 'storage/images/default.png',
            ],
            [
                'name' => 'UserB',
                'email' => 'user2@user.com',
                'password' => bcrypt('adminadmin'),
                'img' => 'storage/images/default.png',
            ],
            [
                'name' => 'UserC',
                'email' => 'user3@user.com',
                'password' => bcrypt('adminadmin'),
                'img' => 'storage/images/default.png',
            ]

        ];
        DB::table('users')->delete();
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}

class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();

        $roles = [
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ],
            [
                'user_id' => 3,
                'role_id' => 2,
            ],
            [
                'user_id' => 4,
                'role_id' => 2,
            ]

        ];
        DB::table('role_user')->delete();
        foreach($roles as $role)
        {
            DB::table('role_user')->insert($role);
        }
    }
}
