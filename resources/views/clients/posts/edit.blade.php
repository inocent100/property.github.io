@extends('clients.layout')

@section('content')
@php
session()->forget('removeLink');
// session()->forget('removeVideo');
@endphp
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

<style>

#postCode{
  text-transform: uppercase;
 }


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




  .panel-heading {
    /* background:rgba(84, 84, 170, 0.219) !important; */
    background:#e6e6e6 !important;
    padding:20px !important;
    margin-bottom: 20px !important;
   
  }

 

  .container label{
    font-size:14px;
    font-weight: 200;
    margin:10px 0;
  }

  .container input{
    font-size:14px;
    /* font-weight: 200; */
    /* margin:10px 0; */
  }

  .container select{
    font-size:14px;
   
  }

 
 
   
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

  


  <div class="container mt-5">

    <form action="{{route('preview')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
      @csrf
    <input type="hidden" class="postid" name="post_id" id="postid" value="{{$post->id}}">
      <input type="hidden" name="formType" value="Edit">
      <input type="hidden" id="getVerify" >



      @if($errors->any())

      @foreach($errors->all() as $error)
      <div class="alert alert-danger fade show" role="alert">
        <strong>Error ! </strong> {{$error}} 
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      </div>
      @endforeach
    @endif 

    <div id="err">

    </div>

     


  <div id="smartwizard" style="background: white;" >
    <ul class="nav" style="background: #f8fafc;">
       <li>
           <a class="nav-link" href="#step-1">
              Catagory
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-2">
              Property Details
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-3">
              Description
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-4">
              Contact Details
           </a>
       </li>
       {{-- <li>
           <a class="nav-link" href="#step-5">
              Preview and Submit
           </a>
       </li> --}}
    </ul>
 
    <div class="tab-content">
       <div id="step-1" class="tab-pane" role="tabpanel">

        <div class="row" style="margin-left:0;margin-right:0;">
                
          <div class="col-sm-4">
            <h3 style="margin:10px auto;">Catagory</h3>

            <label><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Select Catagory</label>
            <select id="catagory" name="catagory" class="form-control" onchange="propTypeAmount(this.value)" >

               
            <option @if(old('catagory')==1) {{'selected'}} @else  @if($post->catagory == 'rent' && old('catagory')=='')  {{"selected"}}  @endif @endif  value="rent">Rent</option>
            <option @if(old('catagory')==2) {{'selected'}} @else  @if($post->catagory == 'sale' && old('catagory')=='')  {{"selected"}}  @endif @endif  value="sale">Sale</option>
                  
              {{-- <option value="0">Select Catagories</option> --}}

              {{-- @if(!$catagories->isEmpty())
              {{-- @foreach($catagories as $cats) --}}
               
               {{-- <option @if(in_array($cats->id,$post->catagories->pluck('id')->toArray())) {{'selected'}} @endif  value="{{$cats->id}}">{{$cats->title}}</option> --}}
               {{-- <option @if(in_array($cats->id,$post->catagories->pluck('id')->toArray())) {{'selected'}} @endif  value="{{$cats->id}}">{{$cats->title}}</option>
              {{-- @endforeach 
           @endif   --}}

            
  
            </select>

           
          </div><!-- END OF COLUMN -->
        </div><!-- END OF ROW -->
        <br>


        <div class="row" style="margin-left:0;margin-right:0;">



        <div class="col-md-4 customCell" >
          <label for="">Post Code <i class="fas fa-info-circle" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Please Enter Only Valid Post Code" style="cursor: pointer;"></i></label>
          <div class="input-group">
          <input type="text" class="form-control" name="postCode" id="postCode" placeholder="Post Code" value="{{ old('postCode') ? old('postCode') : $post->postCode}}">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          </div><!-----END OF COLUMN-------->

    </div><!-- END OF ROW ---> 
    <br><br>

   
    <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
      <div class="col-sm-4">
        <div class="btn btn-primary step1_next" >Next</div>  
      </div><!-- END OF COLUMN -->
    </div><!-- END OF ROW ---> 

</div><!-- END OF TAB 1 --->  

       <div id="step-2" class="tab-pane" role="tabpanel">

        <h3 style="margin:20px auto;">Property Details</h3>

        <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">
          
          
          <div class="col-sm-8" >
            
            {{-- <div class="form-group"> --}}
              <label for="inputPostTitle">Title</label>
              <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value="{{ old('title') ? old('title') : $post->title }}">
              
              
                
              </div><!-- END OF COLUMN -->
            </div><!-- END OF ROW --->
            <br><br>


            <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">

      
              <div class="col-sm-3">
                <div id="checkRent">
                {{-- <div class="form-group"> --}}
                <label for="inputPostRent">Rent</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                     <div class="input-group-text">£</div>
                 </div>
                 <input type="text" maxlength="13" name="rent" class="form-control" id="inputPostRent"  value="{{ old('rent') ? old('rent') : $post->rent }}" onkeypress="return isNumberKey(event, this);" >
              
                </div><!------END OF INPUT GROUP------->
              
              </div><!-----END OF RENT-------->
      
              <div id="checkSale">
      
                {{-- <div class="form-group"> --}}
                <label for="inputPostSale">Sale</label>
      
                <div class="input-group">
                  <div class="input-group-prepend">
                     <div class="input-group-text">£</div>
                 </div>
              
                <input type="text" maxlength="13" name="sale" step=".01" class="form-control" id="inputPostSale" value="{{ old('sale') ? old('sale') : $post->sale }}" onkeypress="return isNumberKey(event, this);" >
              
                </div><!------END OF INPUT GROUP------->
      
               
      
             
               
      
              </div><!-----END OF SALE-------->
      
            </div><!----- END OF COLUMN --->
      
            
      
      
            <div class="col-sm-2">
              <label>No of Beds</label>
              <select name="noOfBeds" class="form-control" >
      

                      <option @if(old('noOfBeds')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
                      @for($i=1; $i<=20;$i++)
                      
                      <option   @if(old('noOfBeds')==$i) {{'selected'}} @else  @if($post->noOfBeds == $i && old('noOfBeds')=='')  {{"selected"}}  @endif @endif value="{{$i}}">{{$i}}</option>

                   @endfor
              
      
              </select>
      
            
      
          
      
          </div><!-- END OF COLUMN -->
      
            <div class="col-sm-2">
              <label>No of Bathrooms</label>
              <select name="noOfBaths" class="form-control" >
                <option @if(old('noOfBaths')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
                @for($i=1; $i<=20;$i++)
                 
                 <option   @if(old('noOfBaths')==$i) {{'selected'}} @else  @if($post->noOfBaths == $i && old('noOfBaths')=='')  {{"selected"}}  @endif @endif value="{{$i}}">{{$i}}</option>
                 
                @endfor
               
              
      
              </select>
      
            
      
      
         
          </div><!-- END OF COLUMN -->
      
          <div class="col-sm-2">
      
            <label for="inputPostDate">Furnishing Options</label>
            <select name="furnish" class="form-control"  >
            <option value="0" selected >Please Select...</option>
            
            <option @if(old('furnish')==1) {{'selected'}} @else  @if($post->furnish == 1 && old('furnish')=='')  {{"selected"}}  @endif @endif  value="1">Funrnished</option>
          <option @if(old('furnish')==2) {{'selected'}} @else  @if($post->furnish == 2 && old('furnish')=='')  {{"selected"}}  @endif @endif  value="2">UnFurnished</option>
                
            
              
          
      
          </select>  
        
      
          </div><!-----END OF COLUMN----------->
      
      
      
          <div class="col-sm-3"  id="checkPeriod">
      
            <label for="inputPostDate">Rent Period</label><br>
            @if($post->rentPeriod=="monthly")
                 @php $mSel='checked'; $wSel=''; @endphp
            @else
                @php $mSel=''; $wSel='checked'; @endphp
            @endif 
      
            <div class="form-check form-check-inline" style="margin-top:-20px;" >
              <input {{$mSel}} class="form-check-input"  type="radio" name="rentPeriod" id="inlineRadio1"  value="monthly" value="monthly">
       
        <label class="form-check-label" for="inlineRadio1"  >Monthly</label>
      </div>
      <div class="form-check form-check-inline" style="margin-top:-20px;">
        <input {{$wSel}} class="form-check-input" type="radio" name="rentPeriod" id="inlineRadio2" value="weekly">
        <label class="form-check-label" for="inlineRadio2" >Weekly</label>
            </div>
          
      </div><!-----END OF COLUMN----------->
      
      
      </div><!---------END OF ROW------------>
      
            
      
      
            <div class="row"  style="padding:10px;margin-left:0;margin-right:0;padding-top:30px;background:#fafafd;">
      
              <div class="col-sm-2">
      
                @php
                $newDate =date("d-m-Y", strtotime($post->dateAvailable));
               @endphp
     
                 <label for="datepicker">Date Available</label>&nbsp;&nbsp; <i class="fas fa-info-circle" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Please Enter the Date in the Format of dd-mm-yyyy" style="cursor: pointer;" ></i>

                 <input type="text" name="dateAvailable" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('dateAvailable') ? old('dateAvailable') : $newDate }}" >
        
                 
      
                
      
                </div><!-----END OF COLUMN----------->
      
              <div class="col-sm-2" id="checkTenancy">
                <label for="inputPostTenancy">Tenancy Length</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                     <div class="input-group-text">Month</div>
                 </div>
      
                 
      
                 <input type="text" maxlength="2" name="minTanLength" step="01" class="form-control" id="inputPostTenancy"  value="{{ old('minTanLength') ? old('minTanLength') : $post->minTanLength }}" onkeypress="return isNumberNotDecimal(event, this);" >
              
                </div><!------END OF INPUT GROUP------->
        
             
      
                 
      
      
                </div><!-----END OF COLUMN----------->
      
                <div class="col-sm-2">
      
                  <label for="inputPostDeposit">Deposit Amount</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                       <div class="input-group-text">£</div>
                   </div>
                   <input type="text" maxlength="13" name="depositAmount" autocomplete="off" class="form-control" id="inputPostDeposit"  value="{{ old('depositAmount') ? old('depositAmount') : $post->depositAmount }}" onkeypress="return isNumberKey(event, this);" >
                
                  </div><!------END OF INPUT GROUP------->
      
                
      
                </div><!-----END OF COLUMN----------->
      
                <div class="col-sm-3">
                  <label>Property Type</label>
                  <select name="propType" class="form-control" >

                    @if(!$propTypes->isEmpty())
      
                    <option @if(old('propType')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
                    @foreach($propTypes as $propType)
                     
                     <option   @if(old('propType')==$propType->id) {{'selected'}} @else  @if($post->prop_types_id == $propType->id && old('propType')=='')  {{"selected"}}  @endif @endif value="{{$propType->id}}">{{$propType->name}}</option>
                     @endforeach
      
                     
                    @endif 
        
                  </select>
      
               
        
              </div><!-- END OF COLUMN -->
      
               
      
      
                {{-- <div class="col-sm-2">
      
                  <label for="inputPostDate">Post Code</label>
                  <input type="text" name="postCode" class="form-control mb-2" id="inputPostDate" value="{{ old('postCode') ?old('postCode') : $post->postCode}}" >
    
               
      
                </div><!-----END OF COLUMN----------->
       --}}
      
            </div><!-------END OF ROW--------->



            {{-- ///////////////////////////////////////////////////////////// --}}
            <br><br>

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
                          <input name="driveWay" type="checkbox" id="example_1" @if(old('driveWay')=='on') {{'checked'}} @else  @if($post->driveWay == 1 && old('driveWay')=='')  {{"checked"}}  @endif @endif >
        
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
                            <input name="studentAllow" type="checkbox" id="example_2" @if(old('studentAllow')=='on') {{'checked'}} @else  @if($post->studentAllow == 1 && old('studentAllow')=='')  {{"checked"}}  @endif @endif >
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
                            <input name="familiesAllow" type="checkbox" id="example_3" @if(old('familiesAllow')=='on') {{'checked'}} @else  @if($post->familiesAllow == 1 && old('familiesAllow')=='')  {{"checked"}}  @endif @endif >
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
                          <input name="pets" type="checkbox" id="example_5" @if(old('pets')=='on') {{'checked'}} @else  @if($post->pets == 1 && old('pets')=='')  {{"checked"}}  @endif @endif >
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
                          <input name="smokeAllow" type="checkbox" id="example_6" @if(old('smokeAllow')=='on') {{'checked'}} @else  @if($post->smokeAllow == 1 && old('smokeAllow')=='')  {{"checked"}}  @endif @endif  >
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
                          <input name="billsInclude" type="checkbox" id="example_7" @if(old('billsInclude')=='on') {{'checked'}} @else  @if($post->billsInclude == 1 && old('billsInclude')=='')  {{"checked"}}  @endif @endif  >
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
                        <input name="parking" type="checkbox" id="example_8" @if(old('parking')=='on') {{'checked'}} @else  @if($post->parking == 1 && old('parking')=='')  {{"checked"}}  @endif @endif  >
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
                        <input name="gardenAccess" type="checkbox" id="example_9" @if(old('gardenAccess')=='on') {{'checked'}} @else  @if($post->gardenAccess == 1 && old('gardenAccess')=='')  {{"checked"}}  @endif @endif  >
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
                      <input name="dss" type="checkbox" id="example_4" @if(old('dss')=='on') {{'checked'}} @else  @if($post->dss == 1 && old('dss')=='')  {{"checked"}}  @endif @endif >
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
        
      


    



              <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
                <div class="col-sm-4">
                  <div class="btn btn-primary prev1" >Prev</div>  
                  <div class="btn btn-primary step2_next" >Next</div>  
                </div><!-- END OF COLUMN -->
              </div><!-- END OF ROW ---> 


       </div><!-- END OF TAB2 --->
       
       



       <div id="step-3" class="tab-pane" role="tabpanel">
          
        <div class="row" style="margin:0;">

          <div class="col-sm-8">

            <label for="inputPostTitle">Description</label>
            <br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
               
              <label class="btn btn-secondary ">
                <input type="radio" class="toggleText2" value="manGen" name="textOption" id="option2" autocomplete="off" checked><span style="font-size:16px;" > Manually Generate Text</span>
              </label>
              <label class="btn btn-secondary active">
                <input type="radio" class="toggleText1" value="autoGen" name="textOption" id="option1" autocomplete="off" ><span style="font-size:16px;"> Auto Generate Text </span>
              </label>
            </div>
            <br><br>


            <div id="autoGenerate" style="border:1px solid #a4a5a5;border-radius:5px;background:white;width:100%;height:300px;display:none;">

              <input type="hidden" name="autoDescription" id="autoDescription">

            </div>

            

            

            {{-- <label for="inputPostContent">Description</label> --}}
            <div id="edDes">
            <textarea id="editor" class="countChar" maxlength="10"   name="description" class="form-control mb-2" >{{ old('description') ? old('description') : $post->description }}</textarea>
          </div>
           
       


          
        </div><!-- END OF COLUMN -->

           
        <div class="col-sm-4">
          <label for="inputPostContent"></label>
          <div id="textarea_feedback" style="margin-top: 90px;"></div>
          <br>
          <a href="#" class="btn btn-primary ref" style="display:none;">Refresh Text</a>



        </div><!-- END OF COLUMN -->


      </div><!-- END OF ROW --->
      <br><br>






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
          <p id="output">Image 0 of 15 Images</p>
        
     
          
          {{-- src="{{asset('/postImages/'.$postImage->photo)}}" --}}
        
     <table id="existingImages"  class="table table-striped"></table>

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
      

        <div class="col-sm-7">
          <label for="inputFileName">Optional: Add YouTube share URL</label><br>
          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text"><i class="fab fa-youtube-square" aria-hidden="true" style="color:red;font-size:20px;"></i></div>
           </div>
           @if($postVideos)
          <input type="text" name="videos" class="form-control" id="inputPostRent"  value="{{ old('videos') ? old('videos') :$postVideos->video  }}" >
          @else
          <input type="text" name="videos" class="form-control" id="inputPostRent"  value="{{ old('videos') }}" >


          @endif 




          {{-- @if($postVideos)
             <span class="pip1" title="{{$postVideos->filename}}"><video  id='my-video' class='video-js' preload='auto'  data-setup='{}' width='384' height='240'  controls  class="videoThumb" >
               <source name='userVideos[]' src="{{asset('/postImages/'.$postVideos->video)}}" title="{{$postVideos->filename}}" />
             </video><br/><span class="remove">Remove</span></span>

            
             


             @endif --}}
        
          </div><!------END OF INPUT GROUP------->

      
           
           {{-- <div id="VideoUploaded" style="background:white;"></div> --}}
        </div><!------END OF COLUMN ------->


{{-- <input type="file" name="kaka" /> --}}
        </div><!------END OF ROW ------->


        
        <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
          <div class="col-sm-4">
            <div class="btn btn-primary prev1" >Prev</div>  
            <div class="btn btn-primary step3_next" >Next</div>  
          </div><!-- END OF COLUMN -->
        </div><!-- END OF ROW ---> 

       </div><!-- END OF TAB3 ---> 

       <div id="step-4" class="tab-pane" role="tabpanel">


        <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">

          <div class="col-sm-6">
  
            <label for="inputPostDate">Email</label>
            <input type="email" name="email" class="form-control mb-2" id="inputPostDate" value="{{ old('email') ? old('email') : $post->email}}" >
 
  
          </div><!-----END OF COLUMN----------->
          </div><!-----END OF ROW----------->
  
          <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">
            <div class="col-sm-6">
  
            <label for="inputPostDate">Phone</label>
            <input type="text" name="phone" class="form-control mb-2" id="inputPostDate" value="{{ old('phone') ? old('phone') : $post->phone}}" >
  
           
  
          </div><!-----END OF COLUMN----------->
          </div><!-----END OF ROW----------->

          
          <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
            <div class="col-sm-4">
              <div class="btn btn-primary prev1" >Prev</div>  
              {{-- <div class="btn btn-primary next1" >Save and Preview</div>  --}}
              <button type="submit" class="btn btn-primary step4_next" >Save and Preview</button> 

            </div><!-- END OF COLUMN -->
          </div><!-- END OF ROW ---> 


        </div><!-- END OF TAB4 ---> 

       
    </div>
</div> 

</div>


   
        
      <br>
  
    
              {{-- </div><!-------END OF FRAME---------------> --}}

   

      




    </form> 
  </div><!-----END OF CONTAINER---------------->
 


{{-- </div> --}}





  {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}


  {{-- <div class="container" style="margin-top:30px; width:90%;">

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><h2><strong>Edit Property Details </strong></h2>
      

       </div> --}}

    
    {{-- <div class="panel-body" style="padding:20px;"> --}}



{{-- <form action="{{route('adListing.update',$post->id)}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <input type="hidden" class="postid" name="postid" id="postid" value="">


          @if($errors->any())

          @foreach($errors->all() as $error)
          <div class="alert alert-danger fade show" role="alert">
            <strong>Error ! </strong> {{$error}} 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          </div>
        @endforeach
        @endif


          <div class="frame" >
            <div class="row">
              <div class="col-sm-12">
                    <div class="headingStyle" >Title Area</div>
              </div>
            </div> --}}

          {{-- <div class="row" style="padding:20px;">
           
          <div class="col-sm-8">
            <label for="inputPostTitle">Title</label>
            <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value="{{ old('title') ? old('title') : $post->title }}">

        


          </div><!-- END OF COLUMN -->



          <div class="col-sm-4">
            <label>Select Catagories</label>
            <select name="catagories" class="form-control" onchange="propTypeAmount(this.value)" >
             

              @if(!$catagories->isEmpty())
              @foreach($catagories as $cats)
               
               <option @if(in_array($cats->id,$post->catagories->pluck('id')->toArray())) {{'selected'}} @endif  value="{{$cats->id}}">{{$cats->title}}</option>
              @endforeach
           @endif  --}}
  
            {{-- </select>
  
         
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

        <div class="row" style="padding:20px;">

          <div class="col-sm-8">
            <label for="inputPostContent">Description</label>
            <textarea maxlength="10000" rows="8" cols="30"  name="description" class="form-control mb-2" id="inputPostContent">{{ old('description') ? old('description') : $post->description }}</textarea> --}}
           
       
        {{-- </div><!-- END OF COLUMN -->

        <div class="col-sm-4">
          <label for="inputPostContent"></label>
          <div id="textarea_feedback"></div>


        </div><!-- END OF COLUMN --> --}}




    

     
{{-- 
      </div><!-- END OF ROW --->
        </div><!-------END OF FRAME--------->
      <br> --}}


      {{-- /////////// RENT OR SALE type ///////// --}}
      {{-- <div class="frame" >
        <div class="row">
          <div class="col-sm-12">
                <div class="headingStyle" >Tenancy Details</div>
          </div>
        </div>

      <div class="row" style="padding:20px;">

        
        <div class="col-sm-3">
          <div id="checkRent">
          <label for="inputPostRent">Rent</label>
          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">£</div>
           </div>
          <input type="text" maxlength="13" name="rent" class="form-control" id="inputPostRent"  value="{{ old('rent') ? old('rent') : $post->rent }}" onkeypress="return isNumberKey(event, this);" >
        
          </div><!------END OF INPUT GROUP------->

         
        </div><!-----END OF RENT-------->

        <div id="checkSale">

          <label for="inputPostSale">Sale</label>

          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">£</div>
           </div>
          <input type="number" name="sale" step=".01" class="form-control" id="inputPostRent" value="{{ old('sale') ? old('sale') : $post->sale }}" >
        
          </div><!------END OF INPUT GROUP------->

        

        </div><!-----END OF SALE-------->

      </div><!----- END OF COLUMN --->

      


      <div class="col-sm-2">
        <label>No of Beds</label>
        <select name="noOfBeds" class="form-control" > --}}
          {{-- <option value="0" selected >Please Select</option>
             @for($i=1; $i<=20;$i++)
              
              <option {{ old('noOfBeds') == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
             @endfor
        

        </select> --}}

        {{-- <option @if(old('noOfBeds')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
        @for($i=1; $i<=20;$i++)
         
         <option   @if(old('noOfBeds')==$i) {{'selected'}} @else  @if($post->noOfBeds == $i && old('noOfBeds')=='')  {{"selected"}}  @endif @endif value="{{$i}}">{{$i}}</option>
        @endfor
   

   </select>

      
    </div><!-- END OF COLUMN --> --}}

      {{-- <div class="col-sm-2">
        <label>No of Bathrooms</label>
        <select name="noOfBaths" class="form-control" >
        
             <option @if(old('noOfBaths')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
             @for($i=1; $i<=20;$i++)
              
              <option   @if(old('noOfBaths')==$i) {{'selected'}} @else  @if($post->noOfBaths == $i && old('noOfBaths')=='')  {{"selected"}}  @endif @endif value="{{$i}}">{{$i}}</option>
              
             @endfor
        

        </select>

      
    </div><!-- END OF COLUMN -->

    <div class="col-sm-2">

      <label for="inputPostDate">Furnishing Options</label>
      <select name="furnish" class="form-control"  >
      <option value="0" selected >Please Select...</option>
          
          <option @if(old('furnish')==1) {{'selected'}} @else  @if($post->furnish == 1 && old('furnish')=='')  {{"selected"}}  @endif @endif  value="1">Funrnished</option>
          <option @if(old('furnish')==2) {{'selected'}} @else  @if($post->furnish == 2 && old('furnish')=='')  {{"selected"}}  @endif @endif  value="2">UnFurnished</option>
        
    

    </select>  
     

    </div><!-----END OF COLUMN----------->



    <div class="col-sm-3">

      <label for="inputPostDate">Rent Period</label><br>
      @if($post->rentPeriod=="monthly")
           @php $mSel='checked'; $wSel=''; @endphp
      @else
          @php $mSel=''; $wSel='checked'; @endphp
      @endif --}}


      {{-- <div class="form-check form-check-inline" style="margin-top:-20px;" >
        <input {{$mSel}} class="form-check-input"  type="radio" name="rentPeriod" id="inlineRadio1"  value="monthly" value="monthly">
       
        <label class="form-check-label" for="inlineRadio1"  >Monthly</label>
      </div>
      <div class="form-check form-check-inline" style="margin-top:-20px;">
        <input {{$wSel}} class="form-check-input" type="radio" name="rentPeriod" id="inlineRadio2" value="weekly">
        <label class="form-check-label" for="inlineRadio2" >Weekly</label>
      </div>
    
</div><!-----END OF COLUMN----------->


</div><!---------END OF ROW------------>
      


      <div class="row" style="padding:10px;">

        <div class="col-sm-2">

          @php
           $newDate =date("d-m-Y", strtotime($post->dateAvailable));
          @endphp

            <label for="datepicker">Date Available</label>
            <input type="text" name="dateAvailable" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('dateAvailable') ? old('dateAvailable') : $newDate }}" >
   --}}
          

          {{-- </div><!-----END OF COLUMN----------->

        <div class="col-sm-2">

          <label for="inputPostTenancy">Tenancy Length</label>
          <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">Month</div>
           </div>
          <input type="text" maxlength="2" name="minTanLength" step="01" class="form-control" id="inputPostTenancy"  value="{{ old('minTanLength') ? old('minTanLength') : $post->minTanLength }}" onkeypress="return isNumberNotDecimal(event, this);" >
        
          </div><!------END OF INPUT GROUP------->

       

          </div><!-----END OF COLUMN----------->

          <div class="col-sm-2">

            <label for="inputPostDeposit">Deposit Amount</label>
            <div class="input-group">
              <div class="input-group-prepend">
                 <div class="input-group-text">£</div>
             </div>
            <input type="text" maxlength="13" name="depositAmount" autocomplete="off" class="form-control" id="inputPostDeposit"  value="{{ old('depositAmount') ? old('depositAmount') : $post->depositAmount }}" onkeypress="return isNumberKey(event, this);" >
          
            </div><!------END OF INPUT GROUP------->
   --}}

          
      
          {{-- </div><!-----END OF COLUMN-----------> --}}

          {{-- <div class="col-sm-3">
            <label>Property Type</label>
            <select name="propType" class="form-control" >
              {{-- <option value="0" selected>Please Select...</option> --}}
             {{--     @if(!$propTypes->isEmpty())

              <option @if(old('propType')==0)  {{'selected'}} @endif value="0" selected >Please Select...</option>
              @foreach($propTypes as $propType)
               
               <option   @if(old('propType')==$propType->id) {{'selected'}} @else  @if($post->prop_types_id == $propType->id && old('propType')=='')  {{"selected"}}  @endif @endif value="{{$propType->id}}">{{$propType->name}}</option>
               @endforeach

               
              @endif 
  
            </select>
  
        </div><!-- END OF COLUMN -->

         


          <div class="col-sm-2">

            <label for="inputPostDate">Post Code</label>
            <input type="text" name="postCode" class="form-control mb-2" id="inputPostDate" value="{{ old('postCode') ?old('postCode') : $post->postCode}}" >
  
           
          </div><!-----END OF COLUMN-----------> --}}


      {{-- </div><!-------END OF ROW--------->

    </div><!-------END OF FRAME--------->
    <br> --}}


    {{-- /////////// RENT OR SALE type ///////// --}}
    {{-- <div class="frame" >
      <div class="row">
        <div class="col-sm-12">
              <div class="headingStyle" >Tenant Preferences</div>
        </div>
      </div>

    <div class="row" style="padding:20px;">

        <div class="col-sm-4">

    
          <fieldset class="border p-2">
            <legend  class="w-auto">Group 1</legend>

            <label class="toggle-switchy" for="example_1" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="driveWay" type="checkbox" id="example_1" @if($post->driveWay==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Drive Way</span>
            </label>

            <label class="toggle-switchy" for="example_2" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="studentAllow" type="checkbox" id="example_2" @if($post->studentAllow==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Student Allowed</span>
            </label> --}}

            {{-- <label class="toggle-switchy" for="example_3" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="familiesAllow" type="checkbox" id="example_3" @if($post->familiesAllow==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Families Allowed</span>
            </label>

            
        </fieldset>
         
        


         

      </div><!-----END OF COLUMN----------->

        <div class="col-sm-4">
          <fieldset class="border p-2">
            <legend  class="w-auto">Group 2</legend>

            <label class="toggle-switchy" for="example_5" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="pets" type="checkbox" id="example_5" @if($post->pets==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Pets</span>
            </label>

            <label class="toggle-switchy" for="example_6" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="smokeAllow" type="checkbox" id="example_6" @if($post->smokeAllow==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Smoke Allowed</span>
            </label>

            <label class="toggle-switchy" for="example_7" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
              <input name="billsInclude" type="checkbox" id="example_7" @if($post->billsInclude==1) {{'checked'}} @endif >
              <span class="toggle">
                <span class="switch"></span>	
              </span>
              <span class="label" style="font-size: 16px;width:200px;">Bills Include</span>
            </label>

           
  


          </fieldset>
         

        

      </div><!-----END OF COLUMN----------->

      <div class="col-sm-4">
        <fieldset class="border p-2">
          <legend  class="w-auto">Group 3</legend>

          <label class="toggle-switchy" for="example_8" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
            <input name="parking" type="checkbox" id="example_8" @if($post->parking==1) {{'checked'}} @endif >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;width:200px;">Parking</span>
          </label>

          <label class="toggle-switchy" for="example_9" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
            <input name="gardenAccess" type="checkbox" id="example_9" @if($post->gardenAccess==1) {{'checked'}} @endif >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;width:200px;">Garden Access</span>
          </label>

          <label class="toggle-switchy" for="example_4" data-size="sm" data-style="rounded" data-label="left" data-color='green'>
            <input name="dss" type="checkbox" id="example_4" @if($post->dss==1) {{'checked'}} @endif >
            <span class="toggle">
              <span class="switch"></span>	
            </span>
            <span class="label" style="font-size: 16px;width:200px;">DSS</span>
          </label>

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

        <div class="row" style="padding:10px;">

        <div class="col-sm-6">

          <label for="inputPostDate">Email</label>
          <input type="email" name="email" class="form-control mb-2" id="inputPostDate" value="{{ old('email') ? old('email') : $post->email}}" >

       

        </div><!-----END OF COLUMN----------->
        </div><!-----END OF ROW----------->

        <div class="row" style="padding:10px;">
          <div class="col-sm-6">

          <label for="inputPostDate">Phone</label>
          <input type="text" name="phone" class="form-control mb-2" id="inputPostDate" value="{{ old('phone') ? old('phone') : $post->phone}}" > --}}

        

        {{-- </div><!-----END OF COLUMN----------->
        </div><!-----END OF ROW----------->

      </div><!---------END OF FRAME --------------> --}}





          {{-- <div class="row">
       

      </div><!-- END OF ROW --->
      <br>

      <div class="frame" >
        <div class="row">
          <div class="col-sm-12">
                <div class="headingStyle" >Media Area</div>
          </div>
        </div>

      <div class="row" style="padding:10px;">

          <div class="col-sm-11">
           --}}

                

             {{-- <div class="dropzone dropzone-file-area" id="fileUpload">
              <div class="dz-default dz-message">
                  <h3 class="sbold">Drop files here to upload</h3>
                  <span>You can also click to open file browser</span>
                
              </div>
            </div>
            <p id="output">Select 0 of 5 Images</p> --}}
          
            {{-- src="{{asset('/postImages/'.$postImage->photo)}}" --}}
          
      {{-- <table id="existingImages"  class="table table-striped"></table>

      <div class="table table-striped" class="files" id="previews">
       
      
        <div id="template" class="file-row">
          <!-- This is used as the file preview template -->
              <div>
                <span class="preview"><img data-dz-thumbnail /></span>
              </div>
            
               <div>
            
               
                  
               </div>
        </div>
      
      </div> --}}
      




          {{-- </div><!------END OF COLUMN ------->
      </div><!----------END OF ROW----------->
     
     
      <div class="row" style="padding:10px;">
         --}}

          {{-- <div class="col-sm-5">
            <label for="inputFileName">Video</label><br>
            
                 <label class="Video">
                 
                  
                    <input type="file" name="videos"  id="videos" style="display:none;"  accept=".mp4,.avi,.asf,.mov,.qt,.avchd,.flv,.swf,.mpg,.mpeg,.mpeg-4,.wmv,.divx"/>
                    <img src="{{asset('images/attach.png')}}" width="30" height="30" style="cursor:pointer;" />
                    <div id="countVideos"></div>

             </label>
             
             <div id="VideoUploaded">
             @if($postVideos)
             <span class="pip1" title="{{$postVideos->filename}}"><video  id='my-video' class='video-js' preload='auto'  data-setup='{}' width='384' height='240'  controls  class="videoThumb" >
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

          </div><!------END OF COLUMN -------> --}}


{{-- <input type="file" name="kaka" /> --}}
          {{-- </div><!------END OF ROW ------->
      </div><!------END OF FRAME ------->
          <br> --}}

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
          
             {{-- <br><br> --}}
        

    
       
          {{-- <div class="col-md-12">
            <button type="submit" id="changeMe" class="btn btn-primary mb-2">Update Post</button>
          </div> --}}
        {{-- </div> --}}

     

{{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}

 {{-- <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
              <span>Upload file</span>
            </div>
            <div class="dropzone-previews"></div> --}}
          
{{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}







      {{-- </form>   --}}
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

      @php
function getImages($postImages){
    $file_list = [];

    if($postImages){
        foreach($postImages as $postImage){
            // $file_list[]=array('name'=>$postImage->filename,'path'=>'{{asset('/postImages/'.$postImage->photo)}}');
            // $file_list[]=array('name'=>$postImage->filename,'path'=>"{{asset('/postImages/'.$postImage->photo)}}");
            $file_list[]=array('name'=>$postImage->filename,'path'=>"$postImage->photo");


     }
     echo json_encode($file_list);
    } 
    
  

}

   
@endphp

<script>
$(document).ready(function(){

  var cat = $('#catagory').val();

  //  alert(cat);
  
  $('#checkSale').hide();
  
  propTypeAmount(cat);

  function propTypeAmount(val){
    // alert(val)
    if(val=='sale'){ //if sale
      $('#checkSale').show();
      $('#checkRent').hide();
      $('#checkRent').val('');
      $('#checkPeriod').hide('');
      $('#checkTenancy').hide('');
    }else{
      $('#checkSale').hide();
      $('#checkRent').show();
      $('#checkSale').val('');
      $('#checkPeriod').show('');
      $('#checkPeriod').show('');
      $('#checkTenancy').show('');


    }

  }
  //   if(val==1){
  //     $('#checkSale').show();
  //     $('#checkRent').hide();
  //     $('#checkRent').val('');
  //     $('#checkPeriod').hide('');
  //   }else{
  //     $('#checkSale').hide();
  //     $('#checkRent').show();
  //     $('#checkSale').val('');
  //     $('#checkPeriod').show('');
  //     $('#checkPeriod').show('');


  //   }

  // }



});



var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);


Dropzone.options.fileUpload = {
    url: "{{route('adListing.store')}}",
    // addRemoveLinks: true,
    autoProcessQueue : false,
    previewTemplate: previewTemplate,
   
    previewsContainer: "#previews",
  
    maxFilesize: 2,//max file size in MB,
    maxFiles: 2,
    acceptedFiles : ".png,.jpg,.gif,.jpeg,.svg",
    dictInvalidFileType: 'invalid file type. Please use jpg or png format pictures',

    thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
 
    init: function() {

    
      // var removeButton = this.createElement("<button data-dz-remove " +
                        // "class='del_thumbnail btn btn-default'><span class='glyphicon glyphicon-trash'></span></button>");

        myDropzone = this;

            //    var data = $('#getData').val();
              
                    // $.getJSON('get_item_images.php', function(data) { // get the json response

            //             $.each(obj, function(key,value){ //loop through it

                            //  var mockFile = { name: '1-202005311908159842646.png', size: '10' }; // here we get the file name and size as response 

                            //   myDropzone.emit('addedfile', mockFile);
                            //   myDropzone.emit('thumbnail', mockFile,'{{asset("postImages/user_2/post_23/1-202005311908159842646.png")}}');

                            //   myDropzone.files.push(mockFile);
                            //   myDropzone.emit('complete', mockFile);//uploadsfolder is the folder where you have all those uploaded files
                        
                            //   $('#demoform').append('<input type="text" id="'+mockFile.name+'" class="file" name="images[]" value="' + mockFile.name + '"></?><br/>');

                            // this.addedfile.call(this, mockFile);
                            // this.options.thumbnail.call(this, mockFile, '{{asset("postImages/user_2/post_23/1-202005311908159842646.png")}}');


                             
                          
                            // data-dz-remove
                            // myDropzone.options.addRemoveLinks=true;

                            // myDropzone.dropzone.options.addRemoveLinks = true;
                            // myDropzone.createElement('<i class="fa fa-times-circle-o fa-3x removeButton"></i>');

            //             // });

            // });

            this.on("complete", function(file) {
                $(".dz-remove").html("<div><span class='fa fa-trash text-danger' style='font-size: 1.5em'></span></div>");
            });
        
            this.on("addedfile", function(file) {
              // alert('sdf');

              var count = $("img[name='del[]']").length;
              count ++;
              output = document.getElementById('output');
              output.innerText = 'Image '+count+' of 5 Images';
              
            
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
                      // count= count + countImg;
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

      var uploadedImages =$("img[name='del[]']").length;
     
     // alert(bb)
    //  alert(uploadedImages );
    //  alert(countImg );
     if (uploadedImages > 15){
                 alert("You are only allowed to upload a maximum of 15 Images");
                 this.removeFile(file);
                 var count = $("img[name='del[]']").length;
                 output = document.getElementById('output');
                 output.innerText = 'Image '+count+' of 15 Images';
              
                 return;
              }

    
        let fileReader = new FileReader();

        fileReader.readAsDataURL(file);
        fileReader.onloadend = function() {

            let content = fileReader.result;
            // alert(serverFileName);
            // $('#file').val(content);
            $('#demoform').append('<input type="hidden" id="'+file.upload.filename+'" class="file" name="images[]" value="' + content + '"></?><br/>');
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
    

   




}




  function getPreviousImages(){
    var m = {{getImages($postImages) }}
    
  for(var i=0;i<m.length;i++){
    var p = m[i].path;
    // alert(p);
    $('#demoform').append('<input type="hidden" name="oldImages[]" value="'+p+'" />');
    var filename = m[i].name;
    var t ="{{asset('postImages/')}}";
    var b =t +'/'+p;
    // countImg++;
    $('#existingImages').append('<tr><td>'+
    '<span class="preview"><img width="80" height="80" src="'+b+'" /></span>' +
              '</td><td><span style="display:none;" class="remFile">'+filename+'</span></td>' +
              // '<td>'+
              //     '<p class="name" data-dz-name>34985934.png</p>'+
              //     '<strong class="error text-danger" data-dz-errormessage></strong>'+
              // '</td>'+
              // '<td>'+
              //     '<p class="size" data-dz-size>76776</p>'+
              
              // '</td>'+
               '<td>'+
                  '<img name="del[]" src="{{asset("images/delete-2.png")}}" class="btnDelete" width="20" height="20" style="cursor:pointer;margin-top:20px;" title="Delete the Image" >'+
               '</td><tr>');
               }


             
               var count = $("img[name='del[]']").length;
              // count = count + countImg;
              output = document.getElementById('output');
              output.innerText = 'Image '+count+' of 15 Images';

  }


  $("#existingImages").on('click', '.btnDelete', function () {

    var c = $(this).closest('tr').find('.remFile').html();
    // removalList.push(c);
    // countImg--;

    $.ajax({
      url: '/ajaxRequestFile/'+c ,
      type: 'get',

      success: function(response){
            // alert(response);
          }
    });


  $(this).closest('tr').remove();

  var count = $("img[name='del[]']").length;
    // count = count + countImg;
    output = document.getElementById('output');
    output.innerText = 'Image '+count+' of 15 Images';

  });

  
window.onload = function(){
  getPreviousImages();
} ;

$('.toggleText1').click(function() {
  // alert();
    // $('input[type="radio"]').not(':checked').prop("checked", true);

 
    $('#edDes').slideUp(1500,function(){

      $('#autoGenerate').slideDown(1500);
    

    });
    $('.ref').show();
      
  
       
    });
$('.toggleText2').click(function() {
  // alert();
    // $('input[type="radio"]').not(':checked').prop("checked", true);

 

    
      $('#autoGenerate').slideUp(1500,function(){
        
        $('#edDes').slideDown(1500);
      

      });
      $('.ref').hide();
    

       

  
});

$('.ref').click(function(){
var html="";
var title = $('#inputPostTitle').val();
var rent = $('#inputPostRent').val();
 
 html += "I am going to Apply for Preperty for " + title;
 html += " Whose Rent is "+ rent;

 $('#autoGenerate').html(html);
 $('#autoDescription').val(html);



});

//THEMES ARE
// default , arrows, dark, dots

$('#smartwizard').smartWizard({
selected: 0, // Initial selected step, 0 = first step
theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
justified: true, // Nav menu justification. true/false
autoAdjustHeight: false, // Automatically adjust content height
toolbarSettings:{
  showNextButton:false,
  showPreviousButton:false,

},
anchorSettings: {
            anchorClickable: false, // Enable/Disable anchor navigation
            enableAllAnchors: true, // Activates all anchors clickable all times
            markDoneStep: true, // add done css
            enableAnchorOnDoneStep: false // Enable/Disable the done steps navigation
        },
// toolbarSettings: {
//     toolbarPosition: 'bottom', // none, top, bottom, both
//     toolbarButtonPosition: 'left', // left, right, center
//     showNextButton: true, // show/hide a Next button
//     showPreviousButton: true, // show/hide a Previous button
//     toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
// },
});

$('.next1').click(function(){

$('#smartwizard').smartWizard("next");


});

$('.prev1').click(function(){

$('#smartwizard').smartWizard("prev");


});

// var editor;

CKEDITOR.replace( 'editor' );


$('[data-toggle="popover"]').popover();

$('body').on('click', function (e) {
    $('[data-toggle="popover"]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});



$('#postCode').autocomplete({
            // source: data,
              source: function(request, response) {
                // console.log(request);
            // Fetch data
            $.ajax({
                url: "{!! route('gpList') !!}/"+request.term,
                type: 'post',
                dataType: "json",
                data: {
                  search:request.term,
                     "_token": "{{ csrf_token() }}"
              
                 },
                success: function(data) {
                    //  alert(data);
                    response(data);
                }
              
            });
        },
        
            open: function(event, ui) {
                $(this).autocomplete("widget").css({
                    "width": $(this).parent().width()
                });
            }
        }).focus(function () {
          // alert();
              $(this).autocomplete('search', $(this).val())

        }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
            .append("<div><span style='float: left;margin-right:4px;font-size:14px;color:gray;'><i class='fas fa-map-marker-alt'></i></span> "+ item.label +"</div>")
            .appendTo(ul);
        };

// var val='RM8 2QB';

       


// $.ajax({
//                 url: "{!! route('gpList') !!}/helo",
//                 type: 'post',
//                 // dataType: "json",
//                 data: {
//                   // search:request.term,
//                      "_token": "{{ csrf_token() }}"
              
//                  },
//                 success: function(data) {
//                      alert(data);
//                     // response(data);
//                 }
              
//             });
      
     

function verifyPostcode(val){

         $.when( $.ajax({
            url: "{!! route('verifyPostcode') !!}/"+val,
            type: 'post',
            data: {
            //     "_token": $('#token').val()
                  "_token": "{{ csrf_token() }}"
              
                  },
        })).done(function( data ) {
            //   m=data;
            // alert(data)
              $('#getVerify').val(data);
            // m=data;
            // alert(data)
            //   return m;

            });
  }

</script>

  {{-- ////////////////////////////////////////////////////////////////////////////  --}}

{{-- @endif  --}}

@endsection
