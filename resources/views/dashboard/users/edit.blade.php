@extends('dashboard.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h3">Edit User</h3>
    {{-- <div class="btn-toolbar mb-2 mb-md-0"> --}}
      {{-- <div class="btn-group mr-2">
      <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
      </div>
     --}}
    {{-- </div> --}}
  </div>


<form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data"  >
    @csrf
    @method('PUT')

    <div class="col-md-6">
    <div class="form-group">
        <label for="inputName">First Name</label>
        <input type="text" name="first_name" class="form-control" id="inputName" value="{{$user->first_name}}" >
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label for="inputName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="inputName" value="{{$user->last_name}}" >
    </div>
    </div>
    
    {{-- <div class="col-md-6">
    <div class="form-group">
        <label for="inputEmail">Enter Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}">
    </div>
    </div> --}}



      <div class="col-md-6">
        <label  for="inputFileName">Address</label>
        <input type="text" name="address1" class="form-control mb-2" id="inputFileName" value="{{$user->profile->address1}}">
      </div>

      <div class="col-md-6">
        <label for="inputFileName">City</label>
        <input type="text" name="city" class="form-control mb-2" id="inputFileName"  value="{{$user->profile->city}}">
      </div>

      <div class="col-md-3">
        <label for="inputFileName">Post Code</label>
        <input type="text" name="post_code" class="form-control mb-2" id="inputFileName"  value="{{$user->profile->post_code}}">
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
        <div class="col-md-6">
            <label for="inputFileName">Select Roles</label>
            <select name="roles[]" class="form-control" multiple >
              @if(!$roles->isEmpty())
                 @foreach($roles as $role)
                    <option @if(in_array($role->id, $user->roles->pluck('id')->toArray())) {{'selected'}} @endif  value="{{$role->id}}">{{$role->name}}</option>
                 @endforeach
              @endif 

            </select>
          </div>
    </div>


    <div class="form-group">
        <div class="col-md-12 my-3">
            <label for="inputFileName">Profile Picture</label><br>
        <img src="{{asset('/project/public/storage/'.$user->profile->photo)}}" alt="Image" srcset="" width="70" height="70" >
        </div>
    </div>
    


    <div class="form-group">
        <div class="col-md-12 my-3">

            <label for="inputFileName">Select Image</label>
            <input type="file" name="photo" class="form-custom-control mb-2" id="inputFileName">
          </div>
        </div>

          <br>

        
        
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary mb-2">Update</button>
          </div>
          <br><br>
  </form>

@endsection