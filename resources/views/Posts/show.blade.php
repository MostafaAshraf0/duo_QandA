<x-Layout>

<a href="/" class="inline-block text-black ml-4 mb-4 "
><i class="fa-solid fa-arrow-left"></i> Back
</a>

<div class="m-6 p-6 border-2 rounded-xl">

        <div class="flex flex-row divide-x ">
            
            <div class="flex flex-col ">
                <img
                class="w-48 mr-6 mb-6"
                src="{{$Post->image ? asset('storage/'. $Post->image) : asset('/images/no-image.png')}}"
                alt=""
                />
                
                <h3 class="text-2xl mb-2">{{$Post->title}}</h3>
                
                <x-Post-tags :tagsCsv="$Post->tags" />
                    
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-building-user"></i> {{$Post->department}}
                    </div>
                    <form method="Post" action="{{ route('comment.add') }}">
                        @csrf
                        <label class="block">
                            
                            <div class="form-group p-3">
                                <input type="text" name="c_body" class="border-2 border-zinc-800   placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 rounded-lg" placeholder="write your comment here"/>
                                <input type="hidden" name="post_id" value="{{ $Post->id }}" />
                                <button class="bg-black text-white  hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 rounded-lg p-1">
                                    <h1>Add comment</h1> 
                                </button>
                                @error('c_body')
                                <p class="text-red-500 text-xs mt-1">Please fill out this field </p>
                                @enderror
                                
                            </div>
                        </label>
                    </form>
                </div>
                
                <hr/>
                
                <div class="flex flex-col pl-4 ">
                    
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    
                    {{$Post->description}}
                    
                    <a href="mailto:{{$Post->email}}"
                        class="block bg-laravel text-white w-fit my-6 p-2 rounded-xl hover:opacity-80 ">
                        <i class="fa-solid fa-envelope p-1 "></i>
                        Contact 
                    </a>
                </div>
                
            </div>
            
            <div class="p-3">
                @include('partials._comment_replies', ['comments' => $Post->comments, 'post_id' => $Post->id])
            </div>
        </div>
    </div>
</x-Layout>