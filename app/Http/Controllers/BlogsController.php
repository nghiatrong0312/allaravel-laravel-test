<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog_Post;
use App\Blog_Categories;
use App\Comment;


class BlogsController extends Controller
{
    public function index()
    {
    	$post = Blog_Post::cursor();
    	return view('blogs/index', ['post' => $post]);
    }

    public function view($id)
    {
        $comment = Comment::where(['post_id' => $id])->orderByRaw('id DESC')->get();
    	$post = Blog_Post::where(['id' => $id])->get();
    	return view('blogs/detailblog', [
            'post' => $post, 
            'comment' => $comment,
        ]);
    }

    public function view_categories($id)
    {
    	$post = Blog_Post::where(['id' => $id])->get();

    	return view('blogs/view_categories', ['post' => $post]);
    }

    public function getview($id)
    {
        $quantity_view = 0;
        $post = Blog_Post::where(['id' => $id])->get();
        foreach ($post as $key => $value) {
            if ($value['view'] == 0) {
                $quantity_view = 1;
            } elseif ($value['view'] != 0) {
                $quantity_view = $value['view'];
            }
        }
        Blog_Post::where(['id' => $id])->update([
            'view' => ++$quantity_view,
        ]);
    }
    public function getview1($id)
    {
        $quantity_view = 0;
        $post = Blog_Post::where(['id' => $id])->get();
        foreach ($post as $key => $value) {
            if ($value['view'] == 0) {
                $quantity_view = 1;
            } elseif ($value['view'] != 0) {
                $quantity_view = $value['view'];
            }
        }
        Blog_Post::where(['id' => $id])->update([
            'view' => ++$quantity_view,
        ]);
    }
}
