<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ID Generator') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Welcome To IT Corner</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">




</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin/home') }}">
                    Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                        <li class="nav-item">
                            <a href="{{route('all.employee')}}" class="nav-link">Employees</a>
                        </li> 

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ID Card
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{route('all-id-carts')}}">All ID</a></li>
                              <li><a class="dropdown-item" href="{{route('id-cart')}}">Create ID</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Salary Sheet
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{route('salary_acceptance')}}">Salary Acceptence</a></li>
                              <li><a class="dropdown-item" href="{{route('sheet_for_bank')}}">Salary Sheet For Bank</a></li>
                            </ul>
                        </li>



                        {{-- letters drop down   --}}
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Letters </a>
							<ul class="dropdown-menu">
								
								<li><a class="dropdown-item" href="#"> Promotion Letter &raquo; </a>
									<ul class="submenu dropdown-menu">
										<li><a class="dropdown-item" href="{{ route('all.letter') }}">All Letter</a></li>
                                        <li><a class="dropdown-item" href="{{route('promotion-letter.index')}}">Create Letter</a></li>
									</ul>
								</li>
								<li><a class="dropdown-item" href="#"> Intern Offer Letter &raquo; </a>
									<ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('all.intern.letter') }}">All Letter</a></li>
										<li><a class="dropdown-item" href="{{route('intern-letter.index')}}">Create Letter</a></li>
									</ul>
								</li>
								<li><a class="dropdown-item" href="#"> job Agreement &raquo;</a>
									<ul class="submenu dropdown-menu">
										<li><a class="dropdown-item" href="{{ route('all.agreement') }}">All Agreement</a></li>
										<li><a class="dropdown-item" href="{{ route('jobagreement.index') }}">Create Job Agreement</a></li>
									</ul>
								</li>
								
							</ul>
						</li>


                        {{-- setting Drop down  --}}
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Settings </a>
							<ul class="dropdown-menu">
								
								<li><a class="dropdown-item" href="#"> Bank Settings &raquo; </a>
									<ul class="submenu dropdown-menu">
										<li><a class="dropdown-item" href="{{ route('add.bank') }}">Add Bank</a></li>
                                        <li><a class="dropdown-item" href="{{route('add.branch')}}">Add Branch</a></li>
									</ul>
								</li>
								<li><a class="dropdown-item" href="#"> **** &raquo; </a>
									<ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('all.intern.letter') }}">All Letter</a></li>
										<li><a class="dropdown-item" href="{{route('intern-letter.index')}}">Create Letter</a></li>
									</ul>
								</li>
								<li><a class="dropdown-item" href="#"> **** &raquo;</a>
									<ul class="submenu dropdown-menu">
										<li><a class="dropdown-item" href="{{ route('all.agreement') }}">All Agreement</a></li>
										<li><a class="dropdown-item" href="{{ route('jobagreement.index') }}">Create Job Agreement</a></li>
									</ul>
								</li>
								
							</ul>
						</li>

                        
                       






                        {{-- all print route  --}}
                        @if(Route::getCurrentRoute()->getName()  ==  'print-selected')
                            <li class="nav-item">
                                <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print ID</a>
                            </li>
                        @endif

                        @if(Route::getCurrentRoute()->getName()  ==  'letter_print_selected')
                            <li class="nav-item">
                                <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print Promotion Letter</a>
                            </li>
                        @endif

                        @if(Route::getCurrentRoute()->getName()  ==  'intern-letter-print-selected')
                            <li class="nav-item">
                                <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print Intern Letter</a>
                            </li>
                        @endif

                       
                        @if(Route::getCurrentRoute()->getName()  ==  'job_agreement_print_selected')
                        <li class="nav-item">
                            <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print Job Agreement</a>
                        </li>
                        @endif

                        @if(Route::getCurrentRoute()->getName()  ==  'salary_acceptance')
                        <li class="nav-item">
                            <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print salary Acceptance</a>
                        </li>
                        @endif


                        @if(Route::getCurrentRoute()->getName()  ==  'sheet_for_bank')
                        <li class="nav-item">
                            <a href="Javascript:void(0)"  class="nav-link" onclick="print()">Print Bank Sheet</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')
</body>
</html>
