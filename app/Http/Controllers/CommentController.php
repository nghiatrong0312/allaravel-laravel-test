<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Session;
use App\Comment;
use App\User;
use App\Reply;


class CommentController extends Controller
{
    public function view()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $content = $_POST['comment'];
        $comment_id = $_POST['comment_id'];
        $time = date('H:i:s, d-m-Y');
        $user_name = 0;
        $warning = 0;

        if ($_POST['comment_id'] == 0) {
            $comment = new Comment();
            $comment->user_id = $_POST['user_id'];
            $comment->parent_comment_id = 0;
            $comment->post_id = $_POST['post_id'];
            $comment->content = $_POST['comment'];
            $comment->time = date('H:i:s, d-m-Y');
            $comment->save();
 
            $warning = 'Comment Success';
            
        }elseif($_POST['comment_id'] != 0) {
            $comment1 = new Comment();
            $comment1->user_id = $_POST['user_id'];
            $comment1->parent_comment_id = $_POST['comment_id'];
            $comment1->content = $_POST['comment'];
            $comment1->post_id = $_POST['post_id'];
            $comment1->time = date('H:i:s, d-m-Y');
            $comment1->save();

            $warning = 'Reply Success';         
        } 
        $data = array(
            'warning' => $warning,
        );
        echo json_encode($data);
    }   

    public function show($id)
    {

        $output = '';
        $data = Comment::where(['parent_comment_id' => 0])->where(['post_id' => $id])->orderByRaw('id DESC')->get();

        foreach ($data as $key => $contents) {
        $user = User::where(['id' => $contents['user_id']])->get();
        foreach ($user as $key => $users) {
            $name_customer = $users['lastname']. ' '. $users['firstname'];
        }

            $output .= 
            '<div class="row comment_form">
            <div class="col-sm-2">
                <img src="'.url('../storage/app/upload/avatar.jpg').'">
            </div>
            <div class="col-sm-10">
                <label>'.$name_customer.'</label>
                <p>'.$contents['content'].'</p>
                <div class="col-sm-10 comment_form-show_reply">
                    <span>'.$contents['time'].'</span> <span>|</span>
                    <a href="" class="reply" id="reply'.$contents['id'].'">Reply</a>
                </div>
            </div>
            </div>';
            $data1 = Comment::where(['parent_comment_id' => $contents['id']])->where(['post_id' => $id])->orderByRaw('id ASC')->get();
            foreach ($data1 as $key => $value) {
            $user1 = User::where(['id' => $value['user_id']])->get();
            foreach ($user1 as $key => $users1) {
                $name_customer1 = $users1['lastname']. ' '. $users1['firstname'];
            }
                $output .= 
                '<div class="row comment_form" style="margin-left: 50px;">
                <div class="col-sm-2">
                    <img src="'.url('../storage/app/upload/avatar.jpg').'">
                </div>
                <div class="col-sm-10">
                    <label>'.$name_customer1.'</label>
                    <p>'.$value['content'].'</p>
                    <div class="col-sm-10 comment_form-show_reply">
                        <span>'.$value['time'].'</span> <span>|</span>
                        <a href="" class="reply" id="reply'.$contents['id'].'">Reply</a>
                    </div>
                </div>
                </div>';
            }
        }
        echo $output;
    }

    public function store(Request $request, $id)
    {

    	if (!Auth::check()) {
    		Session::flash('comment_warning', 'Vui Long Dang Nhap Truoc');

    		return redirect('login');
    	}
    	elseif (Auth::check()) {
    		$user = Auth::user();
    	 	$rules = [
    	 		'comment' => 'required',
    	 	];

    	 	$messeges = [
    	 		'comment.required' => 'Vui Long De Lai Binh Luan Cua Ban',
    	 	];

    	 	$validator = Validator::make($request->all(), $rules, $messeges);
	        if ($validator->fails()) {
	            return redirect('/blogs/'.$id)->withErrors($validator)->withInput();
	        }
	        if (isset($_POST['comment'])) {

	            date_default_timezone_set('Asia/Ho_Chi_Minh');
	            $comment = new Comment();
	            $comment->user_id = $user['id'];
	            $comment->post_id = $request->input('post_id');
	            $comment->content = $request->input('comment');
	            $comment->time = date('H:i:s, d-m-Y');
	            $comment->save();

	            return redirect('/blogs/'. $id);
	        }
    	}
    }
}
