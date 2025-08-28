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
];

interface DashboardProps {
    stats: {
        incoming_letters: number;
        outgoing_letters: number;
        categories: number;
        statuses: number;
        recent_incoming: Array<{
            id: number;
            letter_number: string;
            sender: string;
            subject: string;
            received_date: string;
            category: { name: string };
            status: { name: string; color: string };
        }>;
        recent_outgoing: Array<{
            id: number;
            letter_number: string;
            recipient: string;
            subject: string;
            sent_date: string;
            category: { name: string };
            status: { name: string; color: string };
        }>;
        monthly_incoming: Array<{ month: string; count: number }>;
        monthly_outgoing: Array<{ month: string; count: number }>;
    };
    [key: string]: unknown;
}

export default function Dashboard({ stats }: DashboardProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - Sistem Arsip Surat" />
            
            <div className="space-y-6">
                {/* Welcome Section */}
                <div className="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg p-6 text-white">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-2xl font-bold mb-2">
                                📋 Selamat datang di Sistem Arsip Surat Digital
                            </h1>
                            <p className="text-blue-100">
                                Kelola surat masuk dan keluar dengan mudah dan efisien
                            </p>
                        </div>
                        <div className="text-6xl opacity-20">
                            📨
                        </div>
                    </div>
                </div>

                {/* Statistics Cards */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div className="bg-white rounded-lg shadow-sm border p-6">
                        <div className="flex items-center">
                            <div className="p-3 rounded-full bg-blue-100 text-blue-600">
                                📥
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600">Surat Masuk</p>
                                <p className="text-2xl font-bold text-gray-900">{stats.incoming_letters}</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6">
                        <div className="flex items-center">
                            <div className="p-3 rounded-full bg-green-100 text-green-600">
                                📤
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600">Surat Keluar</p>
                                <p className="text-2xl font-bold text-gray-900">{stats.outgoing_letters}</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6">
                        <div className="flex items-center">
                            <div className="p-3 rounded-full bg-purple-100 text-purple-600">
                                📂
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600">Kategori</p>
                                <p className="text-2xl font-bold text-gray-900">{stats.categories}</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6">
                        <div className="flex items-center">
                            <div className="p-3 rounded-full bg-orange-100 text-orange-600">
                                📊
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600">Status</p>
                                <p className="text-2xl font-bold text-gray-900">{stats.statuses}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="bg-white rounded-lg shadow-sm border p-6">
                    <h2 className="text-lg font-semibold text-gray-900 mb-4">🚀 Aksi Cepat</h2>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <Link href="/incoming-letters/create">
                            <Button className="w-full h-12 bg-blue-600 hover:bg-blue-700">
                                📥 Tambah Surat Masuk
                            </Button>
                        </Link>
                        <Link href="/outgoing-letters/create">
                            <Button className="w-full h-12 bg-green-600 hover:bg-green-700">
                                📤 Tambah Surat Keluar
                            </Button>
                        </Link>
                        <Link href="/company-profile">
                            <Button variant="outline" className="w-full h-12">
                                🏢 Profil Perusahaan
                            </Button>
                        </Link>
                    </div>
                </div>

                {/* Recent Activities */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {/* Recent Incoming Letters */}
                    <div className="bg-white rounded-lg shadow-sm border">
                        <div className="p-6 border-b border-gray-200">
                            <div className="flex items-center justify-between">
                                <h2 className="text-lg font-semibold text-gray-900">📥 Surat Masuk Terbaru</h2>
                                <Link href="/incoming-letters">
                                    <Button variant="outline" size="sm">
                                        Lihat Semua
                                    </Button>
                                </Link>
                            </div>
                        </div>
                        <div className="divide-y divide-gray-200">
                            {stats.recent_incoming.length > 0 ? (
                                stats.recent_incoming.map((letter) => (
                                    <div key={letter.id} className="p-4 hover:bg-gray-50">
                                        <div className="flex items-center justify-between">
                                            <div className="flex-1 min-w-0">
                                                <p className="text-sm font-medium text-gray-900 truncate">
                                                    {letter.letter_number}
                                                </p>
                                                <p className="text-sm text-gray-600 truncate">
                                                    {letter.sender}
                                                </p>
                                                <p className="text-xs text-gray-500 truncate">
                                                    {letter.subject}
                                                </p>
                                            </div>
                                            <div className="flex flex-col items-end ml-4">
                                                <span 
                                                    className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white"
                                                    style={{ backgroundColor: letter.status.color }}
                                                >
                                                    {letter.status.name}
                                                </span>
                                                <span className="text-xs text-gray-500 mt-1">
                                                    {new Date(letter.received_date).toLocaleDateString('id-ID')}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ))
                            ) : (
                                <div className="p-8 text-center text-gray-500">
                                    <div className="text-4xl mb-2">📭</div>
                                    <p>Belum ada surat masuk</p>
                                </div>
                            )}
                        </div>
                    </div>

                    {/* Recent Outgoing Letters */}
                    <div className="bg-white rounded-lg shadow-sm border">
                        <div className="p-6 border-b border-gray-200">
                            <div className="flex items-center justify-between">
                                <h2 className="text-lg font-semibold text-gray-900">📤 Surat Keluar Terbaru</h2>
                                <Link href="/outgoing-letters">
                                    <Button variant="outline" size="sm">
                                        Lihat Semua
                                    </Button>
                                </Link>
                            </div>
                        </div>
                        <div className="divide-y divide-gray-200">
                            {stats.recent_outgoing.length > 0 ? (
                                stats.recent_outgoing.map((letter) => (
                                    <div key={letter.id} className="p-4 hover:bg-gray-50">
                                        <div className="flex items-center justify-between">
                                            <div className="flex-1 min-w-0">
                                                <p className="text-sm font-medium text-gray-900 truncate">
                                                    {letter.letter_number}
                                                </p>
                                                <p className="text-sm text-gray-600 truncate">
                                                    {letter.recipient}
                                                </p>
                                                <p className="text-xs text-gray-500 truncate">
                                                    {letter.subject}
                                                </p>
                                            </div>
                                            <div className="flex flex-col items-end ml-4">
                                                <span 
                                                    className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white"
                                                    style={{ backgroundColor: letter.status.color }}
                                                >
                                                    {letter.status.name}
                                                </span>
                                                <span className="text-xs text-gray-500 mt-1">
                                                    {new Date(letter.sent_date).toLocaleDateString('id-ID')}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ))
                            ) : (
                                <div className="p-8 text-center text-gray-500">
                                    <div className="text-4xl mb-2">📭</div>
                                    <p>Belum ada surat keluar</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Chart Section */}
                <div className="bg-white rounded-lg shadow-sm border p-6">
                    <h2 className="text-lg font-semibold text-gray-900 mb-6">📈 Statistik Bulanan (6 Bulan Terakhir)</h2>
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {/* Incoming Letters Chart */}
                        <div>
                            <h3 className="text-md font-medium text-gray-700 mb-4">📥 Surat Masuk</h3>
                            <div className="space-y-3">
                                {stats.monthly_incoming.map((data, index) => (
                                    <div key={index} className="flex items-center">
                                        <div className="w-20 text-sm text-gray-600">{data.month}</div>
                                        <div className="flex-1 mx-4">
                                            <div className="bg-gray-200 rounded-full h-4">
                                                <div 
                                                    className="bg-blue-500 h-4 rounded-full"
                                                    style={{ 
                                                        width: `${Math.max(10, (data.count / Math.max(...stats.monthly_incoming.map(d => d.count))) * 100)}%` 
                                                    }}
                                                ></div>
                                            </div>
                                        </div>
                                        <div className="w-8 text-sm text-gray-900 font-medium">{data.count}</div>
                                    </div>
                                ))}
                            </div>
                        </div>

                        {/* Outgoing Letters Chart */}
                        <div>
                            <h3 className="text-md font-medium text-gray-700 mb-4">📤 Surat Keluar</h3>
                            <div className="space-y-3">
                                {stats.monthly_outgoing.map((data, index) => (
                                    <div key={index} className="flex items-center">
                                        <div className="w-20 text-sm text-gray-600">{data.month}</div>
                                        <div className="flex-1 mx-4">
                                            <div className="bg-gray-200 rounded-full h-4">
                                                <div 
                                                    className="bg-green-500 h-4 rounded-full"
                                                    style={{ 
                                                        width: `${Math.max(10, (data.count / Math.max(...stats.monthly_outgoing.map(d => d.count))) * 100)}%` 
                                                    }}
                                                ></div>
                                            </div>
                                        </div>
                                        <div className="w-8 text-sm text-gray-900 font-medium">{data.count}</div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}