<?php 
namespace App\Controllers; 
class Page extends BaseController 
{ 
    public function about() 
    { 
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah Halaman About yang menjelaskan tentang isi halaman, dibuat melalui Views'
        ]);
    } 
    public function contact() 
    { 
        echo "Ini halaman Contact"; 
    } 
    public function faqs() 
    { 
        echo "Ini halaman FAQ"; 
    } 
    public function tos()
    {
        echo "Ini Halaman Term of Services";
    }
}