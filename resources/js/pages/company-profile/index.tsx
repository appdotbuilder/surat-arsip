import React from 'react';
import AppLayout from '@/layouts/app-layout';
import { Button } from '@/components/ui/button';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Profil Perusahaan',
        href: '/company-profile',
    },
];

interface CompanyProfile {
    id?: number;
    name?: string;
    description?: string;
    address?: string;
    phone?: string;
    email?: string;
    website?: string;
    logo_path?: string;
    vision?: string;
    mission?: string;
    history?: string;
    social_media?: {
        facebook?: string;
        twitter?: string;
        instagram?: string;
        linkedin?: string;
    };
}

interface CompanyProfileIndexProps {
    profile: CompanyProfile;
    [key: string]: unknown;
}

export default function CompanyProfileIndex({ profile }: CompanyProfileIndexProps) {
    const hasProfile = profile.id !== undefined;

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Profil Perusahaan - Sistem Arsip Surat" />
            
            <div className="space-y-6">
                {/* Header */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900">🏢 Profil Perusahaan</h1>
                        <p className="text-gray-600">Informasi lengkap tentang perusahaan atau institusi</p>
                    </div>
                    <Link href="/company-profile/edit">
                        <Button className="bg-blue-600 hover:bg-blue-700">
                            ✏️ {hasProfile ? 'Edit Profil' : 'Buat Profil'}
                        </Button>
                    </Link>
                </div>

                {hasProfile ? (
                    <div className="space-y-6">
                        {/* Company Header */}
                        <div className="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg p-8 text-white">
                            <div className="flex items-center">
                                <div className="flex-shrink-0">
                                    <div className="w-20 h-20 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                        <span className="text-3xl">🏢</span>
                                    </div>
                                </div>
                                <div className="ml-6">
                                    <h2 className="text-3xl font-bold">{profile.name}</h2>
                                    {profile.description && (
                                        <p className="text-blue-100 mt-2 text-lg">
                                            {profile.description}
                                        </p>
                                    )}
                                </div>
                            </div>
                        </div>

                        {/* Company Information Grid */}
                        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            {/* Contact Information */}
                            <div className="bg-white rounded-lg shadow-sm border p-6">
                                <h3 className="text-lg font-semibold text-gray-900 mb-4">📞 Informasi Kontak</h3>
                                <div className="space-y-4">
                                    {profile.address && (
                                        <div className="flex items-start">
                                            <span className="text-gray-500 mr-3 mt-1">📍</span>
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Alamat</p>
                                                <p className="text-gray-900">{profile.address}</p>
                                            </div>
                                        </div>
                                    )}
                                    {profile.phone && (
                                        <div className="flex items-center">
                                            <span className="text-gray-500 mr-3">📞</span>
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Telepon</p>
                                                <p className="text-gray-900">{profile.phone}</p>
                                            </div>
                                        </div>
                                    )}
                                    {profile.email && (
                                        <div className="flex items-center">
                                            <span className="text-gray-500 mr-3">📧</span>
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Email</p>
                                                <p className="text-gray-900">{profile.email}</p>
                                            </div>
                                        </div>
                                    )}
                                    {profile.website && (
                                        <div className="flex items-center">
                                            <span className="text-gray-500 mr-3">🌐</span>
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Website</p>
                                                <a 
                                                    href={profile.website} 
                                                    target="_blank" 
                                                    rel="noopener noreferrer"
                                                    className="text-blue-600 hover:text-blue-800 underline"
                                                >
                                                    {profile.website}
                                                </a>
                                            </div>
                                        </div>
                                    )}
                                </div>
                            </div>

                            {/* Social Media */}
                            {profile.social_media && Object.values(profile.social_media).some(value => value) && (
                                <div className="bg-white rounded-lg shadow-sm border p-6">
                                    <h3 className="text-lg font-semibold text-gray-900 mb-4">📱 Media Sosial</h3>
                                    <div className="space-y-3">
                                        {profile.social_media.facebook && (
                                            <a 
                                                href={profile.social_media.facebook}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors"
                                            >
                                                <span className="text-blue-600 mr-3">📘</span>
                                                <span className="text-gray-900">Facebook</span>
                                            </a>
                                        )}
                                        {profile.social_media.twitter && (
                                            <a 
                                                href={profile.social_media.twitter}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="flex items-center p-3 bg-sky-50 rounded-lg hover:bg-sky-100 transition-colors"
                                            >
                                                <span className="text-sky-600 mr-3">🐦</span>
                                                <span className="text-gray-900">Twitter</span>
                                            </a>
                                        )}
                                        {profile.social_media.instagram && (
                                            <a 
                                                href={profile.social_media.instagram}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="flex items-center p-3 bg-pink-50 rounded-lg hover:bg-pink-100 transition-colors"
                                            >
                                                <span className="text-pink-600 mr-3">📷</span>
                                                <span className="text-gray-900">Instagram</span>
                                            </a>
                                        )}
                                        {profile.social_media.linkedin && (
                                            <a 
                                                href={profile.social_media.linkedin}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="flex items-center p-3 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors"
                                            >
                                                <span className="text-indigo-600 mr-3">💼</span>
                                                <span className="text-gray-900">LinkedIn</span>
                                            </a>
                                        )}
                                    </div>
                                </div>
                            )}
                        </div>

                        {/* Vision & Mission */}
                        {(profile.vision || profile.mission) && (
                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                {profile.vision && (
                                    <div className="bg-white rounded-lg shadow-sm border p-6">
                                        <h3 className="text-lg font-semibold text-gray-900 mb-4">🎯 Visi</h3>
                                        <p className="text-gray-700 leading-relaxed">{profile.vision}</p>
                                    </div>
                                )}
                                {profile.mission && (
                                    <div className="bg-white rounded-lg shadow-sm border p-6">
                                        <h3 className="text-lg font-semibold text-gray-900 mb-4">🚀 Misi</h3>
                                        <p className="text-gray-700 leading-relaxed">{profile.mission}</p>
                                    </div>
                                )}
                            </div>
                        )}

                        {/* History */}
                        {profile.history && (
                            <div className="bg-white rounded-lg shadow-sm border p-6">
                                <h3 className="text-lg font-semibold text-gray-900 mb-4">📜 Sejarah</h3>
                                <p className="text-gray-700 leading-relaxed">{profile.history}</p>
                            </div>
                        )}
                    </div>
                ) : (
                    <div className="bg-white rounded-lg shadow-sm border p-12 text-center">
                        <div className="text-6xl mb-6">🏢</div>
                        <h3 className="text-2xl font-semibold text-gray-900 mb-4">
                            Profil Perusahaan Belum Dibuat
                        </h3>
                        <p className="text-gray-600 mb-8 max-w-md mx-auto">
                            Buat profil perusahaan untuk menampilkan informasi lengkap 
                            tentang organisasi atau institusi Anda.
                        </p>
                        <Link href="/company-profile/edit">
                            <Button size="lg" className="bg-blue-600 hover:bg-blue-700">
                                🏗️ Buat Profil Perusahaan
                            </Button>
                        </Link>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}