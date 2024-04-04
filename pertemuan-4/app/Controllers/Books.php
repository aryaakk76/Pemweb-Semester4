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
            'title' => 'Daftar buku',
            'buku' => $this->bukuModel->getBooks()
        ];

        return view('books/index', $data);
    }

    public function detail($slug)

    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBooks($slug)
        ];
        return view('books/detail', $data);
    }
}
