<?php  
$output = '';
foreach ($data as $key => $contents) {
            $output .= 
            '<div class="row comment_form">
            <div class="col-sm-2">
                <img src="'.url('../storage/app/upload/avatar.jpg').'">
            </div>
            <div class="col-sm-10">
                <label>'.$contents['user_id'].'</label>
                <p>'.$contents['content'].'</p>
                <div class="col-sm-10 comment_form-show_reply">
                    <span>'.$contents['time'].'</span> <span>|</span>
                    <a href="" id="reply'.$contents['id'].'">Reply</a>
                </div>
            </div>
            </div>';
        }
    echo $output;
?>
