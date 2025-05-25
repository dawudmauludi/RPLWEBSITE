<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

          $adminRole = Role::firstOrCreate(['name' => 'admin'], ['display_name' => 'Admin']);
        $guruRole = Role::firstOrCreate(['name' => 'guru'], ['display_name' => 'Guru']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa'], ['display_name' => 'Siswa']);

        // Buat user dan assign role
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['nama' => 'Admin', 'password' => bcrypt('Admin12345678#')]
        );
        $admin->addRole($adminRole);

        $guru = User::firstOrCreate(
            ['email' => 'Oong@gmail.com'],
            ['nama' => 'oong', 'password' => bcrypt('Oong12345678#')]
        );
        $guru->addRole($guruRole);

        $siswa = User::firstOrCreate(
            ['email' => 'siswa@gmail.com'],
            ['nama' => 'Siswa', 'password' => bcrypt('Siswa12345678#')]
        );
        $siswa->addRole($siswaRole);
    

      $this->call(LaratrustSeeder::class);
    }
}
