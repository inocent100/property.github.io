@extends('clients.layout')

@section('content')

<!-- banner -->

<style>

/* select, input {
  margin-bottom: 0;
} */
.alert{
  border-radius: 0.5rem;
  /* background:none;
  border:none; */
  font-weight: 700;
}

label{
  color:black;
  font-weight: 700;
}

  
  
    /* .panel-heading {
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
    margin:10px 0;
  }

  .container input{
    border-radius: 0.5rem;
    font-size:16px;
    /* margin-bottom: 30px; */
    /* height: 50px;
    margin-bottom: 2px;

  } */

  
  
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

input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
    -webkit-box-shadow: 0 0 0 30px white inset !important;
}

input,
textarea {
    background-color: #F3E5F5;
    padding: 8px 0px 8px 0px !important;
    width: 100%;
    border-radius: 0 !important;
    box-sizing: border-box;
    border: none !important;
    border-bottom: 1px solid #F3E5F5 !important;
    font-size: 18px !important;
    color: #000 !important;
    font-weight: 300
}

input:focus,
textarea:focus {-
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-bottom: 1px solid #D32F2F !important;
    outline-width: 0;
    font-weight: 400
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.card {
    border-radius: 0;
    border: none;
    position: relative
}

.card1 {
    width: 100%
}

.form-control.filled {
  box-shadow: 0 2px 0 0 lightgreen;
}



/* .card2 {
    width: 50%;
    height: 700px;
    background-color: #E8EAF6
} */

/* #image {
    width: 80%;
    height: 300px;
    margin: auto
}

#logo {
    position: absolute
} */

.form-group {
    position: relative;
    margin-bottom: 1.5rem
}



.form-control-placeholder {
    position: absolute;
    top: 0;
    padding: 7px 0 0 0;
    transition: all 300ms;
    opacity: 0.5;

}

.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
    font-size: 80%;
    transform: translate3d(0, -100%, 0);
    opacity: 1;
    color:rgb(0, 0, 255);

}

.btn-gray {
    border-radius: 50px;
    color: #fff;
    background-color: #BDBDBD;
    padding: 8px 40px
}

.btn-gray:hover {
    color: #fff;
    background-color: #D32F2F
}

a {
    color: #000
}

a:hover {
    color: #000
}

#google {
    width: 20px;
    height: 20px
}

.bottom {
    bottom: 0;
    position: absolute;
    width: 100%
}

.sm-text {
    font-size: 15px
}

@media screen and (max-width: 1200px) {
    .card1 {
        width: 100%;
        padding: 10px 30px
    }

    .bottom {
        position: relative
    }

    /* .card2 {
        width: 100%
    } */
}

@media screen and (max-width: 768px) {
    .container {
        padding: 10px !important
    }
/* 
    .card2 {
        height: 400px
    } */
}
</style>




   
  <div class="container" style="margin:100px auto;width:70%;">
   
 

   <div class="container px-4 py-5 mx-auto" style="width:70%">

    @if($errors->any())

      @foreach($errors->all() as $error)
      <div class="alert alert-danger fade show" role="alert">
        <strong>Error ! </strong> {{$error}} 
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      </div>
      @endforeach
    @endif 


    @if (session('status'))
    <div class="alert alert-success" style="line-height: 10px;" role="alert">
        <p><strong>{{ session('status') }}</strong></p>
    </div>
  @endif
  
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
    </div>
  @endif

  <form action="{{route('userregister.store')}}" class="form" method="post">
    @csrf

  
    <div class="card">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row d-flex px-lg-4 px-3 pt-3 justify-content-center">
                    <h6 id="logo" ><strong>Registration</strong></h6>
                </div>
                <div class="row justify-content-center my-auto">
                    <div class="col-lg-10 my-5">
                        {{-- <h3 class="mb-3">Get your free Account now.</h3> <small class="text-muted">Try Hotjar BUSINESS free for 15 days<br>Downgrade to Basic (Free Forever) anytime.</small> --}}
                        <div class="form-group"> 
                          <input type="text" id="first_name" name="first_name" class="form-control" required> <label class="form-control-placeholder" for="first_name">First Name</label> 
                        </div>
                        <div class="form-group mt-3"> 
                          <input type="text" id="last_name" name="last_name" class="form-control" required> <label class="form-control-placeholder" for="last_name">Last Name</label> 
                        </div>

                        <div class="form-group mt-3"> 
                          <input type="text" id="address1" name="address1" class="form-control" required> <label class="form-control-placeholder" for="address1">Address 1</label> 
                        </div>

                        <div class="form-group mt-3"> 
                          <input type="text" id="address2" name="address2" class="form-control" required >
                           <label class="form-control-placeholder" for="address2">Address 2 (OPtional)</label> 
                        </div>

                       
                        <div class="form-group mt-3"> 
                          <div class="row">
                              <div class="col-6">
                                <input type="text" id="post_code" name="post_code" class="form-control" required > <label class="form-control-placeholder" for="post_code">Post Code</label> 

                              </div><!----END OF COLUMN----->

                            <div class="col-6">
                             
                              <input type="text" id="phone" name="phone" class="form-control" required autocomplete="off"> <label class="form-control-placeholder " for="phone">Phone</label> 
                          
                          


                            
                          </div><!----END OF COLUMN----->
                        </div><!----END OF ROW----->
                        </div>

                        <div class="form-group mt-3"> 
                          <input type="text" id="city" name="city" class="form-control" required autocomplete="off"> <label class="form-control-placeholder" for="city">City</label> 
                        </div>
                        <div class="form-group mt-3"> 
                          <input type="text" id="email" name="email" class="form-control" required autocomplete="off"> <label class="form-control-placeholder" for="email">Email</label> 
                        </div>

                        <div class="form-group mt-3"> 
                          <input type="password" id="password" name="password" class="form-control" required> <label class="form-control-placeholder" for="password">Password</label> 
                        </div>

                        <div class="form-group mt-3"> 
                          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required> <label class="form-control-placeholder" for="password_confirmation">Confirm Password</label> 
                        </div>
                        {{-- <div class="form-group mt-4"> 
                          <input type="email" id="mail" class="form-control" required> <label class="form-control-placeholder" for="mail">Email</label> 
                        </div> --}}
                        <div class="row justify-content-center my-3"> 
                          <button class="btn btn-gray" id="submit" value="Cancel" type="submit" formnovalidate>Sign up</button> 
                        </div>
                        <div class="row justify-content-center my-2"> <small class="text-muted">or</small> </div>
                        <div class="row justify-content-center my-2"> <a href="#"><img id="google" src="https://i.imgur.com/8lJt6UN.png" class="mr-2">Sign up with Google</a> </div>
                    </div>
                </div>
                <div class="bottom text-center mb-3">Already have an account? &nbsp;&nbsp; <a href="{{route('userlogin')}}" class="sm-text mx-auto mb-3" style="color:rgb(88, 88, 247);">sign in here</a> </div>
            </div>
            {{-- <div class="card card2"> <img id="image" src="https://i.imgur.com/JayQIc8.png"> </div> --}}
        </div>
    </div>
  </form>
</div>

  {{-- </div>
 
</div>
</div>
</div> --}}
<script>
// $('input').focus(function(){
//   $(this).parents('.form-group').addClass('focused');
// });

// $('input').blur(function(){
//   var inputValue = $(this).val();
//   if ( inputValue == "" ) {
//     $(this).removeClass('filled');
//     $(this).parents('.form-group').removeClass('focused');  
//   } else {
//     $(this).addClass('filled');
//   }
// });


// $('#submit').click(function(){
//   // alert();
     

//       // un-require required fields for reject button

//     //  $('input, select, div').each(function() {    

//         $('#address2').prop('required','disabled');

//       //});
// });

$('input').blur(function(){

  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
});

</script>
@endsection


<form action="{{ route('users.checklogin') }}" class="form" method="post">