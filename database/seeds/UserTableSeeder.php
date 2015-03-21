<?php
use Illuminate\Database\Seeder;
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {
      DB::table('users')->delete();
 
      App\User::create(array(
          'username' => 'firstuser',
          'password' => Hash::make('first_password')
      ));
 
      App\User::create(array(
          'username' => 'seconduser',
          'password' => Hash::make('second_password')
      ));
  }
 
}