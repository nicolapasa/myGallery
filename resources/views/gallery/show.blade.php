@extends('layouts.app')


@section('content')




<div class="mx-auto w-4/5 py-15 border-b border-gray-200">
  


<div class="text-center">

<h1 class="text-gray-900 py-3 px-3 text-center text-lg font-extrabold uppercase" >{{ $post->title  }}</h1>
        <img src="{{ asset('img/'.$post->image_path) }}" alt="" class="w-full">

<p>{{ $post->description  }} </p>
       
</div>
 


</div>
@endsection