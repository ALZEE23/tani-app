<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan mengimpor namespace yang benar

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kecamatan' => 'Dramaga',
            'name' => 'alfa',
            'email' => 'alfa@gmail.com',
            'username' => 'alfa',
            'password' => bcrypt('password'),
            'no_telepon' => '0000',
            'role' => 'user',
            'nik' => '12345679',        
        ]);

        // Tambahkan pengguna lain jika perlu
    }
}
