@extends('kategori.index')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body>
    
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/adminds') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
        @endif
    </div>

<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">MovieApp</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Movie</span>
            </a>
        </li>
        
    </ul>

    
</div>
{{-- <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div> --}}
</body>

</html>

@endsection