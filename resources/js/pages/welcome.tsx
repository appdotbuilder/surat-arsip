import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

export default function Welcome() {
    return (
        <>
            <Head title="Sistem Arsip Surat Digital" />
            
            <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
                {/* Header */}
                <header className="bg-white shadow-sm">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between items-center py-6">
                            <div className="flex items-center">
                                <div className="bg-blue-600 text-white p-2 rounded-lg mr-3">
                                    📋
                                </div>
                                <h1 className="text-xl font-bold text-gray-900">
                                    Sistem Arsip Surat Digital
                                </h1>
                            </div>
                            <div className="flex space-x-4">
                                <Link href="/login">
                                    <Button variant="outline" size="sm">
                                        Masuk
                                    </Button>
                                </Link>
                                <Link href="/register">
                                    <Button size="sm">
                                        Daftar
                                    </Button>
                                </Link>
                            </div>
                        </div>
                    </div>
                </header>

                {/* Hero Section */}
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    <div className="text-center">
                        <div className="text-6xl mb-6">📨</div>
                        <h1 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                            Kelola Arsip Surat
                            <span className="text-blue-600 block">Secara Digital</span>
                        </h1>
                        <p className="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                            Sistem manajemen arsip surat masuk dan keluar yang modern, 
                            efisien, dan mudah digunakan untuk organisasi atau perusahaan Anda.
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link href="/login">
                                <Button size="lg" className="min-w-[200px]">
                                    🚀 Mulai Sekarang
                                </Button>
                            </Link>
                            <Link href="#features">
                                <Button variant="outline" size="lg" className="min-w-[200px]">
                                    📖 Pelajari Lebih Lanjut
                                </Button>
                            </Link>
                        </div>
                    </div>
                </div>

                {/* Features Section */}
                <div id="features" className="bg-white py-16">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl font-bold text-gray-900 mb-4">
                                ✨ Fitur Unggulan
                            </h2>
                            <p className="text-lg text-gray-600">
                                Semua yang Anda butuhkan untuk mengelola arsip surat dengan efisien
                            </p>
                        </div>

                        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {/* Feature 1 */}
                            <div className="text-center p-6 rounded-lg bg-blue-50 border border-blue-200">
                                <div className="text-4xl mb-4">📥</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Surat Masuk
                                </h3>
                                <p className="text-gray-600">
                                    Kelola dan arsipkan surat masuk dengan sistem kategorisasi 
                                    yang terorganisir dan mudah dicari.
                                </p>
                            </div>

                            {/* Feature 2 */}
                            <div className="text-center p-6 rounded-lg bg-green-50 border border-green-200">
                                <div className="text-4xl mb-4">📤</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Surat Keluar
                                </h3>
                                <p className="text-gray-600">
                                    Lacak dan dokumentasikan semua surat keluar dengan 
                                    sistem pelaporan yang komprehensif.
                                </p>
                            </div>

                            {/* Feature 3 */}
                            <div className="text-center p-6 rounded-lg bg-purple-50 border border-purple-200">
                                <div className="text-4xl mb-4">📊</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Laporan & Statistik
                                </h3>
                                <p className="text-gray-600">
                                    Generate laporan dalam format PDF dan Excel untuk 
                                    analisis dan dokumentasi.
                                </p>
                            </div>

                            {/* Feature 4 */}
                            <div className="text-center p-6 rounded-lg bg-orange-50 border border-orange-200">
                                <div className="text-4xl mb-4">🏢</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Profil Perusahaan
                                </h3>
                                <p className="text-gray-600">
                                    Kelola informasi perusahaan atau institusi dengan 
                                    tampilan yang profesional.
                                </p>
                            </div>

                            {/* Feature 5 */}
                            <div className="text-center p-6 rounded-lg bg-red-50 border border-red-200">
                                <div className="text-4xl mb-4">👥</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Multi-Role User
                                </h3>
                                <p className="text-gray-600">
                                    Sistem role Super Admin, Admin, dan Staff dengan 
                                    kontrol akses yang sesuai.
                                </p>
                            </div>

                            {/* Feature 6 */}
                            <div className="text-center p-6 rounded-lg bg-teal-50 border border-teal-200">
                                <div className="text-4xl mb-4">🔒</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Keamanan Terjamin
                                </h3>
                                <p className="text-gray-600">
                                    Sistem autentikasi yang aman dengan kontrol akses 
                                    berbasis role dan permissions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Benefits Section */}
                <div className="bg-gray-50 py-16">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="lg:grid lg:grid-cols-2 lg:gap-12 lg:items-center">
                            <div>
                                <h2 className="text-3xl font-bold text-gray-900 mb-6">
                                    🎯 Mengapa Memilih Sistem Kami?
                                </h2>
                                <div className="space-y-4">
                                    <div className="flex items-start">
                                        <div className="flex-shrink-0">
                                            <div className="flex items-center justify-center h-8 w-8 rounded-md bg-blue-500 text-white text-sm font-bold">
                                                ⚡
                                            </div>
                                        </div>
                                        <div className="ml-4">
                                            <h3 className="text-lg font-medium text-gray-900">
                                                Efisiensi Tinggi
                                            </h3>
                                            <p className="text-gray-600">
                                                Hemat waktu dengan sistem pencarian dan kategorisasi otomatis
                                            </p>
                                        </div>
                                    </div>

                                    <div className="flex items-start">
                                        <div className="flex-shrink-0">
                                            <div className="flex items-center justify-center h-8 w-8 rounded-md bg-green-500 text-white text-sm font-bold">
                                                📱
                                            </div>
                                        </div>
                                        <div className="ml-4">
                                            <h3 className="text-lg font-medium text-gray-900">
                                                Responsive Design
                                            </h3>
                                            <p className="text-gray-600">
                                                Akses dari mana saja dengan tampilan yang optimal di semua device
                                            </p>
                                        </div>
                                    </div>

                                    <div className="flex items-start">
                                        <div className="flex-shrink-0">
                                            <div className="flex items-center justify-center h-8 w-8 rounded-md bg-purple-500 text-white text-sm font-bold">
                                                🛡️
                                            </div>
                                        </div>
                                        <div className="ml-4">
                                            <h3 className="text-lg font-medium text-gray-900">
                                                Data Terlindungi
                                            </h3>
                                            <p className="text-gray-600">
                                                Keamanan data terjamin dengan enkripsi dan backup otomatis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="mt-12 lg:mt-0">
                                <div className="bg-white rounded-lg shadow-lg p-8">
                                    <div className="text-center">
                                        <div className="text-5xl mb-4">🏆</div>
                                        <h3 className="text-2xl font-bold text-gray-900 mb-4">
                                            Siap Digunakan!
                                        </h3>
                                        <p className="text-gray-600 mb-6">
                                            Mulai kelola arsip surat Anda hari ini dengan sistem yang 
                                            telah terpercaya oleh berbagai organisasi.
                                        </p>
                                        <div className="space-y-3">
                                            <Link href="/register">
                                                <Button size="lg" className="w-full">
                                                    📝 Daftar Sekarang
                                                </Button>
                                            </Link>
                                            <Link href="/login">
                                                <Button variant="outline" size="lg" className="w-full">
                                                    🔑 Sudah Punya Akun? Masuk
                                                </Button>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Footer */}
                <footer className="bg-gray-900 text-white py-12">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center">
                            <div className="flex items-center justify-center mb-4">
                                <div className="bg-blue-600 text-white p-2 rounded-lg mr-3">
                                    📋
                                </div>
                                <span className="text-xl font-bold">
                                    Sistem Arsip Surat Digital
                                </span>
                            </div>
                            <p className="text-gray-400 mb-4">
                                Solusi digital terdepan untuk manajemen arsip surat yang efisien dan modern.
                            </p>
                            <div className="border-t border-gray-800 pt-4">
                                <p className="text-sm text-gray-500">
                                    © 2024 Sistem Arsip Surat Digital. Dikembangkan dengan ❤️ untuk kemudahan Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}