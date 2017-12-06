<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        //$title = 'Welcome to RBB';
        //return view('pages.index', compact('title'));
        //return view('pages.index')->with('title', $title); // easy to pass multiple vars in ary
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.index')->with('posts', $posts);
    }

    public function about() {
        return view('pages.about');
    }

    public function services() {
        $data = array(
            'title' => 'Services',
            'serviceAry' => ['Web Design', 'CompSci', 'SEO']
        );
        return view('pages.services')->with($data);
    }

}
