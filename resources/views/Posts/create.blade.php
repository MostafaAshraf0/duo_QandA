<x-Layout>

<div class="p-10 max-w-lg mx-auto mb-4 mt-4">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Post
                        </h2>
                    </header>

                    <form method="POST" action="/Posts" enctype="multipart/form-data" >
                        <div    class="grid grid-cols-2">
                            
                            @csrf
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
                                value="{{old('title')}}"
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
                                    value="{{old('student_name')}}"
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
                                value="{{old('student_number')}}"
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
                                value="{{old('department')}}"
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
                                value="{{old('email')}}"
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
                                value="{{old('tags')}}"
                                />
                                
                                @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                            
                            

                            <div class="w-[200%] h-8">
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
                                {{old('description')}}
                                
                                </textarea>
                                @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                                </div>

                                <div class="mb-6 ">
                                    <label for="image" class="inline-block text-lg mb-2">
                                        image
                                    </label>
                                    <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="image"/>
                                    
                                    @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="pb-12 pr-0 grid">
                                    <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                    Create Post
                                    </button>
                                    </div>
                                
                        </div>
                        </form>
                    </div>
</x-Layout>