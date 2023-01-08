<section
class="relative h-72 bg-laravel  flex flex-col justify-center align-center text-center space-y-4 mb-4" style="background-color: #AF0404">
<div
    class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/uni-logo.png')">
</div>

<div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white">
        Dou<span class="text-black">ASK</span>
    </h1>
    <blockquote class="text-2xl font-semibold italic text-center text-white">
        Find
        <span class="relative text-black ">/ </span>
        </span>
        Post your inquiry
    </blockquote>
    <div>
        @auth
        <a
        href="/Posts/create"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
        >
            Post
        </a>
        @include('partials._search')
        @else
        <a
            href="/register"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Sign Up</a>
            @include('partials._search')
    </div>
        
        @endauth
</div>
</section>