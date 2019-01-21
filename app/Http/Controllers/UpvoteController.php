<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upvote;
use Illuminate\Support\Facades\Session;

class UpvoteController extends Controller
{
    public function upvote($post_id,$user_id){
        $upvote = Upvote::where(
            [
                ['post_id','=',$post_id],
                ['user_id','=',$user_id]
            ]
        )->get();
        if($upvote->count()==0){
       $upvote= new Upvote();
       $upvote->post_id=$post_id;
       $upvote->user_id=$user_id;
       $upvote->save();
       $post=\App\Post::find($post_id);
       $post->upvotes+=1;
       $post->save();
       return back();
        }
        else
        Session::flash('fail',$post_id.''.$user_id);
        return back();

    }
}
