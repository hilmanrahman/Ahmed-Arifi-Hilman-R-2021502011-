<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;

class Prodi extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new ProdiModel();

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
                'aktif' => 'active',
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

        $this->rules = [
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer Induk Siswa Tidak Boleh Kosong'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa Tidak Boleh Kosong'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa Tidak Boleh Kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Henpone Siswa Tidak Boleh Kosong'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Siswa Tidak Boleh Kosong'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas Siswa Tidak Boleh Kosong'
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
            <li class="breadcrumb-item active">Biodata Siswa</li>
        </ol>
    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Siswa Siswi MTs Miftahul Ulum Gayam";

        $query = $this->pm->find();
        $data['data_prodi'] = $query;
        return view('prodi/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="' . base_url() . '/Biodata Siswa">Biodata Siswa</a></li>
                    <li class="breadcrumb-item active">Tambah Siswa</li>
                </ol>
            </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Siswa';
        $data['action'] = base_url() . '/prodi/simpan';
        return view('prodi/input', $data);
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
            return redirect()->to('prodi')->with('success', 'Data Berhasil Disimpan');
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
            return redirect()->to('prodi')->with('success', 'Data Siswa dengan Kode ' . $id . ' Berhasil Dihapus');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('prodi')->with('error', $e->getMessage());
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
        $data['action'] = base_url() . '/prodi/update';
        $data['edit_data'] = $this->pm->find($id);
        return view('prodi/input', $data);
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
            return redirect()->to('prodi')->with('success', 'Data Dengan Kode' . $param . 'Data Berhasil Diupdate');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
