<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Unipdu Press',
            //'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('page/home', $data);
    }


    public function about()
    {
        $data = [
            'title' => 'About | Unipdu Press',
            //'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('page/about', $data);
    }


    public function contact()
    {
        $data = [
            'title' => 'contact | Unipdu Press',
            'alamat' => [
                ['tipe' => 'Rumah', 'alamat' => 'Jabon', 'kota' => 'Jombang'],
                ['tipe' => 'Kantor', 'alamat' => 'Unipdu', 'kota' => 'Jombang'],
            ]
        ];
        return view('page/contact', $data);
    }
}
