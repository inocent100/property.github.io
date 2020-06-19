@extends('frontPages.layout')

@section('content')
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

<style>
  /* .alert{
    position:relative;
    /* line-height: 8px; */
   /* border-radius: 0.25rem;
  } */

  fieldset 
	{
		border: 1px solid #5c9bce !important;
		margin: 0;
		min-width: 0;
		padding: 5px;       
		position: relative;
		border-radius:4px;
		background-color:#FFF;
		padding-left:10px!important;
	}
		legend
		{
			font-size:14px;
			font-weight: bold;
			margin-bottom: 0px;
			margin-right: 0px;
			min-width: 5%;
			width:auto;
			border: 1px solid #5c9bce;
			border-radius: 5px; 
			padding: 2px 10px 2px 10px; 
			background-color: #ffffff;
		}

  
  .alert{
   position:relative;
   border-radius: 0.25rem;
   line-height:8px;
  } 


.close {
  float: none;
  position: absolute;
  right: 10px;
  top: 50%;
  margin-top: -10px;
  font-size:16px;
}



/* .alert{
  border-radius: 0.25rem;
  /* display: inline-block; */
  /* background:none;
  border:none; */
  /* font-weight: 300; 
} */
  .panel-heading {
    /* background:rgba(84, 84, 170, 0.219) !important; */
    background:#e6e6e6 !important;
    padding:20px !important;
    margin-bottom: 20px !important;
   
  }

  .panel-body{
    /* padding:10px; */
    
  }



 

  .container label{
    font-size:16px;
    font-weight: 200;
    margin:10px 0;
  }

  .container input select{
    font-size:16px;
    /* font-weight: 200; */
    /* margin:10px 0; */
  }

  .container select{
    font-size:16px;
   
  }

 
/* 
  .container input{
    border-radius: 1rem;
    font-size:16px;
    height: 50px;
    margin-bottom: 2px;

  }
  .container select{
    border-radius: 1rem;
    font-size:16px;
    height: 50px;
    margin-bottom: 2px;

  }
  .container textarea{
    border-radius: 1rem;
    font-size:16px;
    height: 200px;
    width:100%;
    margin-bottom: 2px;

  } */

 
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
 /*/////////////// IMAGES AREA ////*/
 .dropzoneDragArea {
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
    .dz-progress {
  /* progress bar covers file name */
  display: none !important;
}

/* .dz-image {
  border:1px solid black;
  padding:13px;
  width: 150px;
  height: 150px;
} */

.dropzone .dz-preview .dz-image {
  width: 158px;
  height: 158px;
  border-radius: 0px;
  border:1px solid black;
  padding:3px;
 
}

.dropzone .dz-preview:hover .dz-image img {
  -webkit-transform: scale(1.05, 1.05);
  -moz-transform: scale(1.05, 1.05);
  -ms-transform: scale(1.05, 1.05);
  -o-transform: scale(1.05, 1.05);
  transform: scale(1.05, 1.05);
  -webkit-filter: blur(8px);
  filter: blur(8px); 
  opacity: 1;
  }

  .dz-error-mark{
    display:none;
  }

  .dz-success-mark svg{
    display: none;
  }

  .previewImage{
    border:2px solid black;
  }

  div.table {
      display: table;
    }
    div.table .file-row {
      display: table-row;
    }
    div.table .file-row > div {
      display: table-cell;
      vertical-align: top;
      border-top: 1px solid #ddd;
      padding: 8px;
    }
    div.table .file-row:nth-child(odd) {
      background: #f9f9f9;
    }



    /* The total progress gets shown by event listeners */
    #total-progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the progress bar when finished */
    #previews .file-row.dz-success .progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the delete button initially */
    #previews .file-row .delete {
      display: none;
    }

    /* Hide the start and cancel buttons and show the delete button */

    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
      display: none;
    }
    #previews .file-row.dz-success .delete {
      display: block;
    }
  
    .btn-group-toggle .btn:not(:disabled):not(.disabled).active, .btn-group-toggle .btn:not(:disabled):not(.disabled):active, .show>.btn.dropdown-toggle {
      color: black;
      background-color: #e6e6e6;
      border-color: #6c757d;
}

/* non selected btn css */
.btn-group-toggle .btn {
  color:black;
  background-color:white;
  border-color: #6c757d;
}
    </style>

<div class="col-sm-6">
    @if(session('imageError'))
    <div class="alert alert-danger">
       {{session('imageError')}}
      </div>
    @endif
  </div>

  <div class="container" >

   

    <div class="col-md-12">
     <h2><strong>Add Property Details </strong></h2>
        {{-- <div style="float:right; font-size: 80%; position: relative; top:-10px"> --}}
          {{-- <a href="#">Forgot password?</a> --}}
        {{-- </div> --}}

      

    
    <div class="panel-body" >



<form action="{{route('adListing.store')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
    @csrf
    <input type="hidden"  name="postid" id="postid" value="">
   

        {{-- <div class="form-row align-items-center"> --}}

          @if($errors->any())

          @foreach($errors->all() as $error)
          <div class="alert alert-danger fade show" role="alert">
            <strong>Error ! </strong> {{$error}} 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          </div>
        @endforeach
        
          
                {{-- <ul>
                {{-- {{ implode('', $errors->all('<li>:message</li>')) }} --}}
                {{-- @foreach($errors->all() as $error)
                <li class="alert alert-danger" ><strong>Error ! </strong>  {{$error}} </li>
              
                @endforeach
              </ul> --}} 
        
      
          @endif 

          <div class="frame" >
            <div class="row">
              <div class="col-sm-12">
                    <div class="headingStyle" >Title Area</div>
              </div>
            </div>

          {{-- <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#f1f3f3; "> --}}
          <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd; ">
           
          <div class="col-sm-8" >
            {{-- <div class="form-group"> --}}
            <label for="inputPostTitle">Title</label>
            <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value="{{ old('title') }}">

            {{-- @if($errors->has('title'))
            <div class="alert alert-danger">
                  @foreach($errors->get('title') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif
         --}}
             


          </div><!-- END OF COLUMN -->



          <div class="col-sm-4">
            <label>Select Catagories</label>
            <select name="catagories" class="form-control" onchange="propTypeAmount(this.value)" >
              {{-- <option value="0">Select Catagories</option> --}}
              @if(!$catagories->isEmpty())
                 @foreach($catagories as $catagory)
                  
                  <option  @if($catagory->id==2) {{'selected'}} @endif value="{{$catagory->id}}">{{$catagory->title}}</option>
                 @endforeach
              @endif 
  
            </select>

            {{-- @if($errors->has('catagories'))
            <div class="alert alert-danger">
                  @foreach($errors->get('catagories') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}
  
            {{-- @if($errors->has('catagories'))
            <div class="alert alert-danger mt-2" style="line-height:8px;">
                @foreach($errors->get('catagories') as $error)
                {{$error}}
                @endforeach
            </div>
          @endif --}}
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

        <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">

          {{-- <div class="listing-type-toggle mb-1"> --}}
        


            {{-- <label>Advert Type <span class="pop-over-button" data-toggle="popover" data-placement="top" data-html="true" data-content="&lt;p&gt;&lt;b&gt;Whole Property&lt;/b&gt;: If you are advertising an entire house / flat / property.&lt;/p&gt;&lt;p&gt;&lt;b&gt;Room Only&lt;/b&gt;: If you are advertising a room in a shared property, whether that is shared with other tenants or a live-in landlord.&lt;/p&gt;"><i class="fa fa-info-circle"></i></span></label><br /> --}}
            
            {{-- <input type="hidden" id="mainpropertyType" name="mainpropertyType" class="sisyphusInclude" value="0"/>
            <div id="MainPropertyTypebtn" class="btn-group btn-group-toggle">
                <label id="entirePropertybtn" class="btn btn-secondary active ">
                    <i class="fa fa-home" aria-hidden="true"></i> Whole Property
                </label>
                <label id="roomInPropertybtn" class="btn btn-secondary  ">
                    <i class="fa fa-bed" aria-hidden="true"></i> Room Only
                </label>
            </div> --}}
        {{-- </div> --}}

       


          <div class="col-sm-8">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
             
              <label class="btn btn-secondary">
                <input type="radio" class="toggleText2" value="manGen" name="textOption" id="option2" autocomplete="off" checked><span style="font-size:16px;"> Manually Generate Text</span>
              </label>
              <label class="btn btn-secondary active">
                <input type="radio" class="toggleText1" value="autoGen" name="textOption" id="option1" autocomplete="off" ><span style="font-size:16px;"> Auto Generate Text </span>
              </label>
            </div>
            <br><br>


            <div id="autoGenerate" style="border:1px solid #a4a5a5;border-radius:5px;background:white;width:100%;height:300px;display:none;">

            </div>

            

            {{-- <label for="inputPostContent">Description</label> --}}
            <textarea maxlength="10000" rows="15" cols="30"  name="description" class="form-control mb-2" id="inputPostContent" >{{ old('description') }}</textarea>
           
       


          
        </div><!-- END OF COLUMN -->

        <div class="col-sm-4">
          <label for="inputPostContent"></label>
          <div id="textarea_feedback"></div>
          <br>
          <a href="#" class="btn btn-primary ref" style="display:none;">Refresh Text</a>



        </div><!-- END OF COLUMN -->




    

     

      </div><!-- END OF ROW --->
        </div><!-------END OF FRAME--------->
      <br>


      {{-- /////////// RENT OR SALE type ///////// --}}
      <div class="frame" >
        <div class="row">
          <div class="col-sm-12">
                <div class="headingStyle" >Tenancy Details</div>
          </div>
        </div>

      <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">

        
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

         

          {{-- @if($errors->has('rent'))
          <div class="alert alert-danger">
                @foreach($errors->get('rent') as $error)
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Error ! </strong>  {{$error}}
               
                @endforeach
            </div>
          @endif --}}
         

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

         

          {{-- @if($errors->has('sale'))
          <div class="alert alert-danger">
                @foreach($errors->get('sale') as $error)
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Error!</strong>  {{$error}}
               
                @endforeach
            </div>
          @endif --}}
         

        </div><!-----END OF SALE-------->

      </div><!----- END OF COLUMN --->

      


      <div class="col-sm-2">
        <label>No of Beds</label>
        <select name="noOfBeds" class="form-control" >
          <option value="0" selected >Please Select...</option>
             @for($i=1; $i<=20;$i++)
              
              <option {{ old('noOfBeds') == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
             @endfor
        

        </select>

      

      {{-- @if($errors->has('noOfBeds'))
      <div class="alert alert-danger">
            @foreach($errors->get('noOfBeds') as $error)
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Errorc! </strong>  {{$error}}
           
            @endforeach
        </div>
      @endif
      --}}

    </div><!-- END OF COLUMN -->

      <div class="col-sm-2">
        <label>No of Bathrooms</label>
        <select name="noOfBaths" class="form-control" >
          <option value="0" selected >Please Select...</option>
             @for($i=1; $i<=10;$i++)
              
              <option {{ old('noOfBaths') == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
             @endfor
        

        </select>

      


      {{-- @if($errors->has('noOfBaths'))
      <div class="alert alert-danger">
            @foreach($errors->get('noOfBaths') as $error)
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error ! </strong>  {{$error}}
           
            @endforeach
        </div>
      @endif --}}
    </div><!-- END OF COLUMN -->

    <div class="col-sm-2">

      <label for="inputPostDate">Furnishing Options</label>
      <select name="furnish" class="form-control"  >
      <option value="0" selected >Please Select...</option>
          
          <option {{ old('furnish') == 1 ? "selected" : "" }} value="1">Funrnished</option>
          <option {{ old('furnish') == 2 ? "selected" : "" }} value="2">UnFurnished</option>
        
    

    </select>  
      {{-- @if($errors->has('furnish'))
        <div class="alert alert-danger mt-2" style="line-height:8px;">
            @foreach($errors->get('furnish') as $error)
            {{$error}}
            @endforeach
        </div>
      @endif --}}

    </div><!-----END OF COLUMN----------->



    <div class="col-sm-3">

      <label for="inputPostDate">Rent Period</label><br>

      <div class="form-check form-check-inline" style="margin-top:-20px;" >
        <input class="form-check-input"  type="radio" name="rentPeriod" id="inlineRadio1"  checked value="monthly" value="monthly">
        <label class="form-check-label" for="inlineRadio1" >Monthly</label>
      </div>
      <div class="form-check form-check-inline" style="margin-top:-20px;">
        <input class="form-check-input" type="radio" name="rentPeriod" id="inlineRadio2" value="weekly">
        <label class="form-check-label" for="inlineRadio2">Weekly</label>
      </div>
    
</div><!-----END OF COLUMN----------->


</div><!---------END OF ROW------------>
      


      <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">

        <div class="col-sm-2">

            <label for="datepicker">Date Available</label>
            <input type="text" name="dateAvailable" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('dataAvailable')}}" >
  
           

            {{-- @if($errors->has('dateAvailable'))
            <div class="alert alert-danger">
                  @foreach($errors->get('dateAvailable') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}

            

          </div><!-----END OF COLUMN----------->

        <div class="col-sm-2">
          <label for="inputPostTenancy">Tenancy Length</label>
          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">Month</div>
           </div>

            {{-- <label for="datepicker">Min Tenancy Length</label> --}}
            {{-- <input type="text" name="minTanLength" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('minTanLength')}}" > --}}

            <input type="text" maxlength="2" name="minTanLength" step="01" class="form-control" id="inputPostTenancy"  value="{{ old('minTanLength') }}" onkeypress="return isNumberNotDecimal(event, this);" >
        
          </div><!------END OF INPUT GROUP------->
  
       

            {{-- @if($errors->has('minTanLength'))
            <div class="alert alert-danger">
                  @foreach($errors->get('minTanLength') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}


          </div><!-----END OF COLUMN----------->

          <div class="col-sm-2">

            <label for="inputPostDeposit">Deposit Amount</label>
            <div class="input-group">
              <div class="input-group-prepend">
                 <div class="input-group-text">£</div>
             </div>
            <input type="text" maxlength="13" name="depositAmount" autocomplete="off" class="form-control" id="inputPostDeposit"  value="{{ old('depositAmount')}}" onkeypress="return isNumberKey(event, this);" >
          
            </div><!------END OF INPUT GROUP------->

            {{-- <label for="datepicker">Deposit Amount</label>
            <input type="text" name="depositAmount" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('depositAmount')}}" onkeypress="return isNumberKey(event, this);"  >
   --}}
   

            {{-- @if($errors->has('depositAmount'))
            <div class="alert alert-danger">
                  @foreach($errors->get('depositAmount') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}

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

            {{-- @if($errors->has('propType'))
            <div class="alert alert-danger">
                  @foreach($errors->get('propType') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}

  
        </div><!-- END OF COLUMN -->

         


          <div class="col-sm-2">

            <label for="inputPostDate">Post Code</label>
            <input type="text" name="postCode" class="form-control mb-2" id="inputPostDate" value="{{ old('postCode')}}" >
{{--   
            @if($errors->has('postCode'))
            <div class="alert alert-danger">
                  @foreach($errors->get('postCode') as $error)
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error ! </strong>  {{$error}}
                 
                  @endforeach
              </div>
            @endif --}}
         

          </div><!-----END OF COLUMN----------->


      </div><!-------END OF ROW--------->

    </div><!-------END OF FRAME--------->
    <br>


    {{-- /////////// RENT OR SALE type ///////// --}}
    <div class="frame" >
      <div class="row">
        <div class="col-sm-12">
              <div class="headingStyle" >Tenant Preferences</div>
        </div>
      </div>

    <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">

      <div class="col-sm-4">

      

    
        <fieldset class="border p-2">
          <legend  class="w-auto" >Group 1</legend>

          

          
            <table style="border:none;">
              <tbody>
              <tr >
                <td style="width:80%;">
                  <span class="label" style="font-size: 16px;">Drive Way</span>
              </td>
                <td> 
                   <label class="toggle-switchy" for="example_1" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                  <input name="driveWay" type="checkbox" id="example_1" >

                  <span class="toggle">
                  <span class="switch"></span>	
                </span>
              </label>
              </td>
              </tr>

              <tr>
                <td>
                  <span class="label" style="font-size: 16px;">Student Allowed</span>


                </td>
                <td>
                  <label class="toggle-switchy" for="example_2" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                    <input name="studentAllow" type="checkbox" id="example_2" >
                    <span class="toggle">
                      <span class="switch"></span>	
                    </span>
                  </label>
                </td>
              </tr>

              <tr>
                <td>        <span class="label" style="font-size: 16px;">Families Allowed</span>
                </td>
                <td>
                  <label class="toggle-switchy" for="example_3" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                    <input name="familiesAllow" type="checkbox" id="example_3"  >
                    <span class="toggle">
                      <span class="switch"></span>	
                    </span>
                  </label>
                </td>
              </tr>


            </tbody>


            </table>
            
           
        

         

         

          
      </fieldset>
       
      


       

    </div><!-----END OF COLUMN----------->

      <div class="col-sm-4">
        <fieldset class="border p-2">
          <legend  class="w-auto" >Group 2</legend>

          
          <table style="border:none;">
            <tbody>
            <tr >
              <td style="width:80%;">
                <span class="label" style="font-size: 16px;">Pets</span>

              </td>
              <td>
                <label class="toggle-switchy" for="example_5" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                  <input name="pets" type="checkbox" id="example_5"  >
                  <span class="toggle">
                    <span class="switch"></span>	
                  </span>
                </label>
      
              </td>
            </tr>

            <tr>
              <td>
                <span class="label" style="font-size: 16px;">Smoke Allowed</span>

              </td>
              <td>
                <label class="toggle-switchy" for="example_6" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                  <input name="smokeAllow" type="checkbox" id="example_6"  >
                  <span class="toggle">
                    <span class="switch"></span>	
                  </span>
                </label>
              </td>
            </tr>

            <tr>
              <td>
                <span class="label" style="font-size: 16px;">Bills Include</span>

              </td>
              <td>
                <label class="toggle-switchy" for="example_7" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                  <input name="billsInclude" type="checkbox" id="example_7"  >
                  <span class="toggle">
                    <span class="switch"></span>	
                  </span>
                </label>
      
              </td>
            </tr>
            </tbody>
          </table>

      </fieldset>
       

      

    </div><!-----END OF COLUMN----------->

    <div class="col-sm-4">
      <fieldset class="border p-2">
        <legend  class="w-auto">Group 3</legend>

        <table style="border:none;">
          <tbody>
          <tr >
            <td style="width:80%;">
              <span class="label" style="font-size: 16px;">Parking</span>

            </td>
            <td>
              <label class="toggle-switchy" for="example_8" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                <input name="parking" type="checkbox" id="example_8"  >
                <span class="toggle">
                  <span class="switch"></span>	
                </span>
              </label>
            </td>
          </tr>

          <tr>
            <td>
              <span class="label" style="font-size: 16px;">Garden Access</span>

            </td>
            <td>
              <label class="toggle-switchy" for="example_9" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                <input name="gardenAccess" type="checkbox" id="example_9"  >
                <span class="toggle">
                  <span class="switch"></span>	
                </span>
              </label>
            </td>
          </tr>

          <tr>
            <td>
              <span class="label" style="font-size: 16px;width:">DSS</span>

            </td>
            <td>
              <label class="toggle-switchy" for="example_4" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
                <input name="dss" type="checkbox" id="example_4"  >
                <span class="toggle">
                  <span class="switch"></span>	
                </span>
              </label>
      
            </td>
          </tr>
          
          </tbody>
        </table>

       

      

      
      </fieldset>

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

        <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">

        <div class="col-sm-6">

          <label for="inputPostDate">Email</label>
          <input type="email" name="email" class="form-control mb-2" id="inputPostDate" >
{{-- 
          @if($errors->has('email'))
          <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Error ! </strong>  {{$error}}
               
                @endforeach
            </div>
          @endif

        --}}

        </div><!-----END OF COLUMN----------->
        </div><!-----END OF ROW----------->

        <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">
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

      <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">

          <div class="col-sm-11">
          
                 {{-- <label class="image">
                    <input type="file" name="files[]"  id="files" style="display:none;" accept="image/x-png,image/jpg,image/jpeg"  multiple/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countImages"></div>
                    
             </label>
             
             <div id="imageUploaded" ></div> --}}


             <div class="dropzone dropzone-file-area" id="fileUpload">
              <div class="dz-default dz-message">
                  <h3 class="sbold">Drop files here to upload</h3>
                  <span>You can also click to open file browser</span>
                
              </div>
            </div>
            <p id="output">Image 0 of 5 Images</p>
          
       
      
      <div class="table table-striped" class="files" id="previews">
      
        <div id="template" class="file-row">
          <!-- This is used as the file preview template -->
          <div>
              <span class="preview"><img data-dz-thumbnail /></span>
          </div>
          {{-- <div>
              <p class="name" data-dz-name></p>
              <strong class="error text-danger" data-dz-errormessage></strong>
          </div> --}}
          {{-- <div>
              <p class="size" data-dz-size></p> --}}
              {{-- <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
              </div>--}}
          {{-- </div> --}}
          <div>
            {{-- <button class="btn btn-primary start">
                <i class="glyphicon glyphicon-upload"></i>
                <span>Start</span>
            </button>
            <button data-dz-remove class="btn btn-warning cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Cancel</span>
            </button> --}}
            {{-- <button data-dz-remove class="btn btn-danger delete">
              <i class="glyphicon glyphicon-trash"></i>
              <span>Delete</span>
            </button> --}}
          </div>
        </div>
      
      </div>
      




          </div><!------END OF COLUMN ------->
      </div><!----------END OF ROW----------->

      <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">
        

          <div class="col-sm-5">
            <label for="inputFileName">Video</label><br>
            {{--
            <input type="file" name="thumbnail" class="form-custom-control form-file-control mb-2" id="inputFileName">
            <img src="{{asset('images/attach.png')}}" width="30" height="30" > --}}
                 <label class="Video">
                 
                  
                    <input type="file" name="videos"  id="videos" style="display:none;"  accept=".mp4,.avi,.asf,.mov,.qt,.avchd,.flv,.swf,.mpg,.mpeg,.mpeg-4,.wmv,.divx"/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countVideos"></div>

             </label>
             
             <div id="VideoUploaded" style="background:white;"></div>
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
         
             {{-- <input type="hidden" name="images[]" class="upImage" >
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
             <input type="hidden" name="images[]" class="upImage" > --}}
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


  


var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

// Dropzone.autoDiscover = false;
Dropzone.options.fileUpload = {
    url: "{{route('adListing.store')}}",
    // addRemoveLinks: true,
    autoProcessQueue : false,
    previewTemplate: previewTemplate,
   
    previewsContainer: "#previews",
  
    maxFilesize: 2,//max file size in MB,
    maxFiles: 2,
    acceptedFiles : ".png,.jpg,.gif,.jpeg,.svg",
    thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
  clickable:true,

    init: function() {

      // var myDropzone = new Dropzone("#fileUpload");


     
          
            this.on("complete", function(file) {
                $(".dz-remove").html("<div><span class='fa fa-trash text-danger' style='font-size: 1.5em'></span></div>");
            });
        
            this.on("addedfile", function(file) {

              // alert('sdf');
           
              var count = $("img[name='del[]']").length;
              count++;
              output = document.getElementById('output');
              output.innerText = 'Image '+count+' of 5 Images';
              // alert(count)



              if (file.size > 1048576) {
                    var removeButton = Dropzone.createElement("<div class='column'><img src='{{asset('images/delete-2.png')}}' width='20' height='20' style='cursor:pointer;' title='Remove the Image' ></div>");
                    } else {
                        var removeButton = Dropzone.createElement("<div class='column'><img name='del[]' src='{{asset('images/delete-2.png')}}' width='20' height='20' style='cursor:pointer;margin-top:20px;' title='Delete the Image' ></div>");
                    }
                    file.previewElement.appendChild(removeButton); 

                    removeButton.addEventListener("click", function (e) {
                      // e.removeFile(file);
                      var k = $('#'+file.upload.filename).attr('id');
                    $('#'+file.upload.filename).remove();
                      file.previewElement.remove();

                      var count = $("img[name='del[]']").length;
                      output = document.getElementById('output');
                      output.innerText = 'Image '+count+' of 5 Images';
                    
                            // if (file.size > 1048576) {
                            // } else if (window.confirm('Are you sure you want to delete ?')) {
                            //     $.post("ajax/delete-file.php?nominationId=" + file.nominationId + "&id=" + file.id + "&media=" + file.media, function () {
                            //         self.removeFile(file);
                            //     });
                            // }
                        });
               
            });

            this.on("maxfilesexceeded", function (file) {
                         alert("No more files please!");
                         this.removeFile(file);
                 });
        },

  


    accept: function(file) {
     

      // var count = $("input[name='images[]']").length;
      //         // alert(count)
            
      //         if (count>2){
      //           alert('no more image');
      //             // this.removeFile(this.files[2]);
      //             this.removeFile(file);
      //             return;
      //           }

      var uploadedImages =$("img[name='del[]']").length;
     
      // alert(bb)
      if (uploadedImages > 3){
                  alert("You are only allowed to upload a maximum of 3 Images");
                  this.removeFile(file);
                  var count = $("img[name='del[]']").length;
                  output = document.getElementById('output');
                  output.innerText = 'Image '+count+' of 5 Images';
               
                  return;
               }

      // alert(files.length);
      // for (var i = 0; i < files.length; i++) {
        let fileReader = new FileReader();

        fileReader.readAsDataURL(file);
        fileReader.onloadend = function() {

            let content = fileReader.result;
            // alert(serverFileName);
            // $('#file').val(content);
            $('#demoform').append('<input type="hidden" id="'+file.upload.filename+'" class="file" name="images[]" value="' + content + '"></><br/>');
            // files.push(content);
            file.previewElement.classList.add("dz-success");
       //  }
        file.previewElement.classList.add("dz-complete");

      }
               

    },  


      renameFile: function (file) {
      let newName = new Date().getTime() + '-'+ Math.floor(Math.random() * 1000000000);
      return newName;
      },
    

    
      // removedfile: function(file) {
      //   alert();
      //        var k = $('#'+file.upload.filename).attr('id');
      //               $('#'+file.upload.filename).remove();
      //               file.previewElement.remove();
          
      //      }
  
  




}



$('.toggleText1').click(function() {
  // alert();
    // $('input[type="radio"]').not(':checked').prop("checked", true);

 
    $('#inputPostContent').slideUp(1500,function(){

      $('#autoGenerate').slideDown(1500);
    

    });
    $('.ref').show();
      
  
       
    });
$('.toggleText2').click(function() {
  // alert();
    // $('input[type="radio"]').not(':checked').prop("checked", true);

 

    
      $('#autoGenerate').slideUp(1500,function(){
        
        $('#inputPostContent').slideDown(1500);
      

      });
      $('.ref').hide();
    

       

  

    // inputPostContent

    

});

$('.ref').click(function(){
  var html="";
  var title = $('#inputPostTitle').val();
  var rent = $('#inputPostRent').val();
   
   html += "I am going to Apply for Preperty for " + title;
   html += " Whose Rent is " + rent

   $('#autoGenerate').html(html);


});

</script>

</div>
</div>
</div>
</div>


@endsection
