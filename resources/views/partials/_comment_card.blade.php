{{-- comment --}}

<div class="p-3">
    <div class="p-3">Comments</div>  
@include('partials._comment_replies', ['comments' => $Post->comments, 'post_id' => $Post->id])
<hr />
<form method="Post" action="{{ route('comment.add') }}">
    @csrf
    <label class="block">
        
        <div class="form-group p-3">
            <input type="text" name="c_body" class="border-2 border-zinc-800   placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 " placeholder="write your comment here"/>
            {{-- <span class="block text-sm font-medium text-slate-700">Add Comment</span> --}}
            <input type="hidden" name="post_id" value="{{ $Post->id }}" />
            <button class="bg-black text-white  hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 rounded-lg p-1">
                <h1>Add comment</h1> 
            </button>
            @error('c_body')
            <p class="text-red-500 text-xs mt-1">Please fill out this field </p>
            @enderror
            
        </div>
        {{-- <div class="form-group">
            <input type="submit" class="btn btn-warning border-double border-4 border-sky-500" value="Add Comment" />
        </div> --}}
    </label>
</form>
</div>






