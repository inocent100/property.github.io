<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> --}}

	{{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/toggle-switchy.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.13.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/smart_wizard_all.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/photos-popup.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/floating-labels.css')}}"> --}}

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">


    <script src="{{asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script src="{{asset('js/jquery.smartWizard.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    {{-- <script src="{{asset('js/owl.carousel.min.js')}}"></script> --}}

    <script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>

    <script src="{{ asset('js/jquery.timeago.js') }}" ></script>


<style>
    .nav a{
    font-size: 1.3em !important;
    }

    .bg-company-red {
    background-color: #34495e;
}
</style>



</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-company-red sticky-top">
    <a href="{{route('/')}}" class="navbar-brand"><div style="border-radius: 50%; border:1px solid #34495e;width:50px;height:50px;background:white;display:inline-block;padding:3px;float:left;"><img src="{{asset('images/logo5.png')}}" alt="Image" width="40" height="40"></div>
        <div style="font-size:1.7em;font-weight:bold;float:left;">&nbsp;&nbsp;Real State</div></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto nav">
            <a href="{{route('/')}}" class="nav-item nav-link  @if($current=='home') {{ 'active'}} @endif"></i>&nbsp;Home</a>
            {{-- <i class="fas fa-home"> --}}
              
                <a href="#" class="nav-item nav-link">About Us</a>
                <a href="#" class="nav-item nav-link">Agents</a>
                <a href="{{route('prop_search')}}" class="nav-item nav-link @if($current=='contact') {{ 'active'}} @endif">Search</a>
                <a href="#" class="nav-item nav-link @if($current=='search') {{ 'active'}} @endif">Contact us</a>
                {{-- <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a> --}}

                @if(!isset(Auth::user()->email))

                <a href="{{route('userlogin')}}" class="nav-item nav-link  @if($current=='userlogin') {{ 'active'}} @endif">Login</a>

                <a href="{{route('userregister')}}" class="nav-item nav-link  @if($current=='userregister') {{ 'active'}} @endif">Register</a>
                
                {{-- <li class="nav-item">
                    <a class="nav-link @if($current=='userlogin') {{ 'active'}} @endif" href="/userlogin" >Login</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userregister"  >Register</a>
                </li> --}}

                @else  

                @if(Auth::user()->roles[0]->name == 'User')

                <a href="{{route('publishAd')}}" class="nav-item nav-link  @if($current=='userregister') {{ 'active'}} @endif">Ad Listing</a>

                    {{-- <li class="nav-item"><a class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/adListing">Ad Listing</a></li> --}}

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i>&nbsp;{{ Auth::user()->first_name . " ". Auth::user()->last_name }}</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Inbox</a>
                            <a href="#" class="dropdown-item">Sent</a>
                            <a href="{{ url('/userlogin/logout') }}" class="dropdown-item">Log out</a>
                        </div>
                    </div>


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;">
                            {{ Auth::user()->first_name . " ". Auth::user()->last_name }}
              -          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a style="color:black;" class="dropdown-item" href="#">Action</a>
                          <a style="color:black;" class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a style="color:black;" class="dropdown-item" href="{{ url('/userlogin/logout') }}">Log out</a>
                        </div>
                      </li> --}}
                    
                    {{-- <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="{{ url('/userlogin/logout') }}">Log out</a></li> --}}
                 @else 
                 <a href="{{route('userlogin')}}" class="nav-item nav-link  @if($current=='userlogin') {{ 'active'}} @endif">Login</a>

                 <a href="{{route('userregister')}}" class="nav-item nav-link  @if($current=='userregister') {{ 'active'}} @endif">Register</a>

                    {{-- <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userlogin">Login</a></li>

                    <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userregister">Register</a></li> --}}
                @endif



            @endif

            

                {{-- <a href="#" class="nav-item nav-link">Login</a> --}}
            </div>
        </div>
    </nav>


	{{-- <div id="header" class="sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 id="logo">Real Estate</h1>
				</div>
				<div class="col-md-8">
					<ul id="menu" class="float-md-right sticky-top" >
						<li class="nav-item @if($current=='home') {{ 'active'}} @endif"><a href="/">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Agents</a></li>
						<li><a @if($current=='search') {{ 'active'}} @endif href="/prop_search">Search</a></li>
                        <li><a href="#">Contact us</a></li>

                        @if(!isset(Auth::user()->email))
                
                        <li class="nav-item">
                            <a class="nav-link @if($current=='userlogin') {{ 'active'}} @endif" href="/userlogin" >Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userregister"  >Register</a>
                        </li>
        
                        @else  

                        @if(Auth::user()->roles[0]->name == 'User')
                            <li class="nav-item"><a class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/adListing">Ad Listing</a></li>
    
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;">
                                    {{ Auth::user()->first_name . " ". Auth::user()->last_name }}
                      -          </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a style="color:black;" class="dropdown-item" href="#">Action</a>
                                  <a style="color:black;" class="dropdown-item" href="#">Another action</a>
                                  <div class="dropdown-divider"></div>
                                  <a style="color:black;" class="dropdown-item" href="{{ url('/userlogin/logout') }}">Log out</a>
                                </div>
                              </li>
                            
                            {{-- <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="{{ url('/userlogin/logout') }}">Log out</a></li> --}}
                        {{-- @else 
                            <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userlogin">Login</a></li>
    
                            <li class="nav-item"><a style="font-size:18px;" class="nav-link @if($current=='userregister') {{ 'active'}} @endif" href="/userregister">Register</a></li>
                        @endif
    
    
    
                    @endif

					</ul>
				</div>
			</div>
		</div>
	</div> --}} 
{{-- 
FOR HOW TO USE FONTS 
<i class="fas fa-user"></i> <!-- uses solid style -->
  <i class="far fa-user"></i> <!-- uses regular style -->
  <i class="fal fa-user"></i> <!-- uses light style -->
  <!--brand icon-->
  <i class="fab fa-github-square"></i> <!-- uses brands style --> --}}