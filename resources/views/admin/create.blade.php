@extends('layouts.app')



@section('content')

<div class="w-4/5  m-auto text-left">
    <div class="py-15 border-b ">
        <h1 class="text-6xl  ">Create Gallery Post</h1>
    </div>
</div>



@if ($errors->any())
        
     <div class="w-4/4 m-auto">
        <ul>
            @foreach ($errors->all() as $error )
              <li class="w-1/5 mb-4 text-gray-200 bg-red-700 rounded-lg py-4">{{ $error }}</li>

            @endforeach
        </ul>
     </div>
 
@endif

<div class="w-4/5 m-auto pt-20">

            <form action="/admin" 
                  method="POST"
                  enctype="multipart/form-data"
                  >
                  @csrf

                  <input type="text" name="title" placeholder="title" class="block bg-transparent border-b-2 w-full h-20  text-6xl outline-none">

                  <textarea name="description" placeholder="description... "  class="py-5 bg-transparent border-b-2 w-full h-60  text-6xl outline-none"></textarea>

                  <div class="bg-gray-lighter pt-15 ">
                    <label class="w-44 flex flex-col  items-center px-2 py-3 bg-white-rounded-lg shadow-lg border border-blue uppercase cursor-pointer">
                        <span class="mt-2 text-base leading-normal">
                            select a file
                        </span>
                        <input type="file" name="image" class="hidden">
                    </label>
                  </div> 
                  <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-xl font-extrabold rounded px-8 py-4">Save</button>
            </form>
</div>

@endsection