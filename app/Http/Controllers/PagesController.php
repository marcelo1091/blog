<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title'    => 'Services',
            'services' => ['Blog', 'coś', 'coś'],
        );
        return view('pages.services')->with($data);
    }
}
