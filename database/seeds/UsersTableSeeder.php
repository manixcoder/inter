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
		DB::table('users')->delete();
		$userData = array(
			array(
				'id' => 1,
				'users_role' => '1',
				'profile_image' => 'userimg-icon.png',
				'org_image' => 'userimg-icon.png',
				'name' => 'Super Admin',
				'org_name' => '',
				'email' => 'admin@gmail.com',
				'phone' => '8054251404',
				'password' => bcrypt('Qwert@123'),
				'otp' => '0000',
				'gender' => '1',
				'dob' => '',
				'designation' => 'administrator',
				'requirter_overview' => '',
				'address' => '',
				'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'create_by' => '',
				'country_id' => '0',
				'email_verified_at' => date("Y-m-d H:i:s"),
				'remember_token' => null,
				'status' => '0',
				'last_login' => date("Y-m-d H:i:s"),
				'temp_pass' => '',
				'website' => '',
				'industry' => '',
				'company_size' => '',
				'headquarters' => '',
				'specialties' => '',
				'type' => '',
				'founded' => '',
				'created_at' =>  date("Y-m-d H:i:s"),
				'updated_at' =>  date("Y-m-d H:i:s"),
			),

		);
		DB::table('users')->insert($userData);
	}
}
