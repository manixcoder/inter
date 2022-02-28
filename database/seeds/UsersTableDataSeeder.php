<?php

use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
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
				'id'					=> 1,
				'users_role'			=> '1',
				'profile_image'			=> '',
				'org_image'				=> 'userimg-icon.png',
				'name'					=> 'Super Admin',
				'org_name'				=> 'Super Admin',
				'email'					=> 'admin@gmail.com',
				'phone'					=> '9876543210',
				'password'				=> bcrypt('Qwert@123'),
				'otp'					=> '0000',
				'gender'				=> '1',
				'dob' 					=> date("Y-m-d"),
				'designation'			=> 'Manager',
				'requirter_overview' 	=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
				'address'				=> 'Mumbai, India',
				'about'					=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'create_by'				=> 'Super Admin',
				'country_id'			=> '0',
				'email_verified_at'		=> date("Y-m-d H:i:s"),
				'remember_token'		=> null,
				'status'				=> '0',
				'last_login'			=> date("Y-m-d H:i:s"),
				'temp_pass'				=> 'Qwert@123',
				'website'				=> 'https://theinternify.com/',
				'industry'				=> 'IT',
				'company_size'			=> '100',
				'headquarters'			=> 'Mumbai, India',
				'specialties'			=> 'IT',
				'type'					=> 'IT',
				'founded'				=> '2021',
				'created_at'			=>  date("Y-m-d H:i:s"),
				'updated_at' 			=>  date("Y-m-d H:i:s"),
			),

		);
		DB::table('users')->insert($userData);
	}
}
