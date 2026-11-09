<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Halaman login
    public function login() 
    {
        return view('login');
    }

    // Proses login
    public function processLogin(Request $request)
    {
        $username = $request->input('username');

        session(['username' => $username]);

        return redirect('/dashboard');
    }

    public function dashboard(Request $request)
    {
        $username = session('username');
        $nickname = session('nickname');

        $displayName = $nickname ?: $username;

         $statistics = [
        [
            'title' => 'Mata Kuliah',
            'total' => 3,
        ],
        [
            'title' => 'Tugas Aktif',
            'total' => 4,
        ],
    ];

        $activities = [
            [
                'title' => 'Pengumpulan Tugas PBO',
                'status' => '2 jam lalu'
            ],
            [
                'title' => 'Konsep Dasar Database',
                'status' => '1 menit lalu'
            ],
            [
                'title' => 'Pengumuman UTS',
                'status' => '2 hari lalu'
            ]
        ];

        return view('dashboard', compact(
            'username',
            'displayName',
            'statistics',
            'activities'
        ));
    }

    // Halaman pengelolaan
    public function pengelolaan()
    {
        $matakuliah = [
            'Pemrograman Berbasis Web',
            'Basis Data',
            'Pemrograman Berorientasi Objek',
        ];

        $tugas = [
            [
                'nama' => 'Membuat Project Laravel',
                'matakuliah' => 'Pemrograman Berbasis Web',
                'deadline' => '10 November 2026',
                'status' => 'Belum Selesai'
            ],

            [
                'nama' => 'Membuat ERD Database',
                'matakuliah' => 'Basis Data',
                'deadline' => '12 November 2026',
                'status' => 'Belum Selesai'
            ],

            [
                'nama' => 'Laporan Praktikum',
                'matakuliah' => 'Pemrograman Berorientasi Objek',
                'deadline' => '15 November 2026',
                'status' => 'Belum Selesai'
            ],

            [
                'nama' => 'Tugas Vidio',
                'matakuliah' => 'Pemrograman Berbasis Web',
                'deadline' => '15 November 2026',
                'status' => 'Belum Selesai'
            ]
        ];

        return view('pengelolaan', compact('matakuliah', 'tugas'));
    }

    public function detailMatakuliah($kode)
{
    $data = [
        'pemrograman-web' => [
            'nama' => 'Pemrograman Web',

            'tugas' => [
                [
                    'nama' => 'Membuat Project Laravel',
                    'deadline' => '10 November 2026',
                    'status' => 'Belum Selesai'
                ],
                [
                    'nama' => 'Tugas Vidio',
                    'deadline' => '15 November 2026',
                    'status' => 'Belum Selesai'
                ],
                [
                    'nama' => 'Implementasi CRUD',
                    'deadline' => '3 November 2026',
                    'status' => 'Sudah  Selesai'
                ]
            ],

            'materi' => [
                'Pengenalan HTML dan CSS',
                'Dasar-Dasar PHP',
                'Framework Laravel'
            ],

            'uts' => '24 November 2026'
        ],

        'basis-data' => [
            'nama' => 'Basis Data',

            'tugas' => [
                [
                    'nama' => 'Membuat ERD Database',
                    'deadline' => '12 November 2026',
                    'status' => 'Belum Selesai'
                ],
                [
                    'nama' => 'Membuat Query SQL',
                    'deadline' => '6 November 2026',
                    'status' => 'Sudah Selesai'
                ],
            ],

            'materi' => [
                'Konsep Dasar Database',
                'Entity Relationship Diagram',
                'Normalisasi Database'
            ],

            'uts' => '25 November 2026'
        ],

        'pemrograman-objek' => [
        'nama' => 'Pemrograman Berorientasi Objek',

        'tugas' => [
            [
                'nama' => 'Laporan Praktikum',
                'deadline' => '15 November 2026',
                'status' => 'Belum Selesai'
            ],
        ],

        'materi' => [
            'Konsep Dasar Pemrograman Berorientasi Objek',
            'Class dan Object',
            'Inheritance dan Polymorphism',
            'Encapsulation dan Abstraction'
        ],

        'uts' => '26 November 2026'
    ],
    ];

    if (!isset($data[$kode])) {
        abort(404);
    }

    return view('detailMataKuliah', [
        'matakuliah' => $data[$kode]
    ]);
}


    // Halaman Profile
    public function profile()
    {
        return view('profile', [
            'username' => session('username'),
            'nickname' => session('nickname', ''),
        ]);
    }

    // Simpan Profile
    public function saveProfile(Request $request)
    {
        $request->validate([
            'nickname' => 'nullable|string|max:50',
        ]);

        session([
            'nickname' => $request->nickname,
        ]);

        return redirect('/profile');
    }

    // Log Out
    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}