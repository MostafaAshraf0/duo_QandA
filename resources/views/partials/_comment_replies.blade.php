<!-- _comment_replies -->
{{-- <link rel="stylesheet" href="app.css"> --}}
@foreach($comments as $comment)

<div class="flex flex-col mb-8  rounded-lg drop-shadow-2xl  " >
    <hr />
</div>

<div class="flex flex-col p-8 bg-white border-b border-gray-200 rounded-lg drop-shadow-2xl md:rounded-lg w-fit ">
    <strong class="space-y-0.5 font-medium dark:text text-left">{{ $comment->user->name }}</strong>
    <p class=" font-dark">{{ $comment->c_body }}</p>
</div>

<form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group flex flex-row m-2 opacity-50 duration-150 ">
            <input type="text" name="c_body" class="form-control border-zinc-800 rounded-lg" placeholder="write your reply here"/>
            <input type="hidden" name="post_id" value="{{ $Post->id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            <button class="fa-solid fa-reply"></button>
            @error('c_body')
                <p class="text-red-500 text-xs mt-1">Please fill out this field </p>
            @enderror
        </div>
        
</form>
    @include('partials._comment_replies', ['comments' => $comment->replies])



@endforeach


