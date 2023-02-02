@extends('layouts.app')


@section('content')




<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4  gap-20 mx-auto w-4/5 py-15 border-b border-gray-200">
  

@foreach ($posts as $post)
<div class="text-center">
    <a href="/gallery/{{ $post->id }}">
        <img src="{{ asset('img/'.$post->image_path) }}" alt="" class="rounded shadow">


        <span class="text-gray-600 py-3 px-3 text-center" >{{ $post->title  }}</span>
        </a>   
</div>
 

@endforeach
</div>
@endsection