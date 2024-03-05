<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        echo "about page";
    }

    public function contact()
    {
        echo "contact page";
    }

    public function faqs()
    {
        echo "faqs page";
    }

    public function tos()
    {
        echo "Halaman Term of Service";
    }

    public function biodata()
    {
        echo "<br> Nama : CAHYA ILMAWATI ";
        echo "<br> NIM : 4122018 ";
        echo "<br> Alamat : Jombatan ";
        echo "<br> Agama : Islam ";
    }
}
