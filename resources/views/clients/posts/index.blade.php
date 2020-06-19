@extends('clients.layout')


@section('content')

{{-- <div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="/">Home</a> / Ad Listing</span>
    <h2>Ad Listing</h2>
</div>
</div> --}}

<div class="container">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="h3">Ads Section</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">
              <a href="{{route('adListing.create')}}" type="button" class="btn btn-sm btn-outline-secondary">New AD</a>
           </div>
        </div>
  </div>

  @if(!$posts->isEmpty())

  <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Post Code</th>
            <th>Catagories</th>
            {{-- <th>Created At</th> --}}
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
  
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->postCode}}</td>
                <td>{{ucfirst($post->catagory)}}</td>
                {{-- <td> 
                   @if(!$post->catagories->isEmpty())
                      @foreach($post->catagories as $cat)
                        {{$cat->title}},
                      @endforeach
                    @else 
                    {{''}}
                  @endif</td> --}}
             
                {{-- <td>{{$post->created_at}}</td> --}}
                <td> {{date("d-m-Y", strtotime($post->updated_at))}}</td>
                <td>
                    {{-- <a href="">Show</a> --}}
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a role="button" class="btn btn-link" href="{{route('adListing.edit',$post->id)}}">Edit</a>
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                          <button class="btn btn-link" type="submit" href='{{route('posts.destroy',$post->id)}}'>Delete</button>
                        </form> 
                   </div>

                    {{-- <a href="{{route('users.destroy',$user->id)}}">Delete</a> --}}
                </td>


            </tr>

            @endforeach

            <tr ><td colspan="8">            
              {{$posts->links("pagination::bootstrap-4")}} </td>
            </tr>

            
        </tbody>
     
    </table>
  </div>

  @else 
     <div class="col-sm-6">
     <div class="alert alert-danger" role="alert">
          No Ads Found

     </div>
    </div>
  @endif
</div>

@endsection