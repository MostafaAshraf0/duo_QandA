<x-layout>

<x-card>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >
    @unless (count($users)==0)
    @foreach ($users as $user)
    <div class="flex ">
            <h3 class="text-2xl">
                <a href="/Posts/{{$user->id}}">{{$user->name}}</a>
            </h3>
                <div class="text-lg mt-4">
                <i class="fa-solid fa-building-user"></i> {{$user->department}}
                <p>{{$user->type}}</p>
            </div>
        </div>
    
    @endforeach

@else
<p>No users found</p>
@endunless
</div>
</x-card>
</x-Layout>


