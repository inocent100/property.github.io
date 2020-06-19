@extends('clients.layout')

@section('content')
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

  <style>
    .cke_inner .cke_top .cke_toolbox {
  display: none;
}

.customContainer{
  background: white;
  padding:20px;
  border-radius: 10px;
  margin-top:50px;
  margin-bottom:50px;
}
</style>


  <div class="container customContainer" >

   

    <div class="col-md-12 my-5">
     <h2><strong>Preview </strong></h2>
        {{-- <div style="float:right; font-size: 80%; position: relative; top:-10px"> --}}
          {{-- <a href="#">Forgot password?</a> --}}
  </div> 



        @if($request->formType=="Add")

        <form action="{{route('adListing.store')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
            @csrf

        @else

        <form action="{{route('adListing.update',$request->post_id)}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

        @endif 
 
      

    



   
    {{-- <input type="hidden" class="postid" name="postid" id="postid" > --}}

        {{-- <div class="form-row align-items-center"> --}}

           <input type="hidden" name="title" value="{{$request->title}}">
           <input type="hidden" name="catagory" value="{{$request->catagory}}">
           <input type="hidden" name="rent" value="{{$request->rent}}">
           <input type="hidden" name="sale" value="{{$request->sale}}">
           <input type="hidden" name="noOfBeds" value="{{$request->noOfBeds}}">
           <input type="hidden" name="noOfBaths" value="{{$request->noOfBaths}}">
           <input type="hidden" name="furnish" value="{{$request->furnish}}">
           <input type="hidden" name="rentPeriod" value="{{$request->rentPeriod}}">
           <input type="hidden" name="dateAvailable" value="{{$request->dateAvailable}}">
           <input type="hidden" name="minTanLength" value="{{$request->minTanLength}}">
           <input type="hidden" name="depositAmount" value="{{$request->depositAmount}}">
           <input type="hidden" name="propType" value="{{$request->propType}}">
           <input type="hidden" name="postCode" value="{{$request->postCode}}">
           <input type="hidden" name="driveWay" value="{{($request->driveWay) ? ($request->driveWay) :null }}">
           <input type="hidden" name="studentAllow" value="{{($request->studentAllow) ? ($request->studentAllow) :null }}">
           <input type="hidden" name="familiesAllow" value="{{($request->familiesAllow) ? ($request->familiesAllow) :null }}">
           <input type="hidden" name="pets" value="{{($request->pets) ? ($request->pets) :null }}">
           <input type="hidden" name="smokeAllow" value="{{($request->smokeAllow) ? ($request->smokeAllow) :null }}">
           <input type="hidden" name="billsInclude" value="{{($request->billsInclude) ? ($request->billsInclude) :null }}">
           <input type="hidden" name="parking" value="{{($request->parking) ? ($request->parking) :null }}">
           <input type="hidden" name="gardenAccess" value="{{($request->gardenAccess) ? ($request->gardenAccess) :null }}">
           <input type="hidden" name="dss" value="{{($request->dss) ? ($request->dss) :null }}">
           <input type="hidden" name="autoDescription" value="{{$request->autoDescription}}">
           {{-- <input type="text" name="description" value="{{$request->description}}"> --}}
           {{-- <textarea name="" id="" cols="30" rows="10" style="display:none;">hello jee kia hal hei</textarea>
           <textarea  name="description" id="editor" style="display:none;" >{!! $request->description !!}</textarea> --}}
           @if($request->images)
              @foreach($request->images as $img)
                <input type="hidden" name="images[]" value="{{$img}}">
             @endforeach
           @endif

           <input type="hidden" name="videos" value="{{$request->videos}}">
           <input type="hidden" name="email" value="{{$request->email}}">
           <input type="hidden" name="phone" value="{{$request->phone}}">



            <table class="table">
                <tbody>
                <tr>
                    <td style="width:20%;"><strong>Catagory</strong></td>
                    <td>{{ ucfirst(strtolower($request->catagory)) }}</td>

                </tr>

                <tr>
                    <td><strong>Title</strong></td>
                    <td>{{$request->title}}</td>

                </tr>

                <tr>
                    <td><strong>Rent</strong></td>
                    <td>{{number_format($request->rent,2)}}</td>

                </tr>

                <tr>
                    <td><strong>Sale</strong></td>
                    <td>{{number_format($request->sale,2)}}</td>

                </tr>

            

                <tr>
                    <td><strong>No of Beds</strong></td>
                    <td>{{$request->noOfBeds}}</td>

                </tr>

                <tr>
                    <td><strong>No of Bathrooms</strong></td>
                    <td>{{$request->noOfBaths}}</td>

                </tr>
                
                <tr>
                    <td><strong>Furnish Type</strong></td>
                    <td> @if($request->furnish==1) {{'Furnished' }} @else {{'UnFurnished'}} @endif</td>
                    
                </tr>
                
                <tr>
                    <td><strong>Rent Period</strong></td>
                    <td>{{$request->rentPeriod}}</td>

                </tr>

                <tr>
                    <td><strong>Date Availability</strong></td>
                    <td>{{$request->dateAvailable}}</td>

                </tr>

                <tr>
                    <td><strong>Tenancy Length</strong></td>
                    <td>{{$request->minTanLength}}</td>

                </tr>
                
                <tr>
                    <td><strong>Deposit Amount</strong></td>
                    <td>{{number_format($request->depositAmount,2)}}</td>
                    
                </tr>
                
                <tr>
                    <td><strong>Property Type</strong></td>
                    <td>{{$propType_name}}</td>

                </tr>

                <tr>
                    <td><strong>Post Code</strong></td>
                    <td>{{$request->postCode}}</td>

                </tr>

                <tr>
                    <td><strong>Drive Way</strong></td>
                    <td>{{($request->driveWay=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Student Allowed</strong></td>
                    <td>{{($request->studentAllow=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Families Allowed</strong></td>
                    <td>{{($request->familiesAllow=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Pets Allowed</strong></td>
                    <td>{{($request->pets=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Smoke Allowed</strong></td>
                    <td>{{($request->smokeAllow=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Bills Include</strong></td>
                    <td>{{($request->billsInclude=='on') ? 'Yes':'No' }}</td>

                </tr>

                <tr>
                    <td><strong>Parking</strong></td>
                    <td>{{($request->parking=='on') ? 'Yes':'No' }}</td>

                </tr>
                <tr>

                    <td><strong>Garden Access</strong></td>
                    <td>{{($request->gardenAccess=='on') ? 'Yes':'No' }}</td>

                </tr>
                <tr>

                    <td><strong>DSS</strong></td>
                    <td>{{($request->dss=='on') ? 'Yes':'No' }}</td>

                </tr>
                
                @if($request->autoDescription)
                <tr>

                    <td><strong>Auto Description</strong></td>
                    <td>{{$request->autoDescription}}</td>

                </tr>
                @else
                <tr>

                    <td><strong>Description</strong></td>
                    <td>
                        {{-- {{ html_entity_decode(strip_tags($request->description)) }} --}}
                        
                         <textarea name="description" id="editor" readonly="readonly">{!! $request->description !!}</textarea>                 
                    
                    
                    </td>
                        {{-- {{ html_entity_decode($request->description,ENT_QUOTES) }}</td> --}}

                </tr>
                
                @endif
                
                <tr>
                    <td><strong>Images</strong></td>
                    <td>
                        <table>
                            <tr>
               @if($request->oldImages)
                   
                        
                        @foreach($request->oldImages as $img1)
                           <td> <img src="{{asset('postImages/'.$img1)}}" width="40" height="40"></td>
                        @endforeach

                   
                    

               @endif

                @if($request->images)
                 
                   
                   
                       
                        @foreach($request->images as $img)
                           <td> <img src="{{$img}}" width="40" height="40"></td>
                        @endforeach

                   
                    @endif

                </tr>

            </table>

                    
                    </td>


                  
                    </tr>

                <tr>
                    <td style="width:20%;"><strong>Share Video Link</strong></td>
                    <td>{{$request->videos}}</td>

                </tr>
                <tr>
                    <td style="width:20%;"><strong>Email</strong></td>
                    <td>{{$request->email}}</td>

                </tr>
                <tr>
                    <td style="width:20%;"><strong>Phone</strong></td>
                    <td>{{$request->phone}}</td>

                </tr>

            </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <br>
    <br>

    </div><!-- END OF CONTAINER --->

    <script>

CKEDITOR.replace( 'editor' );
// CKEDITOR.replace( 'editor', {toolbarStartupExpanded : false} );

// CKEDITOR.editorConfig = function( config ) {
//     config.autoParagraph = false;
//     config.toolbarGroups = [
//         { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
//     ];

//     config.removeButtons = 'Strike,Subscript,Superscript,RemoveFormat';
// };


// CKEDITOR.replace( 'editor',
// {
//    on :
//    {
//       instanceReady : function ( evt )
//       {
//          // Hide the editor top bar.
//          document.getElementById( 'cke_top_' + evt.editor.name ).style.display = 'none';
//       }
//    }
// } )

        // ClassicEditor
		// .create( document.querySelector( '#editor' ), {
		// 	toolbar: [ ]
		// } )
		// .then( editor => {
		// 	window.editor = editor;
        //     editor.isReadOnly = true;
		// } )
		// .catch( err => {
		// 	console.error( err.stack );
		// } );

        // ClassicEditor
		// .create( document.querySelector( '#editor1' ), {
		// 	toolbar: [ ]
		// } )
		// .then( editor => {
		// 	window.editor = editor;
        //     editor.isReadOnly = true;
		// } )
		// .catch( err => {
		// 	console.error( err.stack );
		// } );
        
       

    </script>
       


@endsection
