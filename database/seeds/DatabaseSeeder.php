<?php

use Illuminate\Database\Seeder;
use App\Gender;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        
        DB::table('users')->insert([
            'name' => 'Gabriel Sevilla',
            'email' => 'moncadaeli567@gmail.com',
            'password' => bcrypt('gabrieladmin'),
            'telefono' => '83218725',
            'rol' => 'admin',
        ]);

        
    



    }
}
