@extends('dashboard.layout')

@section('content')
@php
// session()->put('removeLink', ['']);
session()->forget('removeLink');
session()->forget('removeVideo');

// session()->push('removefile', 'user_1/post_9/2020052008475.png',['new entry']);
// session()->push('removeLink', 'user_1/post_9/3rd.png');


          
@endphp
 <style>
    /* .thumb{
        margin: 10px 5px 0 0;
        width: 100px;
        height: 100px;
        border:1px solid black;
        padding: 4px;
    
    }  */

    


    </style>

<div class="col-sm-6">
    @if(session('imageError'))
    <div class="alert alert-danger">
       {{session('imageError')}}
      </div>
    @endif
  </div>


<form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data" >
<input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
{{-- <input type="hidden" name="post_id" id="post_id" value="5"> --}}
    @csrf
    @method('PUT')
        {{-- <div class="form-row align-items-center"> --}}
          <div class="col-sm-6">
            <div class="form-group">
            <label for="inputPostTitle">Title</label>
            <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value={{$post->title}}>

            @if($errors->has('title'))
              <div class="alert alert-danger mt-2" style="line-height:8px;">
                  @foreach($errors->get('title') as $error)
                  {{$error}}
                  @endforeach
              </div>
            @endif

            </div>

          </div>

          <div class="col-sm-6">
            <div class="form-group">
            <label for="inputPostContent">Description</label>
            <textarea type="text" name="description" class="form-control mb-2" id="inputPostContent">{{$post->description}}</textarea>

            @if($errors->has('description'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('description') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
            </div>
          </div>

{{--         
         
          <div class="col-sm-6 my-3">
            <div class="form-group">
            <label>Select Catagories</label>
            <select name="catagories[]" class="form-control" >
              <option value="0">Select Catagories</option>
              @if(!$catagories->isEmpty())
                 @foreach($catagories as $catagory)
                    <option value="{{$catagory->id}}">{{$catagory->title}}</option>
                 @endforeach
              @endif 

            </select>
            </div>
          </div> --}}

          <div class="col-md-6 my-3">
            <div class="form-group">
            <label>Select Catagories</label>
            <select name="catagories" class="form-control">
              <option value="0">Select Catagories</option>
              @if(!$catagories->isEmpty())
                 @foreach($catagories as $cats)
                    <option @if(in_array($cats->id,$post->catagories->pluck('id')->toArray())) {{'selected'}} @endif value="{{$cats->id}}">{{$cats->title}}</option>
                 @endforeach
              @endif 

            </select>

            @if($errors->has('catagories'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('catagories') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
            </div>
          </div>

          <div class="col-sm-12">
            <div class="form-group">
            <label for="inputFileName">Images</label><br>
            {{--
            <input type="file" name="thumbnail" class="form-custom-control form-file-control mb-2" id="inputFileName">
            <img src="{{asset('images/attach.png')}}" width="30" height="30" > --}}
                 <label class="image">
                    <input type="file" name="files[]"  id="files" style="display:none;" accept="image/x-png,image/jpg,image/jpeg"  multiple/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countImages"></div>
             </label>
             
             <div id="imageUploaded" >
              
              @if($postImages)
              {{-- @php $arr=[] @endphp --}}
              @foreach($postImages as $postImage)

              @php
                // $baseImage = file_get_contents('http://localhost:8000/postImages/user_1/post_1/'.$postImage->filename);
                // $baseImage = file_get_contents('http://localhost:8000/postImages/user_1/post_1/post_1.png');
                  // echo 'data:image/png;base64,'.$baseImage;
                  // echo "<img src='{$baseImage}'>";

              @endphp
              
              


              <span class="pip" title="{{$postImage->filename}}" ><img name='userImages[]'  class="imageThumb" src="{{asset('/postImages/'.$postImage->photo)}}" title="{{$postImage->filename}}"><span class="remove">Remove</span> </span>

              {{-- @php 
                    session()->push('removeLink', $postImage->photo); 
                    session()->push('removeFile', $postImage->filename);

                   
              @endphp --}}

              <script>
               
               
                // alert(k);

                $(".remove").on('click',function() {

              
                // k = {!! json_encode($postImage->filename) !!};

                var k = $(this).parent('.pip').attr('title');

             
                  $(this).parent('.pip').remove();
             
                    $.ajax({
                    url: '/getRequestFile/'+k ,
                    type: 'get',
                  
                    success: function(response){
                          // alert(response);
                        }
                      });

              });

                   
              </script>
              
             
             {{-- {!! "<script>$('.remove').click(function(){
              $(this).parent('.pip').remove();
              var k = {!! json_encode($postImage->filename) !!};

              $.ajax({
              url: '/getRequestFolder/9' ,
              type: 'get',
            
              success: function(response){
                    alert(response);
                  }
                });
              });
                  
              </script>" !!}  --}}

              {{-- {{$img = file_get_contents(asset('/postImages/'.$postImage->photo))}}
              {{$data = base64_encode($img)}} --}}

              {{-- {{dd(base64_encode(asset('/postImages/'.$postImage->photo)))}} --}}

              {{-- {{$image = base64_encode(asset('/postImages/'.$postImage->photo)) }} --}}

             {{-- <input type="text" name="imagesd" value="{{base64_encode(asset('/postImages/'.$postImage->photo))}}" class="upImage" > --}}
             
                {{-- {{$img}}  --}}
                {{-- @php $arr[]=asset('/postImages/'.$postImage->photo) @endphp --}}

               
               
              @endforeach
              {{-- @php session()->push('removeLink', '$postImage->photo') @endphp --}}

              <script>
                $( document ).ready(function() {
                  countImages();
                });
               
               
              </script>

            
              @endif
              
          
            





             </div>
             {{-- <div id="image_preview" ></div> --}}
          </div>
          </div>
          <br>


          <div class="col-sm-6">
            <label for="inputFileName">Video</label><br>
            {{---
            <input type="file" name="thumbnail" class="form-custom-control form-file-control mb-2" id="inputFileName">
            <img src="{{asset('images/attach.png')}}" width="30" height="30" > --}}
                 <label class="Video">
                 
                  
                    <input type="file" name="videos"  id="videos" style="display:none;" accept=".mp4,.avi,.asf,.mov,.qt,.avchd,.flv,.swf,.mpg,.mpeg,.mpeg-4,.wmv,.divx" multiple/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
             </label>
             
             <div id="VideoUploaded">

              @if($postVideos)
              <span class="pip1" title="{{$postVideos->filename}}"><video  id='my-video' class='video-js' preload='auto'  data-setup='{}' width='320' height='240'  controls  class="videoThumb" >
                <source name='userVideos[]' src="{{asset('/postImages/'.$postVideos->video)}}" title="{{$postVideos->filename}}" />
              </video><br/><span class="remove">Remove</span></span>

              <script>
                 $(".remove").click(function(){
                    $(this).parent(".pip1").remove();

                    var k = $(this).parent('.pip1').attr('title');

                   $.ajax({
                    url: '/getRequestVideo/'+k ,
                    type: 'get',
                  
                    success: function(response){
                          // alert(response);
                        }
                      });



                  });
                            
              </script>
              


              @endif
             </div>
          </div>
          




          {{-- <form id="file-upload-form" class="uploader" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <input type="file" id="file-input" multiple />
            <span class="text-danger">{{ $errors->first('image') }}</span>
            <div id="thumb-output"></div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            </form> --}}

            {{-- <input type="file" id="files" name="files[]" multiple /> --}}
         
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             <input type="hidden" name="images[]" class="upImage" >
             {{-- <input type="hidden" name="videos[]" class="upVideo" > --}}

        
          <div class="col-md-12">
            <button type="submit" id="changeMe" class="btn btn-primary mb-2">Update Post</button>
          </div>
        {{-- </div> --}}
      </form>  
{{-- 
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Laravel 7/6 multiple image upload using dropzone - nicesnippets.com</title>
          <link rel="stylesheet" href="{{asset('css/app.css')}}">
       
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
        </head>
        <body>
          <div class="container">
              <h2>Laravel 6 multiple image upload using dropzone  - nicesnippets.com</h2><br/>
              <form method="post" action="{{ route('dropzone.store') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
              @csrf
              </form>
          </div>
          <script type="text/javascript">
              Dropzone.options.dropzone =
              {
                  maxFilesize: 2,
                  maxFiles:2,
                //   autoProcessQueue : false,
                  renameFile: function (file) {
                      var dt = new Date();
                      var time = dt.getTime();
                      return time + file.name;
                  },
               
                  acceptedFiles: ".jpeg,.jpg,.png,.gif",
                  addRemoveLinks: true,
                  timeout: 60000,
                  success: function (file, response) {
                      console.log(response);
                  },
                  error: function (file, response) {
                      return false;
                  }
              };
          </script>
        </body>
      </html> 
<script>
 
</script>
    
@endsection
