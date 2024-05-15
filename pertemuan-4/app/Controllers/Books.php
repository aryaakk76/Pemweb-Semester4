<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Books extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BooksModel();
    }
    public function index()
    {
        //$buku = $this->bukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku'  => $this->bukuModel->getBooks()
        ];

        return view('books/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Buku',
            'buku'  => $this->bukuModel->getBooks($slug)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku' . $slug . 'Tidak ditemukan');
        }

        return view('books/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Buku',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];
        return view('books/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[books.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah dimasukkan'
                ]
            ],
            'penulis' => [
                'rules' => 'required|is_unique[books.penulis]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah dimasukkan'
                ]
            ],
            'penerbit' => [
                'rules' => 'required|is_unique[books.penerbit]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah dimasukkan'
                ]
            ],
            'sampul' => [
                'rules' => 'required|is_unique[books.sampul]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah dimasukkan'
                ]
            ]


        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/books/create')->withInput();
            //$validation = \Config\Services::validation();
            //return redirect()->to(base_url() . '/books/create')->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/books');
    }
}
