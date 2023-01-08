<x-Layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit a Post
                            </h2>
                            <p class="mb-4">Edit : {{$Post->title}}</p>
                        </header>
    
                        <form method="POST" action="/Posts/{{$Post->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="title"
                                    class="inline-block text-lg mb-2"
                                    >Title</label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="title"
                                    placeholder="Subject"
                                    value="{{$Post->title}}"
                                    />
    
                                    @error('title')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="student_name" class="inline-block text-lg mb-2">
                                    Student Name</label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="student_name"
                                    placeholder="Example: Nurettin Kartal"
                                    value="{{$Post->student_name}}"
                                    />
    
                                    @error('student_name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="student_number" class="inline-block text-lg mb-2">
                                    Student Number
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="student_number"
                                    placeholder="Example: 200527122"
                                    value="{{$Post->student_number}}"
                                    />
    
                                    @error('student_number')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label
                                    for="department"
                                    class="inline-block text-lg mb-2"
                                    >Department</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="department"
                                    placeholder="Example: mis , cs"
                                    value="{{$Post->department}}"
                                    />
                                    
                                    @error('department')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="email" class="inline-block text-lg mb-2">
                                    Email
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="email"
                                    value="{{$Post->email}}"
                                    />
    
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            
    
                            <div class="mb-6">
                                <label for="tags" class="inline-block text-lg mb-2">
                                    Tags (Comma Separated)
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags"
                                    placeholder="Example: Laravel, Backend, etc"
                                    value="{{$Post->tags}}"
                                    />
    
                                @error('tags')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="image" class="inline-block text-lg mb-2">
                                    image
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="image"/>

                                    <img
                                    class="w-48 mr-6 mb-6"
                                    src="{{$Post->image ? asset('storage/'. $Post->image) : asset('/images/no-image.png')}}"
                                    alt=""
                                    />
    
                                    @error('image')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="inline-block text-lg mb-2">
                                    Description
                                </label>
                                <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="">
                                {{$Post->description}}
                                
                            </textarea>
                            @error('description')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                    update Post
                                </button>
    
                                <a href="/" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
                    </x-card>
    </x-Layout>