@extends('kategori.movie')

@section('content')



<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/movie') }}">Movie</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
        @endif
    </div>

  <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="sidebar.blade.php" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">MovieApp</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="sidebar.blade.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Home</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="movies.index" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class="ri-film-line mr-3 text-lg"></i>
                <span class="text-sm">Movie</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="movies.index">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
  
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
  
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Movie</span></a>
      </li>
  
      {{-- <li class="nav-item">
        <a class="nav-link" href="/profile">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
      </li> --}}
  
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
  
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

  </div>

  <!-- start: Main -->
        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
            <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
                <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                    <i class="ri-menu-line"></i>
                </button>
                <ul class="flex items-center text-sm ml-4">
                    <li class="mr-2">
                        <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
                    </li>
                    <li class="text-gray-600 mr-2 font-medium">/</li>
                    <li class="text-gray-600 mr-2 font-medium">Movie</li>
                </ul>
    
                <!-- Searching -->
                <ul class="ml-auto flex items-center">
                    <li class="mr-1 dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                            <form action="" class="p-4 border-b border-b-gray-100">
                                <div class="relative w-full">
                                    <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                                    <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </form>
                            
                            <input wire:model.debounce.500ms="search" wire:keydown.escape="resetSearch" wire:keydown="searchMovie" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-10 py-1 focus:outline-none focus:shadow-outline" placeholder="Cari">
                            <div class="mt-3 mb-2">
                                <div class="text-[13px] font-medium text-gray-400 ml-4 mb-2">Recently</div>
                                <ul class="max-h-64 overflow-y-auto">
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Hunting of House</div>
                                                <div class="text-[11px] text-gray-400">9.9</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Joker</div>
                                                <div class="text-[11px] text-gray-400">8.6</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Mervel</div>
                                                <div class="text-[11px] text-gray-400">8.9</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">The Nun 2</div>
                                                <div class="text-[11px] text-gray-400">8.7</div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                            <i class="ri-notification-3-line"></i>
                        </button>
                        <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                            <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                                <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                                <button type="button" data-tab="notification" data-tab-page="messages" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                            </div>
    
                            <!-- nav. Notifications -->
                            <div class="my-2">
                                <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New User</div>
                                                <div class="text-[11px] text-gray-400">from a Rio M</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New User</div>
                                                <div class="text-[11px] text-gray-400">from a Vallery Agatha</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New User</div>
                                                <div class="text-[11px] text-gray-400">from a William Bolston</div>
                                            </div>
                                        </a>
                                    </li>
                                
                                    <!-- nav. Messages -->
                                </ul>
                                <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification" data-page="messages">
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Thimotie</div>
                                                <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Kevin George</div>
                                                <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Vallerie Agatha</div>
                                                <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </li>
    
                    <!-- fitur "Titik 3 "-->
                    <li class="dropdown ml-3">
                        <button type="button" class="dropdown-toggle flex items-center">
                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                        </button>
                        <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            {{-- <li>
                                <a href="profile.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li> --}}
                            <li>
                                <a href="/home" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- TAMPILAN: Movies -->
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Movies</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                        <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View details</a>
                            </li>
                            <!-- <li>
                                <a href="edit.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Edit</a>
                            </li> -->
                            <!-- <li>
                                <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Edit</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                        <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View details</a>
                            </li>

                        
                            <!-- <h1 class="mb-0">Edit Product</h1>
                            <hr />
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">#</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" >
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" >
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
                                    </div>
                                </div>
                            </form> -->

                            <!-- <li>
                                <a href="edit.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Edit</a>
                            </li> -->
                            <!-- <li>
                                <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <form action="" class="flex items-center mb-4">
                    <select class="text-sm py-2 pl-4 pr-10 bg-gray-50 border border-gray-100 rounded-md focus:border-blue-500 outline-none appearance-none bg-select-arrow bg-no-repeat bg-[length:16px_16px] bg-[right_16px_center]">
                        <option value="">Filter</option>
                        <div class="container mx-auto mt-10">
                            <a href="{{ route('create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                        </div>

                        <!-- <option value="">Name</option>
                        <option value="">Genre</option>
                        <option value="">Rate</option> -->
                        <!-- <li class="mb-4">
                            <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Edit</a>
                        </li>  -->
                    </select>
                </form>
                <form action="" class="flex items-center mb-4"></form>

            </div>

            <div>
            
            </div>

        </main>

        
        {{--  --}}
        <!-- start: Main -->
        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
          <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
              <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                  <i class="ri-menu-line"></i>
              </button>
              <ul class="flex items-center text-sm ml-4">
                  <li class="mr-2">
                      <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
                  </li>
                  <li class="text-gray-600 mr-2 font-medium">/</li>
                  <li class="text-gray-600 mr-2 font-medium">Movie</li>
              </ul>
  
              <!-- Searching -->
              <ul class="ml-auto flex items-center">
                  <li class="mr-1 dropdown">
                      <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                          <i class="ri-search-line"></i>
                      </button>
                      <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                          <form action="" class="p-4 border-b border-b-gray-100">
                              <div class="relative w-full">
                                  <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                                  <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
                              </div>
                          </form>
                          
                          <input wire:model.debounce.500ms="search" wire:keydown.escape="resetSearch" wire:keydown="searchMovie" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-10 py-1 focus:outline-none focus:shadow-outline" placeholder="Cari">
                          <div class="mt-3 mb-2">
                              <div class="text-[13px] font-medium text-gray-400 ml-4 mb-2">Recently</div>
                              <ul class="max-h-64 overflow-y-auto">
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Hunting of House</div>
                                              <div class="text-[11px] text-gray-400">9.9</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Keluarga Cemara 2</div>
                                              <div class="text-[11px] text-gray-400">8.9</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Mervel</div>
                                              <div class="text-[11px] text-gray-400">8.9</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">The Nun 2</div>
                                              <div class="text-[11px] text-gray-400">8.5</div>
                                          </div>
                                      </a>
                                  </li>
                                  
                              </ul>
                          </div>
                      </div>
                  </li>
                  <li class="dropdown">
                      <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                          <i class="ri-notification-3-line"></i>
                      </button>
                      <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                          <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                              <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                              <button type="button" data-tab="notification" data-tab-page="messages" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                          </div>
  
                          <!-- nav. Notifications -->
                          <div class="my-2">
                              <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                              <div class="text-[11px] text-gray-400">from a Rio M</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                              <div class="text-[11px] text-gray-400">from a Vallery Agatha</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                              <div class="text-[11px] text-gray-400">from a William Bolston</div>
                                          </div>
                                      </a>
                                  </li>
                              
                                  <!-- nav. Messages -->
                              </ul>
                              <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification" data-page="messages">
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Thimotie</div>
                                              <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Kevin George</div>
                                              <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                          <div class="ml-2">
                                              <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">Vallerie Agatha</div>
                                              <div class="text-[11px] text-gray-400">Hello there! ...</div>
                                          </div>
                                      </a>
                                  </li>
                                  
                              </ul>
                          </div>
                      </div>
                  </li>
  
                  <!-- fitur "Titik 3 "-->
                  <li class="dropdown ml-3">
                      <button type="button" class="dropdown-toggle flex items-center">
                          <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                      </button>
                      <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                          <li>
                              <a href="profile.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                          </li>
                          <li>
                              <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>

          <!-- TAMPILAN: Movies -->
          <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
              <div class="flex justify-between mb-4 items-start">
                  <div class="font-medium">Movies</div>
                  <div class="dropdown">
                      <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                      <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                          <li>
                              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View details</a>
                          </li>
                          <!-- <li>
                              <a href="edit.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Edit</a>
                          </li> -->
                          <!-- <li>
                              <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                          </li> -->
                      </ul>
                  </div>
              </div>
          </div>

          <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
              <div class="flex justify-between mb-4 items-start">
                  <div class="font-medium">Edit</div>
                  <div class="dropdown">
                      <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                      <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                          <li>
                              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View details</a>
                          </li>

                      
                          <!-- <h1 class="mb-0">Edit Product</h1>
                          <hr />
                          <form action="{{ route('products.update', $product->id) }}" method="POST">
                              <div class="row">
                                  <div class="col mb-3">
                                      <label class="form-label">#</label>
                                      <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" >
                                  </div>
                                  <div class="col mb-3">
                                      <label class="form-label">Price</label>
                                      <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col mb-3">
                                      <label class="form-label">Product Code</label>
                                      <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" >
                                  </div>
                                  <div class="col mb-3">
                                      <label class="form-label">Description</label>
                                      <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="d-grid">
                                      <button class="btn btn-warning">Update</button>
                                  </div>
                              </div>
                          </form> -->

                          <!-- <li>
                              <a href="edit.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Edit</a>
                          </li> -->
                          <!-- <li>
                              <a href="settings.html" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                          </li> -->
                      </ul>
                  </div>
              </div>
              <form action="" class="flex items-center mb-4">
                  <select class="text-sm py-2 pl-4 pr-10 bg-gray-50 border border-gray-100 rounded-md focus:border-blue-500 outline-none appearance-none bg-select-arrow bg-no-repeat bg-[length:16px_16px] bg-[right_16px_center]">
                      <option value="">Filter</option>
                      <div class="container mx-auto mt-10">
                          <a href="{{ route('create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                      </div>

                      <!-- <option value="">Name</option>
                      <option value="">Genre</option>
                      <option value="">Rate</option> -->
                      <!-- <li class="mb-4">
                          <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Edit</a>
                      </li>  -->
                  </select>
              </form>
              <form action="" class="flex items-center mb-4"></form>

          </div>

          <div>
          
          </div>

      </main>
</body>