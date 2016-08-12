<?php

use App\Role;
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
