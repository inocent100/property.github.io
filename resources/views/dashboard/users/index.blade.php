@extends('dashboard.layout')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h3">Users Section</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
      <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
      </div>
    
    </div>
  </div>

  @if(!$users->isEmpty())

  <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Thumbnail</th>
            <th>Post Code</th>
            <th>City</th>
            <th>Roles</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
  
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name ." ". $user->last_name}}</td>
                <td><img src="{{asset('/storage/'.$user->profile->photo ?? 'profile/dummy.jpg')}}" alt="" width="40" height="40"></td>
                <td>{{$user->profile->post_code}}</td>
                <td>{{$user->profile->city}}</td>
                <td>
                    @if(!$user->roles->isEmpty())
                        {{$user->roles->implode('name',', ')}}
                    @endif
                </td>

                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    {{-- <a href="">Show</a> --}}
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a role="button" class="btn btn-link" href="{{route('users.edit',$user->id)}}">Edit</a>
                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                       <button class="btn btn-link" type="submit" href='{{route('users.destroy',$user->id)}}'>Delete</button>
                    </form> 
                </div>

                    {{-- <a href="{{route('users.destroy',$user->id)}}">Delete</a> --}}
                </td>


            </tr>

            @endforeach

            
        </tbody>
     
    </table>
  </div>

  @else 
     <div class="col-sm-6">
     <div class="alert alert-danger" role="alert">
          No Users Found

     </div>
    </div>
  @endif


@endsection