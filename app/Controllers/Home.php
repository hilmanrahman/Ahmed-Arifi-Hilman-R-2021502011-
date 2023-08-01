<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house-user',
                'aktif' => 'active',
            ],
            'prodi' => [
                'title' => 'Biodata Siswa',
                'link' => base_url() . '/prodi',
                'icon' => 'fa-solid fa-graduation-cap',
                'aktif' => '',
            ],
            'semester' => [
                'title' => 'Guru',
                'link' => base_url() . '/semester',
                'icon' => 'fa-solid fa-person-chalkboard',
                'aktif' => '',
            ],
            'mahasiswa' => [
                'title' => 'Alumni',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            'kegiatan' => [
                'title' => 'Ekstrakulikuler',
                'link' => base_url() . '/kegiatan',
                'icon' => 'fa-solid fa-chart-line',
                'aktif' => '',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Beranda</li>
        </ol>
    </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        return view('template/content', $data);
    }
}
