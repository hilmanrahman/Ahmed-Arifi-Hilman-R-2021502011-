<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SemesterModel;

class Semester extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new SemesterModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house-user',
                'aktif' => '',
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
                'aktif' => 'active',
            ],
            'mahasiswa' => [
                'title' => 'Alumni',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            'kegiatan' => [
                'title' => 'Ekstra Kulikuler',
                'link' => base_url() . '/kegiatan',
                'icon' => 'fa-solid fa-chart-line',
                'aktif' => '',
            ],
        ];
        $this->rules = [
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer Induk Guru Tidak Boleh Kosong'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Guru Tidak Boleh Kosong'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Guru Tidak Boleh Kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Henpone Guru Tidak Boleh Kosong'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Guru Tidak Boleh Kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Guru Tidak Boleh Kosong'
                ]
            ],
        ];
    }
    public function index()
    {

        $breadcrumb = '<div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Guru MTs Miftahul Ulum Gayam";

        $query = $this->pm->find();
        $data['data_semester'] = $query;
        return view('semester/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="' . base_url() . '/Guru">Guru</a></li>
                        <li class="breadcrumb-item active">Guru</li>
                    </ol>
                </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Guru';
        $data['action'] = base_url() . '/semester/simpan';
        return view('semester/input', $data);
    }
    public function simpan()
    {
        if (strtolower($this->request->getMethod()) !== 'post') {


            return redirect()->back()->withInput();
        }
        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }

        $dt = $this->request->getVar();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('semester')->with('success', 'Data Berhasil Disimpan');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Hapus Data Gagal Dilakukan');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('semester')->with('success', 'Data Guru dengan Kode ' . $id . ' Berhasil Dihapus');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('semester')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="' . base_url() . '/Biodata Siswa">Biodata Siswa</a></li>
                        <li class="breadcrumb-item active">Edit Siswa</li>
                    </ol>
                </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Siswa';
        $data['action'] = base_url() . '/semester/update';
        $data['edit_data'] = $this->pm->find($id);
        return view('semester/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['kelas']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        if (empty($dtEdit['kelas'])) {
            unset($dtEdit['kelas']);
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('semester')->with('success', 'Data Dengan Kode' . $param . 'Data Berhasil Diupdate');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
