<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        dd('data for main page');
        $response['page'] = 'home';

        
    }

    /**
     * 
     */
    public function getListPosts($category)
    {
        dd('list posts here', $category);
    }

    /**
     * 
     */
    public function getPost($category, $post)
    {
        dd('posts here', $category, $post);
    }

}
