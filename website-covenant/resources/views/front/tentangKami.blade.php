
@vite(['resources/css/app.css','resources/js/app.js'])

@extends('layouts.appUser')
  
  @section('content')
  <div class="min-h-screen lg:px-10 xl:px-20">
 
        <div class="py-12 ">
            <h2 class="mb-2 block font-sans text-4xl font-semibold leading-[1.3] tracking-normal text-blue-gray-900 antialiased">
              INI TENTANG KAMI PAGE!!!
            </h2>
            <p class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                software like Aldus PageMaker including versions of Lorem Ipsum
            </p>  
        </div>
  </div>
  @endsection