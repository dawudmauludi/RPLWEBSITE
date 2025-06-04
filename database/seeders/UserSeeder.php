<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role jika belum ada
        $roles = ['admin', 'guru', 'siswa','alumni'];
        foreach ($roles as $name) {
            Role::firstOrCreate(['name' => $name]);
        }

        // Tambah user dan attach role
        $users = [
            ['name' => 'AdminWebsite', 'email' => 'admin@gmail.com', 'password' => 'adminRpl_1', 'role' => 'admin'],
            ['name' => 'Irnanto', 'email' => 'guru@gmail.com','password' => 'guruRpl_1', 'role' => 'guru'],
            ['name' => 'Rodhi', 'email' => 'siswa@gmail.com','password' => 'siswaRpl_1', 'role' => 'siswa'],
            ['name' => 'Firmansyah', 'email' => 'siswa1@gmail.com','password' => 'siswaRpl_1', 'role' => 'siswa'],
            ['name' => 'dawud', 'email' => 'alumni1@gmail.com','password' => 'alumniRpl_1', 'role' => 'alumni'],
        ];

        foreach ($users as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status' => 'approved',
            ]);

            $role = Role::where('name', $data['role'])->first();
            if ($role) {
                $user->roles()->attach($role->id); // atau sync([$role->id])
            }
        }
    }
}
