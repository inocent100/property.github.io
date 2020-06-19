@extends('clients.layout')

@section('content')

<!-- banner -->

<style>

/* select, input {
  margin-bottom: 0;
} */
.alert{
  border-radius: 1rem;
  /* background:none;
  border:none; */
  font-weight: 700;
}
  .panel-heading {
    background:rgba(84, 84, 170, 0.219) !important;
    padding:20px !important;
    margin-bottom: 20px !important;
   
  }

  .panel-body{
    padding:10px;
  }

  .container label{
    font-size:18px;
    font-weight: 200;
    margin:20px 0;
  }

  .container input{
    border-radius: 1rem;
    font-size:16px;
    /* margin-bottom: 30px; */
    height: 50px;
    margin-bottom: 2px;

  }

 
  
/* :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 1.50rem;
}

/* body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
} */

/* .card-signin {
  border: 0;
  border-radius: 0.5rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  margin:0 auto;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
} */

/* .form-label-group input {
  height: auto;
  border-radius: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  /* line-height: 1.5;
  color: #868686;
  /* color: blue; */
  /* border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder { */
  /* color: transparent; 
} */ 

/* .form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
} 

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}*/

/* Fallback for Edge
-------------------------------------------------- */
/*
@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}*/

/* Fallback for IE
-------------------------------------------------- */
/* 
@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
} */

/*///////////////////////////////////////////////////////////////////////////////////*/

</style>

<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="/">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>


<!-- banner -->


{{-- <div class="container">
<div class="spacer">
<div class="row">
  <div class="col-lg-8  col-lg-offset-2"> --}}
  {{-- <img src="images/about.jpg" class="img-responsive thumbnail"  alt="realestate"> --}}


  {{-- ////////////////////////////////////////////////////////////// --}}

  {{-- <div class="container">
    <div class="row">
        <div class="col-sm-8">
          <h2 class="card-title text-center" style="font-size:30px;">Registration</h2>
          <br><br>
        </div>
    </div>
    <div class="row">
         <div class="col-sm-4">
            <div class="form-label-group">
              <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
              <label for="inputFirstName">First Name</label>
            </div>
         </div><!----------END OF COLUMN------------------>

         <div class="col-sm-4">
            <div class="form-label-group">
              <input type="text" id="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
              <label for="inputLastName">Last Name</label>
            </div>
         </div><!----------END OF COLUMN------------------>
    </div><!---------- END OF ROW ---->

      <div class="row">
        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>

        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="text" id="inputPostCode" class="form-control" placeholder="Post Code" required autofocus>
            <label for="inputPostCode">Post Code</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>


      </div><!----------END OF ROW------------------>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="text" id="inputAddress1" class="form-control" placeholder="Address 1" required autofocus>
            <label for="inputEmail">Address 1</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>

        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="text" id="inputAddress2" class="form-control" placeholder="Address 2" required autofocus>
            <label for="inputPostCode">Address 2</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>


      </div><!----------END OF ROW------------------>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="text" id="inputCity" class="form-control" placeholder="City" required autofocus>
            <label for="inputCity">City</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>

        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="text" id="phone" class="form-control" placeholder="Phone" required autofocus>
            <label for="phone">Phone</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>
      </div><!----------END OF ROW------------------>
        
      <div class="row">
        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>

        <div class="col-sm-4">
          <div class="form-label-group">
            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
            <label for="inputConfirmPassword">Confirm Password</label>
          </div>
        </div>  <!----------END OF COLUMN------------------>


      </div><!----------END OF ROW------------------>


    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      {{-- <div class="col-sm-9 col-md-7 col-lg-5 mx-auto"> --}}
        {{-- <div class="card card-signin my-5">
          <div class="card-body" style="padding:20px;">
            <h2 class="card-title text-center" style="font-size:30px;">Registration</h2>
            <br><br>
            <form class="form-signin"> --}}
              {{-- <div class="form-label-group">
                <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
                <label for="inputFirstName">First Name</label>
              </div> --}}

              {{-- <div class="form-label-group">
                <input type="text" id="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
                <label for="inputLastName">Last Name</label>
              </div> --}}

              {{-- <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div> --}}

              {{-- <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                <label for="inputConfirmPassword">Confirm Password</label>
              </div>
              <br><br> --}}

              {{-- <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div> --}}
              {{-- <button style="line-height: 25px;font-size:16px;" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign up</button>
              <hr class="my-4"> --}}
              {{-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> --}}
              {{-- <label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  --}}


   
  <div class="container" style="margin-top:30px;">

    
      
   
    <div class="col-md-11 col-md-offset-1">
        <div class="panel panel-default">
      <div class="panel-heading"><h2><strong>Registration </strong></h2>
          {{-- <div style="float:right; font-size: 80%; position: relative; top:-10px"> --}}
            {{-- <a href="#">Forgot password?</a> --}}
          {{-- </div> --}}

      </div>

      
      <div class="panel-body" style="padding:20px;">

        
      <form action="{{route('userregister.store')}}" method="post">
        @csrf
       {{-- <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
                </div> --}}
                    @if (session('status'))
                    <div class="alert alert-success" style="line-height: 10px;" role="alert">
                        <p><strong>{{ session('status') }}</strong></p>
                    </div>
                   @endif
            

                <div class="row">
                  <div class="col-sm-6 col-md-6">
                     <div class="form-group">
                        <label for="">First Name</label>
                          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                    <div class="error">
                        @if($errors->has('first_name'))
                        <div class="alert alert-danger" style="line-height:8px;">
                            @foreach($errors->get('first_name') as $error)
                            {{$error}}
                            @endforeach
                        </div>
                      @endif
                </div><!------END OF ERROR---------->
              </div>
        
                 </div><!---------END OF COLUMN------------>
                 
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name">

                        <div class="error" >
                          @if($errors->has('last_name'))
                          <div class="alert alert-danger" style="line-height:8px;">
                              @foreach($errors->get('last_name') as $error)
                              {{$error}}
                              @endforeach
                          </div>
                        @endif
                  </div><!------END OF ERROR---------->
              </div>
            </div><!---------END OF COLUMN------------>
            

          </div><!---------END OF ROW------------>
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                     <div class="form-group">
                        <label for="">Address 1</label>
                          <input type="text" name="address1" id="first_name" class="form-control" placeholder="Address 1">

                          <div class="error">
                            @if($errors->has('address1'))
                            <div class="alert alert-danger" style="line-height:8px;">
                                @foreach($errors->get('address1') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                          @endif
                    </div><!------END OF ERROR---------->
                    </div>
                 </div><!---------END OF COLUMN------------>
                 
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label for="">Address 2 (Optional)</label>
                <input type="text" name="address2" id="last_name" class="form-control " placeholder="Address 2 (Optional)">
              </div>
            </div><!---------END OF COLUMN------------>
            

          </div><!---------END OF ROW------------>

          <div class="row">
            <div class="col-sm-6 col-md-6">
               <div class="form-group">
                  <label for="">Post Code</label>
                    <input type="text" name="post_code" id="post_code" class="form-control" placeholder="Post Code" >

                    <div class="error">
                      @if($errors->has('post_code'))
                      <div class="alert alert-danger" style="line-height:8px;">
                          @foreach($errors->get('post_code') as $error)
                          {{$error}}
                          @endforeach
                      </div>
                    @endif
              </div><!------END OF ERROR---------->
              </div>
           </div><!---------END OF COLUMN------------>
           
      <div class="col-sm-6 col-md-6">
        <div class="form-group">
          <label for="">City</label>
          <input type="text" name="city" id="city" class="form-control " placeholder="City" >

          <div class="error" >
            @if($errors->has('city'))
            <div class="alert alert-danger" style="line-height:8px;">
                @foreach($errors->get('city') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
    </div><!------END OF ERROR---------->
        </div>
      </div><!---------END OF COLUMN------------>
      

    </div><!---------END OF ROW------------>

    <div class="row">
      <div class="col-sm-6 col-md-6">
         <div class="form-group">
            <label for="">Email Address</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" tabindex="1">

              <div class="error">
                @if($errors->has('email'))
                <div class="alert alert-danger" style="line-height:8px;">
                    @foreach($errors->get('email') as $error)
                    {{$error}}
                    @endforeach
                </div>
              @endif
        </div><!------END OF ERROR---------->
        </div>
     </div><!---------END OF COLUMN------------>
     
<div class="col-sm-6 col-md-6">
  <div class="form-group">
    <label for="">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control " placeholder="Phone">
  </div>
</div><!---------END OF COLUMN------------>


</div><!---------END OF ROW------------>



<div class="row">
  <div class="col-sm-6 col-md-6">
     <div class="form-group">
        <label for="">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">

          <div class="error">
            @if($errors->has('password'))
            <div class="alert alert-danger" style="line-height:8px;">
                @foreach($errors->get('password') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
    </div><!------END OF ERROR---------->
    </div>
 </div><!---------END OF COLUMN------------>
 
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label for="password-confirm">Confirm Password</label>
<input type="password" name="password_confirmation" id="password-confirm" class="form-control " placeholder="Password Confirm">

<div class="error">
  @if($errors->has('password'))
  <div class="alert alert-danger" style="line-height:8px;">
      @foreach($errors->get('password') as $error)
      {{$error}}
      @endforeach
  </div>
@endif
</div><!------END OF ERROR---------->
</div>
</div><!---------END OF COLUMN------------>


</div><!---------END OF ROW------------>

          {{-- <div class="form-group">
            <input type="text" name="display_name" id="display_name" class="form-control " placeholder="Display Name" tabindex="3">
          </div> --}}
          {{-- <div class="form-group">
            <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
          </div> --}}
          {{-- <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
              </div>
            </div>
          </div> --}}
                                        
                                        {{-- <div class="input-group">
                                          <div class="checkbox" style="margin-top: 0px;">
                                            <label>
                                              <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                            </label>
                                          </div>
                                        </div>
                                         --}}
                                         <br><br>
      <button type="submit" class="btn btn-success" style="height:50px;">Sign up</button>
      
      <hr style="margin-top:10px;margin-bottom:10px;" >
      
      {{-- <div class="form-group">
                                        
                                            <div style="font-size:85%">
                                                Don't have an account! 
                                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                Sign Up Here
                                            </a>
                                            </div>
                                        
                                    </div>  --}}
    </form>
      </div>
    </div>
    </div>
    </div>




  {{-- ///////////////////////////////////////////////////////// --}}
  {{-- </div>
 
</div>
</div>
</div> --}}

@endsection