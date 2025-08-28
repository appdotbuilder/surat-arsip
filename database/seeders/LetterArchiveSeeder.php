<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\IncomingLetter;
use App\Models\LetterCategory;
use App\Models\LetterStatus;
use App\Models\OutgoingLetter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LetterArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users with different roles
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'phone' => '08123456789',
            'position' => 'Super Administrator',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '08987654321',
            'position' => 'Administrator',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08555666777',
            'position' => 'Staff Administrasi',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create letter categories
        $categories = [
            ['name' => 'Undangan', 'description' => 'Surat undangan resmi', 'code' => 'UND'],
            ['name' => 'Pemberitahuan', 'description' => 'Surat pemberitahuan', 'code' => 'PBR'],
            ['name' => 'Permohonan', 'description' => 'Surat permohonan', 'code' => 'PMH'],
            ['name' => 'Laporan', 'description' => 'Surat laporan', 'code' => 'LPR'],
            ['name' => 'Kerjasama', 'description' => 'Surat kerjasama', 'code' => 'KSM'],
        ];

        foreach ($categories as $category) {
            LetterCategory::create($category);
        }

        // Create letter statuses
        $statuses = [
            ['name' => 'Diterima', 'description' => 'Surat telah diterima', 'color' => '#10b981'],
            ['name' => 'Diproses', 'description' => 'Surat sedang diproses', 'color' => '#f59e0b'],
            ['name' => 'Selesai', 'description' => 'Surat telah selesai diproses', 'color' => '#3b82f6'],
            ['name' => 'Ditolak', 'description' => 'Surat ditolak', 'color' => '#ef4444'],
            ['name' => 'Pending', 'description' => 'Surat menunggu tindakan', 'color' => '#6b7280'],
        ];

        foreach ($statuses as $status) {
            LetterStatus::create($status);
        }

        // Create company profile
        CompanyProfile::create([
            'name' => 'PT. Sistem Arsip Digital Indonesia',
            'description' => 'Perusahaan teknologi yang fokus pada pengembangan sistem manajemen dokumen digital untuk meningkatkan efisiensi administrasi.',
            'address' => 'Jl. Teknologi No. 123, Jakarta Selatan, DKI Jakarta 12345',
            'phone' => '021-1234567',
            'email' => 'info@arsipdigital.co.id',
            'website' => 'https://arsipdigital.co.id',
            'vision' => 'Menjadi perusahaan teknologi terdepan dalam solusi manajemen dokumen digital di Indonesia.',
            'mission' => 'Mengembangkan solusi teknologi yang inovatif dan mudah digunakan untuk membantu organisasi dalam mengelola dokumen secara digital dengan efisien dan aman.',
            'history' => 'Didirikan pada tahun 2020, PT. Sistem Arsip Digital Indonesia telah melayani lebih dari 100 perusahaan dan institusi pemerintah dalam digitalisasi sistem manajemen dokumen mereka.',
            'social_media' => [
                'facebook' => 'https://facebook.com/arsipdigital',
                'twitter' => 'https://twitter.com/arsipdigital',
                'instagram' => 'https://instagram.com/arsipdigital',
                'linkedin' => 'https://linkedin.com/company/arsipdigital',
            ],
        ]);

        // Create sample letters
        $categoryIds = LetterCategory::pluck('id')->toArray();
        $statusIds = LetterStatus::pluck('id')->toArray();
        $userIds = [$superAdmin->id, $admin->id, $staff->id];

        // Create 20 incoming letters
        for ($i = 1; $i <= 20; $i++) {
            IncomingLetter::create([
                'letter_number' => 'IN/' . date('Y') . '/' . str_pad((string)$i, 4, '0', STR_PAD_LEFT),
                'sender' => 'PT. Pengirim Surat ' . $i,
                'subject' => 'Perihal Surat Masuk Nomor ' . $i,
                'content' => 'Isi surat masuk nomor ' . $i . ' yang berisi berbagai informasi penting terkait aktivitas perusahaan.',
                'received_date' => now()->subDays(random_int(1, 180)),
                'letter_date' => now()->subDays(random_int(1, 180)),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'status_id' => $statusIds[array_rand($statusIds)],
                'created_by' => $userIds[array_rand($userIds)],
                'notes' => 'Catatan untuk surat masuk nomor ' . $i,
            ]);
        }

        // Create 15 outgoing letters
        for ($i = 1; $i <= 15; $i++) {
            OutgoingLetter::create([
                'letter_number' => 'OUT/' . date('Y') . '/' . str_pad((string)$i, 4, '0', STR_PAD_LEFT),
                'recipient' => 'PT. Penerima Surat ' . $i,
                'subject' => 'Perihal Surat Keluar Nomor ' . $i,
                'content' => 'Isi surat keluar nomor ' . $i . ' yang berisi berbagai informasi penting yang akan dikirimkan.',
                'sent_date' => now()->subDays(random_int(1, 150)),
                'letter_date' => now()->subDays(random_int(1, 150)),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'status_id' => $statusIds[array_rand($statusIds)],
                'created_by' => $userIds[array_rand($userIds)],
                'notes' => 'Catatan untuk surat keluar nomor ' . $i,
            ]);
        }
    }
}