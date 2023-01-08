<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class PostController extends Controller
{
    // show all post
    public function index()
    {

        return view('Posts.index', [
            'Posts' => Post::latest()->filter(request(['tag', 'search']))->Paginate(6)
        ]);
    }
    // show single post
    public function show(Post $Post)
    {
        return view('Posts.show', [
            'Post' => $Post
        ]);
    }
    // show create form
    public function create()
    {
        return view('Posts.create');
    }

    // store Post data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'student_name' => 'required',
            'student_number' => 'required|unique:Posts',
            'department' => 'required',
            'email' => 'required|unique:Posts|email',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);

        return redirect('/')->with('message', 'Post Created successfully!');
    }

    // show edit form
    public function edit(Post $Post)
    {
        return view('Posts.edit', ['Post' => $Post]);
    }

    // update Post data
    public function update(Request $request, Post $Post)
    {

        //make sure logged in user is owner
        if ($Post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'student_name' => 'required',
            'student_number' => 'required',
            'department' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $Post->update($formFields);

        return back()->with('message', 'Post updated successfully!');
    }

    // delete Post
    public function delete(Post $Post)
    {
        //make sure logged in user is owner
        if ($Post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $Post->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }

    // manage Posts
    public function manage()
    {
        return view('Posts.manage', ['Posts' => auth()->user()->Posts()->get()]);
    }



    

}
