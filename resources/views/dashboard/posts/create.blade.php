@extends('dashboard.layout')

@section('content')
 <style>
    /* .thumb{
        margin: 10px 5px 0 0;
        width: 100px;
        height: 100px;
        border:1px solid black;
        padding: 4px;
    
    }  */

     /* .dropzoneDragArea {
		    background-color: #fbfdff;
		    border: 1px dashed #c0ccda;
		    border-radius: 6px;
		    padding: 60px;
		    text-align: center;
		    margin-bottom: 15px;
		    cursor: pointer;
		}
		.dropzone{
			box-shadow: 0px 2px 20px 0px #f2f2f2;
			border-radius: 10px;
		} 
    */
 

    </style>

<div class="col-sm-6">
    @if(session('imageError'))
    <div class="alert alert-danger">
       {{session('imageError')}}
      </div>
    @endif
  </div>

<h2>Add Post</h2><br>
<form action="{{route('posts.store')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" class="postid" name="postid" id="postid" value="">

        {{-- <div class="form-row align-items-center"> --}}

          <div class="frame" >
            <div class="row">
              <div class="col-sm-12">
                    <div class="headingStyle" >Title Area</div>
              </div>
            </div>

          <div class="row" style="padding:10px;">
           
          <div class="col-sm-6">
            {{-- <div class="form-group"> --}}
            <label for="inputPostTitle">Title</label>
            <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value="{{ old('title') }}">

            @if($errors->has('title'))
              <div class="alert alert-danger mt-2" style="line-height:8px;">
                  @foreach($errors->get('title') as $error)
                  {{$error}}
                  @endforeach
              </div>
            @endif


          </div><!-- END OF COLUMN -->



          <div class="col-sm-6">
            <label>Select Catagories</label>
            <select name="catagories" class="form-control" onchange="propTypeAmount(this.value)" >
              {{-- <option value="0">Select Catagories</option> --}}
              @if(!$catagories->isEmpty())
                 @foreach($catagories as $catagory)
                  
                  <option  @if($catagory->id==2) {{'selected'}} @endif value="{{$catagory->id}}">{{$catagory->title}}</option>
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
        </div><!-- END OF COLUMN -->

      </div><!-- END OF ROW --->
    </div><!-------END OF FRAME--------------->

        <br>

        <div class="frame" >
          <div class="row">
            <div class="col-sm-12">
                  <div class="headingStyle" >Description Area</div>
            </div>
          </div>

        <div class="row" style="padding:10px;">

          <div class="col-sm-6">
            <label for="inputPostContent">Description</label>
            <textarea maxlength="10000" rows="8" cols="30"  name="description" class="form-control mb-2" id="inputPostContent">{{ old('description') }}</textarea>
           
            @if($errors->has('description'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('description') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
        </div><!-- END OF COLUMN -->

        <div class="col-sm-6">
          <label for="inputPostContent"></label>
          <div id="textarea_feedback"></div>


        </div><!-- END OF COLUMN -->




    

     

      </div><!-- END OF ROW --->
        </div><!-------END OF FRAME--------->
      <br>


      {{-- /////////// RENT OR SALE type ///////// --}}
      <div class="frame" >
        <div class="row">
          <div class="col-sm-12">
                <div class="headingStyle" >General Area</div>
          </div>
        </div>

      <div class="row" style="padding:10px;">

        
        <div class="col-sm-3">
          <div id="checkRent">
          {{-- <div class="form-group"> --}}
          <label for="inputPostRent">Rent</label>
          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">£</div>
           </div>
          <input type="text" maxlength="13" name="rent" class="form-control" id="inputPostRent"  value="{{ old('rent') }}" onkeypress="return isNumberKey(event, this);" >
        
          </div><!------END OF INPUT GROUP------->

          @if($errors->has('rent'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('rent') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
         

        </div><!-----END OF RENT-------->

        <div id="checkSale">

          {{-- <div class="form-group"> --}}
          <label for="inputPostSale">Sale</label>

          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">£</div>
           </div>
          <input type="number" name="sale" step=".01" class="form-control" id="inputPostRent" value="{{ old('sale') }}" >
        
          </div><!------END OF INPUT GROUP------->

          @if($errors->has('sale'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('sale') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif

        </div><!-----END OF SALE-------->

      </div><!----- END OF COLUMN --->

      


      <div class="col-sm-2">
        <label>No of Beds</label>
        <select name="noOfBeds" class="form-control" >
          <option value="0" selected >Please Select</option>
             @for($i=1; $i<=20;$i++)
              
              <option {{ old('noOfBeds') == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
             @endfor
        

        </select>

        @if($errors->has('noOfBeds'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('noOfBeds') as $error)
            {{$error}}
            @endforeach
        </div>
      @endif
    </div><!-- END OF COLUMN -->

      <div class="col-sm-2">
        <label>No of Bathrooms</label>
        <select name="noOfBaths" class="form-control" >
          <option value="0" selected >Please Select</option>
             @for($i=1; $i<=10;$i++)
              
              <option {{ old('noOfBaths') == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
             @endfor
        

        </select>

        @if($errors->has('noOfBaths'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('noOfBaths') as $error)
            {{$error}}
            @endforeach
        </div>
      @endif
    </div><!-- END OF COLUMN -->

    <div class="col-sm-2">

      <label for="inputPostDate">Furnishing Options</label>
      <select name="furnish" class="form-control" >
      <option value="0" selected >Please Select...</option>
          
          <option {{ old('furnish') == 1 ? "selected" : "" }} value="1">Funrnished</option>
          <option {{ old('furnish') == 2 ? "selected" : "" }} value="2">UnFurnished</option>
        
    

    </select>  
      @if($errors->has('furnish'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('furnish') as $error)
            {{$error}}
            @endforeach
        </div>
      @endif

    </div><!-----END OF COLUMN----------->



    <div class="col-sm-3">

      <label for="inputPostDate">Rent Period</label><br>

      <div class="form-check form-check-inline">
        <input class="form-check-input"  type="radio" name="rentPeriod" id="inlineRadio1"  checked value="monthly" value="monthly">
        <label class="form-check-label" for="inlineRadio1">Monthly</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rentPeriod" id="inlineRadio2" value="weekly">
        <label class="form-check-label" for="inlineRadio2">Weekly</label>
      </div>
    


     
    
     

    </div><!-----END OF COLUMN----------->





        
      </div><!---------END OF ROW------------>
      <br>


      <div class="row" style="padding:10px;">
        <div class="col-sm-2">

            <label for="datepicker">Date Available</label>
            <input type="text" name="dateAvailable" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('dataAvailable')}}" >
  
            @if($errors->has('dateAvailable'))
              <div class="alert alert-danger mt-2" style="line-height:8px;">
                  @foreach($errors->get('dateAvailable') as $error)
                  {{$error}}
                  @endforeach
              </div>
            @endif

          </div><!-----END OF COLUMN----------->

          <div class="col-sm-3">
            <label>Property Type</label>
            <select name="propType" class="form-control" >
              <option value="0" selected>Please Select...</option>
              @if(!$propTypes->isEmpty())
                 @foreach($propTypes as $propType)
                  
                  <option  @if($propType->id==old('propType')) {{'selected'}} @endif value="{{$propType->id}}">{{$propType->name}}</option>
                 @endforeach
              @endif 
  
            </select>
  
            @if($errors->has('propType'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('propType') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif
        </div><!-- END OF COLUMN -->

         


          <div class="col-sm-2">

            <label for="inputPostDate">Post Code</label>
            <input type="text" name="postCode" class="form-control mb-2" id="inputPostDate" value="{{ old('postCode')}}" >
  
            @if($errors->has('postCode'))
              <div class="alert alert-danger mt-2" style="line-height:8px;">
                  @foreach($errors->get('postCode') as $error)
                  {{$error}}
                  @endforeach
              </div>
            @endif

          </div><!-----END OF COLUMN----------->


      </div><!-------END OF ROW--------->

      <br>

      <div class="row" style="padding:10px;">
        <div class="col-sm-2">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_1" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="driveWay" type="checkbox" id="example_1" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Drive Way</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_2" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="studentAllow" type="checkbox" id="example_2" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Student Allowed</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_3" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="familiesAllow" type="checkbox" id="example_3" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Families Allowed</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_4" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="dss" type="checkbox" id="example_4" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">DSS</span>
          </label>

      </div><!-----END OF COLUMN----------->

     

        </div><!-----END OF ROW----------->


      <div class="row" style="padding:10px;">
        <div class="col-sm-2">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_5" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="pets" type="checkbox" id="example_5" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Pets</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_6" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="smokeAllow" type="checkbox" id="example_6" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Smoke Allowed</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_7" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="billsInclude" type="checkbox" id="example_7" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Bills Include</span>
          </label>

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-3">
          {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}

          <label class="toggle-switchy" for="example_8" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
            <input name="parking" type="checkbox" id="example_8" >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;">Parking</span>
          </label>

      </div><!-----END OF COLUMN----------->

     

        </div><!-----END OF ROW----------->


        <div class="row" style="padding:10px;">
          <div class="col-sm-2">
            {{-- <div class="options">Parking<label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label></div> --}}
  
            <label class="toggle-switchy" for="example_9" data-size="xs" data-style="rounded" data-label="left" data-color='green'>
              <input name="gardenAccess" type="checkbox" id="example_9" >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;">Garden Access</span>
            </label>
  
        </div><!-----END OF COLUMN----------->

      </div><!-----END OF ROW----------->





      
      </div><!---------END OF FRAME-------------->
        <br>

        <div class="frame" >
          <div class="row">
            <div class="col-sm-12">
                  <div class="headingStyle" >Contact Area</div>
            </div>
          </div>

        <div class="row" style="padding:10px;">

        <div class="col-sm-6">

          <label for="inputPostDate">Email</label>
          <input type="email" name="email" class="form-control mb-2" id="inputPostDate" >

          @if($errors->has('email'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('email') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif

        </div><!-----END OF COLUMN----------->
        </div><!-----END OF ROW----------->

        <div class="row" style="padding:10px;">
          <div class="col-sm-6">

          <label for="inputPostDate">Phone</label>
          <input type="text" name="phone" class="form-control mb-2" id="inputPostDate" >

          @if($errors->has('phone'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('phone') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif

        </div><!-----END OF COLUMN----------->
        </div><!-----END OF ROW----------->

      </div><!---------END OF FRAME -------------->



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

          <div class="row">
       

      </div><!-- END OF ROW --->
      <br>

      <div class="frame" >
        <div class="row">
          <div class="col-sm-12">
                <div class="headingStyle" >Media Area</div>
          </div>
        </div>

      <div class="row" style="padding:10px;">

          <div class="col-sm-6">
            <label for="inputFileName">Images</label><br>
            {{--
            <input type="file" name="thumbnail" class="form-custom-control form-file-control mb-2" id="inputFileName">
            <img src="{{asset('images/attach.png')}}" width="30" height="30" > --}}
                 <label class="image">
                    <input type="file" name="files[]"  id="files" style="display:none;" accept="image/x-png,image/jpg,image/jpeg"  multiple/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countImages"></div>
                    
             </label>
             
             <div id="imageUploaded" ></div>

          </div><!------END OF COLUMN ------->

          <div class="col-sm-6">
            <label for="inputFileName">Video</label><br>
            {{--
            <input type="file" name="thumbnail" class="form-custom-control form-file-control mb-2" id="inputFileName">
            <img src="{{asset('images/attach.png')}}" width="30" height="30" > --}}
                 <label class="Video">
                 
                  
                    <input type="file" name="videos"  id="videos" style="display:none;"  accept=".mp4,.avi,.asf,.mov,.qt,.avchd,.flv,.swf,.mpg,.mpeg,.mpeg-4,.wmv,.divx"/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countVideos"></div>

             </label>
             
             <div id="VideoUploaded"></div>
          </div><!------END OF COLUMN ------->


{{-- <input type="file" name="kaka" /> --}}
          </div><!------END OF ROW ------->
      </div><!------END OF FRAME ------->
          <br>

          {{-- <input type="file" id="uploadFile" name="uploadFile[]" multiple/>
          <div id="image_preview" ></div> --}}

          


        



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
            
             {{-- <div id="showNumbers"></div> --}}
             {{-- < class="dropzone" id="mydropzone" style="width: 50%;"> <!-- My dropzone stay at this --> --}}
             {{-- <div class="dropzone dropzone-previews" id="mydropzone" style="width:50%;"> <!-- My dropzone stay at this -->
       
             </div> --}}

             {{-- <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
              <span>Upload file</span>
            </div>
            <div class="dropzone-previews"></div> --}}
          
             <br><br>
        
          <div class="col-md-12">
            <button type="submit" id="changeMe" class="btn btn-primary mb-2">Add New Post</button>
          </div>
        {{-- </div> --}}


{{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}

 {{-- <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
              <span>Upload file</span>
            </div>
            <div class="dropzone-previews"></div> --}}
          
{{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}







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
      </html> --}}
   
<script>

  $(document).ready(function(){
    var text_max = 10000;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#inputPostContent').keyup(function() {
        var text_length = $('#inputPostContent').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });


  });

  $('#checkSale').hide();

  function propTypeAmount(val){
    if(val==1){
      $('#checkSale').show();
      $('#checkRent').hide();
      $('#checkRent').val('');
    }else{
      $('#checkSale').hide();
      $('#checkRent').show();
      $('#checkSale').val('');


    }

  }


      $( document ).ready(function() {
        countImages();
        countVideos();
      });
               
               
  </script>


@endsection
