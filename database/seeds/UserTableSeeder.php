<?php


use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        //we need to empty linked table as well
        DB::table('role_user')->truncate();


        //we need to get role out of database 
        $adminRole = Role::where('name', 'admin')->first(); //get first instance you find
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        //now we have role information we start creating users
        $admin = User::create([
            'name'=>'Admin User',
            'email'=>'nabeel2029@gmail.com',
            'password'=> Hash::make('mira2146')
            ]);

        $author = User::create([
             'name'=>'Author User',
             'email'=>'author@gmail.com',
             'password'=> Hash::make('study123')
           ]);
        
        
        $user = User::create([
            'name'=>'Generic User',
            'email'=>'user@gmail.com',
            'password'=> Hash::make('study2146')
          ]);   


        //now assign roles to users
        
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

        //run the database seed 
    }
}
