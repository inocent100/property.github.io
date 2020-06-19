@extends('dashboard.layout')

@section('content')


@if($errors->any())

      @foreach($errors->all() as $error)
      <div class="alert alert-danger fade show" role="alert">
        <strong>Error ! </strong> {{$error}} 
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      </div>
      @endforeach
    @endif 


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h3">Add User</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
      {{-- <div class="btn-group mr-2">
      <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
      </div> --}}
    
    </div>
  </div>

{{-- <style>
    .box{
        position:absolute;
        top:50%;
        left:50%;
        translate:translate(-50%,-50%);
        width: 400px;
        padding:40px;
        background: rgb(0,0,0,8);
        box-sizing:border-box;
        box-shadow:0 15x 25x rgb(0,0,0,.5);
        border-radius: 10px;
    }

    .box .inputBox{
        position: relative;

    }

    .box .inputBox input{
        width:100%;
        padding:10px 0;
        font-size:16px;
        color:#fff;
        margin-bottom: 30px;
        border:none;
        border-bottom:1px solid #fff;
        outline: none;
        background: transparent;

    }

    .box .inputBox label{
        position:absolute;
        top:0;
        left:0;
        padding:10px 0;
        font-size:16px;
        color:#fff;
        pointer-events: none;
        transition: .5s;


    }

    .box .inputBox input:focus ~ label,
    .box .inputBox input:valid ~ label{
        top:-18px;
        left:0;
        font-size:12px;
        color:#03a9f4;


    }
</style>
 --}}
    
{{-- <div class="box">
    <form action="">
        <div class="inputBox">
            <input type="text"  required="" >
            <label for="">Enter Name</label>
        </div>

        <div class="inputBox">
            <input type="password" required="" >
            <label for="">Enter Name</label>
        </div>
        
    </form>

</div> --}}




{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

  {{-- <div class="form-group">

    <input type="email" class="form-control" id="email" autocomplete="off">
    <label for="email">Email address</label>
  </div> --}}

  {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data"  >
    @csrf

    <div class="col-sm-6">
    <div class="form-group">
        <label for="inputName">First Name</label>
        <input type="text" name="first_name" class="form-control" id="inputName">

        @if($errors->has('first_name'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('first_name') as $error)
                {{$error}}
                @endforeach
            </div>
        @endif

    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="inputName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="inputName">

        @if($errors->has('last_name'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('last_name') as $error)
                {{$error}}
                @endforeach
            </div>
        @endif

    </div>
    </div>
    
    <div class="col-sm-6">
    <div class="form-group">
        <label for="inputEmail">Enter Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail">

        @if($errors->has('email'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('email') as $error)
            {{$error}}
            @endforeach
        </div>
    @endif
    </div>
    </div>

    <div class="col-sm-6">
        <label  for="inputPassword">Password</label>
        <input type="password" name="password" class="form-control mb-2" id="inputPassword">
        @if($errors->has('password'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('password') as $error)
            {{$error}}
            @endforeach
        </div>
    @endif
      </div>

      <div class="col-sm-6">
        <label  for="inputFileName">Address</label>
        <input type="text" name="address1" class="form-control mb-2" id="inputFileName">
        @if($errors->has('address1'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('address1') as $error)
            {{$error}}
            @endforeach
        </div>
    @endif
      </div>

      <div class="col-sm-6">
        <label for="inputFileName">City</label>
        <input type="text" name="city" class="form-control mb-2" id="inputFileName">
      </div>

      <div class="col-sm-3">
        <label for="inputFileName">Post Code</label>
        <input type="text" name="post_code" class="form-control mb-2" id="inputFileName">
        @if($errors->has('post_code'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('post_code') as $error)
            {{$error}}
            @endforeach
        </div>
    @endif
      </div>
    

      {{-- <div class="col-md-6">
        <label for="inputFileName">Select Country</label>
        <select name="country" class="form-control"  >
          <option value="0">Select Country</option>
          
          @if(!$countries->isEmpty())
             @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
             @endforeach
          @endif 

        </select>
      </div> --}}


    <div class="form-group">
        <div class="col-sm-6">
            <label for="inputFileName">Select Roles</label>
           <?php 
              $val = old('roles');
              $arr=array();
              if($val){
                  foreach($val as $key => $v){
                      array_push($arr,$v);
                  }
              }

           ?>
            <select name="roles[]" class="form-control" multiple >
              @if(!$roles->isEmpty())
                 @foreach($roles as $role)
                    <option @if(in_array($role->id,$arr)) {{'selected'}}  @endif value="{{$role->id}}">{{$role->name}}</option>
                 @endforeach
              @endif 

            </select>

            @if($errors->has('roles'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('roles') as $error)
                {{$error}}
                @endforeach
            </div>
        @endif
          </div>
    </div>
    <br>

    <div class="form-group">
        <div class="col-md-12 my-3">
            <label for="inputFileName">Select Image</label>
            <input type="file" name="photo" class="form-custom-control mb-2" id="inputFileName">

            @if($errors->has('photo'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('photo') as $error)
                {{$error}}
                @endforeach
            </div>
        @endif

          </div>
        </div>

          <br>

        
        
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary mb-2">Add New User</button>
          </div>

          <br><br>

  </form>

@endsection