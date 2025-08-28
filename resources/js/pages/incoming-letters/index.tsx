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
        title: 'Surat Masuk',
        href: '/incoming-letters',
    },
];

interface IncomingLetter {
    id: number;
    letter_number: string;
    sender: string;
    subject: string;
    received_date: string;
    letter_date: string;
    category: {
        id: number;
        name: string;
    };
    status: {
        id: number;
        name: string;
        color: string;
    };
    creator: {
        id: number;
        name: string;
    };
}

interface IncomingLettersIndexProps {
    letters: {
        data: IncomingLetter[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
    };
    [key: string]: unknown;
}

export default function IncomingLettersIndex({ letters }: IncomingLettersIndexProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Surat Masuk - Sistem Arsip Surat" />
            
            <div className="space-y-6">
                {/* Header */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900">📥 Surat Masuk</h1>
                        <p className="text-gray-600">Kelola dan pantau semua surat masuk</p>
                    </div>
                    <Link href="/incoming-letters/create">
                        <Button className="bg-blue-600 hover:bg-blue-700">
                            ➕ Tambah Surat Masuk
                        </Button>
                    </Link>
                </div>

                {/* Statistics */}
                <div className="bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <div className="flex items-center justify-between">
                        <div className="flex items-center">
                            <div className="p-2 bg-blue-500 rounded-lg text-white mr-3">📊</div>
                            <div>
                                <h3 className="font-semibold text-blue-900">Total Surat Masuk</h3>
                                <p className="text-blue-700">Terdapat {letters.total} surat dalam sistem</p>
                            </div>
                        </div>
                        <div className="text-3xl font-bold text-blue-600">
                            {letters.total}
                        </div>
                    </div>
                </div>

                {/* Letters Table */}
                <div className="bg-white rounded-lg shadow-sm border">
                    <div className="px-6 py-4 border-b border-gray-200">
                        <h2 className="text-lg font-semibold text-gray-900">Daftar Surat Masuk</h2>
                    </div>

                    {letters.data.length > 0 ? (
                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No. Surat
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pengirim
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Perihal
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kategori
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tgl Diterima
                                        </th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {letters.data.map((letter) => (
                                        <tr key={letter.id} className="hover:bg-gray-50">
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <div className="text-sm font-medium text-gray-900">
                                                    {letter.letter_number}
                                                </div>
                                            </td>
                                            <td className="px-6 py-4">
                                                <div className="text-sm text-gray-900">
                                                    {letter.sender}
                                                </div>
                                            </td>
                                            <td className="px-6 py-4">
                                                <div className="text-sm text-gray-900 max-w-xs truncate">
                                                    {letter.subject}
                                                </div>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {letter.category.name}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <span 
                                                    className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white"
                                                    style={{ backgroundColor: letter.status.color }}
                                                >
                                                    {letter.status.name}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {new Date(letter.received_date).toLocaleDateString('id-ID')}
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div className="flex space-x-2">
                                                    <Link href={`/incoming-letters/${letter.id}`}>
                                                        <Button variant="outline" size="sm">
                                                            👁️ Lihat
                                                        </Button>
                                                    </Link>
                                                    <Link href={`/incoming-letters/${letter.id}/edit`}>
                                                        <Button variant="outline" size="sm">
                                                            ✏️ Edit
                                                        </Button>
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    ) : (
                        <div className="p-12 text-center">
                            <div className="text-6xl mb-4">📭</div>
                            <h3 className="text-lg font-medium text-gray-900 mb-2">Belum ada surat masuk</h3>
                            <p className="text-gray-600 mb-6">
                                Mulai dengan menambahkan surat masuk pertama Anda
                            </p>
                            <Link href="/incoming-letters/create">
                                <Button className="bg-blue-600 hover:bg-blue-700">
                                    ➕ Tambah Surat Masuk
                                </Button>
                            </Link>
                        </div>
                    )}

                    {/* Pagination */}
                    {letters.last_page > 1 && (
                        <div className="px-6 py-4 border-t border-gray-200 bg-gray-50">
                            <div className="flex items-center justify-between">
                                <div className="text-sm text-gray-700">
                                    Menampilkan {((letters.current_page - 1) * letters.per_page) + 1} sampai{' '}
                                    {Math.min(letters.current_page * letters.per_page, letters.total)} dari{' '}
                                    {letters.total} hasil
                                </div>
                                <div className="flex space-x-2">
                                    {letters.current_page > 1 && (
                                        <Button variant="outline" size="sm">
                                            ← Sebelumnya
                                        </Button>
                                    )}
                                    {letters.current_page < letters.last_page && (
                                        <Button variant="outline" size="sm">
                                            Selanjutnya →
                                        </Button>
                                    )}
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}