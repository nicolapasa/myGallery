@extends('layouts.app')

@section('content')

@if (session()->has('message'))
        
     <div class="w-4/5 m-auto">

              <p class="w-1/5 mb-4 text-gray-200 bg-green-700 rounded py-4 text-center px-2">{{ session()->get('message') }}</li>

     </div>
 
@endif


<div class="w-4/5  m-auto text-center">
<div class="text-left mt-2"><a href="/admin/create" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
    New Pic
</a></div>    

  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
      <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
        <tr>
            <th class="text-sm font-medium text-white px-6 py-4">id</th>
            <th class="text-sm font-medium text-white px-6 py-4">title</th>
            <th class="text-sm font-medium text-white px-6 py-4">preview</th>
            <th class="text-sm font-medium text-white px-6 py-4">edit</th>
            <th class="text-sm font-medium text-white px-6 py-4">delete</th>
        </tr>
    </thead>
    <tbody>
  @foreach($posts as $post)      
  <tr class="bg-white border-b">
        <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            {{ $post->id  }}
            </td>
            <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            {{ $post->title  }}
            </td>
            <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
           <img src="{{ asset('img/'.$post->image_path) }}" alt="" class="block object-cover object-center w-20 h-20 rounded-lg"> 
            </td>
            <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="/admin/{{ $post->id }}/edit"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">edit</a>
            </td>
            <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <form action="/admin/{{ $post->id }}" method="post">
                      @csrf  
                      @method("delete")

                      <button class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="submit">Delete</button>
                      </form>
            </td>
        </tr>
  @endforeach      
    </tbody>
  </table>  
  </div>
    </div>
  </div>
</div>


@endsection