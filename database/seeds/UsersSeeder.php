<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new user();
        $users->name = 'Tata Usaha';
        $users->username = 'admin';
        $users->email = 'tatausaha@siskes.com';
        $users->hak_akses = 'admin';
        $users->password = bcrypt('rahasia');
        $users->save();

        $users = new user();
        $users->name = 'Pemeriksaan';
        $users->username = 'pemeriksaan';
        $users->email = 'pemeriksaan@siskes.com';
        $users->hak_akses = 'pemeriksaan';
        $users->password = bcrypt('rahasia');
        $users->save();

        $users = new user();
        $users->name = 'Apotek';
        $users->username = 'apotek';
        $users->email = 'apotek@siskes.com';
        $users->hak_akses = 'apotek';
        $users->password = bcrypt('rahasia');
        $users->save();

        $users = new user();
        $users->name = 'Pendaftaran';
        $users->username = 'pendaftaran';
        $users->email = 'pendaftaran@siskes.com';
        $users->hak_akses = 'pendaftaran';
        $users->password = bcrypt('rahasia');
        $users->save();
    }
}
