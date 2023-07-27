<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('templates/header', $data = ['title' => 'this is title'])
            . view('page_test')
            . view('templates/footer');
    }

    public function subroute()
    {
        return 'subroute nih yak';
    }
}
