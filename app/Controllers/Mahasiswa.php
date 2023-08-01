<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new MahasiswaModel();

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
                'aktif' => '',
            ],
            'mahasiswa' => [
                'title' => 'Alumni',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif' => 'active',
            ],
            'kegiatan' => [
                'title' => 'Ekstrakulikuler',
                'link' => base_url() . '/kegiatan',
                'icon' => 'fa-solid fa-chart-line',
                'aktif' => '',
            ],
        ];
        $this->rules = [
            'id_alumni' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer Induk Alumni Tidak Boleh Kosong'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Alumni Tidak Boleh Kosong'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Alumni Tidak Boleh Kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Henpone Alumni Tidak Boleh Kosong'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Alumni Tidak Boleh Kosong'
                ]
            ],
            'lulus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Lulus Alumni Tidak Boleh Kosong'
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
            <li class="breadcrumb-item active">Biodata Alumni</li>
        </ol>
    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Alumni MTs Miftahul Ulum Gayam";

        $query = $this->pm->find();
        $data['data_alumni'] = $query;
        return view('mahasiswa/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="' . base_url() . '/Biodata Siswa">Biodata Alumni</a></li>
                    <li class="breadcrumb-item active">Tambah Alumni</li>
                </ol>
            </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Alumni';
        $data['action'] = base_url() . '/mahasiswa/simpan';
        return view('mahasiswa/input', $data);
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
            return redirect()->to('mahasiswa')->with('success', 'Data Berhasil Disimpan');
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
            return redirect()->to('mahasiswa')->with('success', 'Data Siswa dengan Kode ' . $id . ' Berhasil Dihapus');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('mahasiswa')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a haref="' . base_url() . '">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="' . base_url() . '/Biodata Siswa">Biodata Alumni</a></li>
                    <li class="breadcrumb-item active">Edit Alumni</li>
                </ol>
            </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Alumni';
        $data['action'] = base_url() . '/mahasiswa/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('mahasiswa/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('mahasiswa')->with('success', 'Data Berhasil Diupdate');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }   
}
