<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['admin', 'pasien', 'dokter', 'apoteker', 'owner'];

        foreach ($roles as $role) {
            for ($i = 1; $i <= 3; $i++) {
                User::create([
                    'name'     => ucfirst($role) . " $i",
                    'username' => "{$role}{$i}",
                    'password' => Hash::make('password123'),
                    'email'    => "{$role}{$i}@gmail.com",
                    'nohp'     => "08123456780{$i}",
                    'jk'       => $i % 2 === 0 ? 'P' : 'L',
                    'role'     => $role,
                ]);
            }
        }

        $spesialisasiList = [
            'Dokter Umum', 'Spesialis Anak',
            'Spesialis Penyakit Dalam', 'Spesialis Saraf'
        ];

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];


        $dokterUsers = User::where('role', 'dokter')->get();

        foreach ($dokterUsers as $index => $user) {
            $dokter = Dokter::create([
                'user_id'      => $user->id,
                'spesialisasi' => $spesialisasiList[$index % count($spesialisasiList)],
                'tarif'        => (5 + $index) * 10000,
            ]);

            JadwalDokter::create([
                'dokter_id'   => $dokter->id,
                'hari'        => $hariList[$index * 2 % count($hariList)],
                'jam_mulai'   => '08:00:00',
                'jam_selesai' => '12:00:00',
            ]);

            JadwalDokter::create([
                'dokter_id'   => $dokter->id,
                'hari'        => $hariList[($index * 2 + 1) % count($hariList)],
                'jam_mulai'   => '13:00:00',
                'jam_selesai' => '17:00:00',
            ]);
        }

        $daftarObat = [
            ['kode' => 'OBT-001', 'nama' => 'Paracetamol 500mg', 'kategori' => 'Tablet', 'stok' => 100, 'harga' => 5000],
            ['kode' => 'OBT-002', 'nama' => 'Amoxicillin 500mg', 'kategori' => 'Kapsul', 'stok' => 50,  'harga' => 12000],
            ['kode' => 'OBT-003', 'nama' => 'OBH Sirup 100ml',   'kategori' => 'Sirup',  'stok' => 30,  'harga' => 20000],
            ['kode' => 'OBT-004', 'nama' => 'Ibuprofen 400mg',   'kategori' => 'Tablet', 'stok' => 85,  'harga' => 8000],
            ['kode' => 'OBT-005', 'nama' => 'Cetirizine 10mg',   'kategori' => 'Tablet', 'stok' => 120, 'harga' => 6000],
        ];

        foreach ($daftarObat as $item) {
            Obat::create([
                'kode_obat' => $item['kode'],
                'nama_obat' => $item['nama'],
                'kategori'  => $item['kategori'],
                'stok'      => $item['stok'],
                'harga'     => $item['harga'],
            ]);
        }
    }
}
