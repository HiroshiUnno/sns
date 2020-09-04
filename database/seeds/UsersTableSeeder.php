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
          [
            'id'=>'1',
            'name' => 'Hiroshi',
            'email' => 'id1@test',
            'password' => Hash::make('my_secure_password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
          ],
          [
            'id'=>'2',
            'name' => 'Ayaka',
            'email' => 'id2@test',
            'password' => Hash::make('my_secure_password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
          ],
          [
            'id'=>'3',
            'name' => 'Ren',
            'email' => 'id3@test',
            'password' => Hash::make('my_secure_password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
          ],
          [
            'id'=>'4',
            'name' => 'Rui',
            'email' => 'id4@test',
            'password' => Hash::make('my_secure_password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
          ]
        ]);
    }
}
