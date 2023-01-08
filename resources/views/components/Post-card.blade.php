@props(['Post'])

<x-card>
    <div class="flex">
        @auth
        <i class="fa fa-thumbs-up" presslove {{$Post->likes->contains('user_id',auth()->id()) ? 'red' : ''}} aria-hidden="true">{{$Post->likes->count()}}</i>
        @else
        <i class="fa fa-thumbs-up" presslove aria-hidden="true">{{$Post->likes->count()}}</i>
        @endauth
        <img
        class="hidden w-48 mr-6 md:block"
        src="{{$Post->image ? asset('storage/'. $Post->image) : asset('/images/no-image.png')}}"
        alt=""/>
        <div>
            <h3 class="text-2xl">
                
                <a href="/Posts/{{$Post->id}}">{{$Post->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$Post->created_at}}</div>
            <x-Post-tags :tagsCsv="$Post->tags" />
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-building-user"></i> {{$Post->department}}
                </div>
            </div>
            <tr>
                <td>
                    {!! Share::page(url('/post/'. $Post->id))->facebook()->telegram()->twitter()->linkedin()->whatsapp()->reddit() !!}
                </td>
            </tr>
    </div>
</x-card>