<x-Layout>
{{-- @include('partials._hero') --}}


<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 space-x-4" >

@unless (count($Posts)==0)

@foreach ($Posts as $Post)
<x-Post-card :Post="$Post"/>
@endforeach

@else
<p>No Posts found</p>
@endunless
</div>
<div class="mt-6 space-x-4">
    {{$Posts->links()}}
</div>
</x-Layout>