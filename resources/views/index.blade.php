@extends('layouts.app')

@section('content')
<div class="w-4/5  m-auto text-center">
    <div class="py-15 border-b ">
        <h1 class="text-6xl  ">Recent posts</h1>
    </div>
</div>



<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4  gap-20 mx-auto w-4/5 py-15 border-b border-gray-200">
@foreach ($posts as $post)

<div class="text-center">
     
        <img src="{{ asset('img/'.$post->image_path) }}" alt="" class="rounded shadow">

        <span class="text-gray-600 py-3 px-3 text-center" >{{ $post->title  }}</span>
</div>

@endforeach


</div>
@endsection