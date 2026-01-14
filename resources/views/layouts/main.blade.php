<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maps Ratings </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="cdn.jsdelivr.net" rel="stylesheet">
    <link href="cdn.jsdelivr.net" rel="stylesheet">


</head>
<body dir="rtl" style="text-align: right">
      <div>
        {{-- navbar --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-center">
  <div class="container-fluid">
    <i class="bi bi-compass-fill"></i>
    <a class="navbar-brand pl-5" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            

            <li class="nav-item {{request()->is('channel*') ? 'active':''}} me-5" style="list-style: none">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="bi bi-tv"></i>
                القنوات</a>
            </li>

            
        </ul>

       
            <ul class="navbar-nav mx-auto">
                
                    @guest
                    <li class="nav-item" style="list-style: none">
                        <a href="{{route('login')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                            </svg>
                            {{__('تسجيل دخول')}}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item" style="list-style: none">
                        <a href="{{route('register')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                            </svg>
                            {{__('إنشاء حساب')}}</a>

                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown justify-content-left" style="list-style: none">
                        <a href="#" id="navbarDropdown" class="nav-link" data-bs-toggle="dropdown" >
                            <img  class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url}}" alt="{{Auth::user()->name}}">
                        </a>
                    <div class="dropdown-menu dropdown-menu-left px-2 text-right mt-2">
                       
                        <hr>
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                

                                <div class="mt-3 space-y-1">
                                    <div>

                                    <x-responsive-nav-link href="#" :active="request()->routeIs('profile.show')">
                                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    </x-responsive-nav-link>
                                    </div>
                                    <hr>
                                    <!-- Account Management -->
                                    <div>
                                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                        {{ __('الملف الشخصي') }}
                                    </x-responsive-nav-link>
                                    </div>
                                    <hr>
                                    @can('update-videos')
                                    <div>
                                        <a href="{{ route('admin.index')}}">لوحة الإدارة</a>
                                    </div>
                                    <hr>
                                        
                                    @endcan


                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                            {{ __('API Tokens') }}
                                        </x-responsive-nav-link>
                                    @endif

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                                        @csrf
                                    </form>

                                    <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>


                                    <!-- Team Management -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                            {{ __('Team Settings') }}
                                        </x-responsive-nav-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                {{ __('Create New Team') }}
                                            </x-responsive-nav-link>
                                        @endcan

                                        <!-- Team Switcher -->
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                                            @endforeach
                                        @endif
                                    @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
  </div>
</nav>
      <main>
        @include('includes/header')
        @if (Session::has('success'))
        <div class="p-3 mb-2 bg-success text-white rounded mx-auto col-8">
          <span class="text-center">{{ session('success')}}</span>
        </div>
            
        @endif
        @yield('content')
      </main>
      </div>
    @yield('script')
    

</body>
</html>