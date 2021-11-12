<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // used in dev mode only
        $users = [
            ['Admin', 'admin@gandewalana.com', 'gandewalanadev123', 'https://ui-avatars.com/api/?name=Admin'],
            ['User', 'student@gandewalana.com', 'gandewalanadev123', 'https://ui-avatars.com/api/?name=User'],
        ];

        foreach ($users as $user) {
            $register = new User;
            $register->name = ucwords(strtolower($user[0]));
            $register->email = strtolower($user[1]);
            $register->password = Hash::make($user[2]);
            $register->email_verified_at = \Carbon\Carbon::now();
            $register->avatar = $user[3];
            $register->save();
            $register->syncRoles($user[0]);

            if ($user[0] == 'Admin') {
                $register->assignRole('User');
            }
        }
    }
}
