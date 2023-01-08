<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Checker;

class CommentController extends Controller
{
    // save comment
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->c_body = $request->validate([
            'c_body' => 'required',
        ]);
        $comment->c_body = $request->get('c_body');
        $comment->user()->associate($request->user());
        $Post = Post::find($request->get('post_id'));
        $Post->comments()->save($comment);
        
            
            
            return back();
        
        
    }
// replay
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->c_body = $request->validate([
            'c_body' => 'required',
        ]);
        $reply->c_body = $request->get('c_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);


        return back();
    }

}
