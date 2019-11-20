<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Blog_Categories;
use App\Blog_Post;
use App\User;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewpost($id)
    {   
        $categories_name = 0;
        $user_name = 0;
        $post = Blog_Post::where(['id' => $id])->get();
        foreach ($post as $key => $posts) {
            $category = Blog_Categories::where(['id' => $posts['categories_id']])->get();
            foreach ($category as $key => $categories) {
                $categories_name = $categories['categories'];
            }
            $user = User::where(['id' => $posts['user_id']])->get();
            foreach ($user as $key => $users) {
                $user_name = $users['lastname'] . ' ' . $users['firstname'];
            }
        }

        return view('backend/blog/post/viewpost', [
            'post' => $post,
            'categories_name' => $categories_name,
            'user_name' => $user_name,
        ]);
    }

    public function viewfollowcategories($id)
    {
        $post = Blog_Post::where(['categories_id' => $id])->get();
        return view('backend/blog/post/view', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = Blog_Categories::cursor();
        return view('backend/blog/post/create', ['blog_categories' => $blog_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tittle' => 'required',
            'categories' => 'integer',
            'content' => 'required',
            'post_avatar' => 'required',
        ];

        $messeges = [
            'tittle.required' => 'Vui long nhap tieu de',
            'categories.integer' => 'Vui long chon the loai',
            'content.required' => 'Vui long nhap noi dung',
            'post_avatar.required' => 'Vui long chon hinh dai dien', 
        ];
        $validator = Validator::make($request->all(), $rules, $messeges);
        if ($validator->fails()) {
            return redirect('/admin/blogpost/create')->withErrors($validator)->withInput();
        }
        if (isset($_POST['tittle'])) {

            Storage::put('upload/'.$request->file('post_avatar')->getClientOriginalName(), file_get_contents($request->file('post_avatar')));

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $post = new Blog_Post();
            $post->user_id = $request->input('user_id');
            $post->tittle = $request->input('tittle');
            $post->content = $request->input('content');
            $post->categories_id = $request->input('categories');
            $post->time = date('d-m,Y');
            $post->avatar = $request->file('post_avatar')->getClientOriginalName();
            $post->save();
            
            return redirect('admin/blogcategories/view');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
