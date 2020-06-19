@extends('clients.layout')

@section('content')
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

<style>



/*////////////////////////////////////////////////////*/

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


#postCode{
  text-transform: uppercase;
 }

    </style>

<div class="col-sm-6">
    @if(session('imageError'))
    <div class="alert alert-danger">
       {{session('imageError')}}
      </div>
    @endif
  </div>
  <br>

  {{-- <div class="container" style="margin-top: 20px; border:1px solid black"> --}}

    <div class="container mt-5">

      {{public_path()}}
      {{-- {{asset()}} --}}

      <form action="{{route('preview')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" > 
        <input type="hidden" name="formType" value="Add">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" id="getVerify" >
      {{-- <form action="{{route('adListing.store')}}" method="post" name="demoform" id="demoform" autocomplete="off" enctype="multipart/form-data" > --}}
        @csrf
        {{-- <input type="hidden" class="postid" name="postid" id="postid" value=""> --}}

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

              <label>Select Catagory</label>
              <select name="catagory" class="form-control" onchange="propTypeAmount(this.value)" >
                {{-- <option value="0">Select Catagories</option> --}}

                <option {{ old('catagory') == 1 ? "selected" : "" }} value="rent">Rent</option>
                <option {{ old('catagory') == 2 ? "selected" : "" }} value="sale">Sale</option>
                {{-- @if(!$catagories->isEmpty())
                   @foreach($catagories as $catagory)
                    
                    <option  @if($catagory->id==2) {{'selected'}} @endif value="{{$catagory->id}}">{{$catagory->title}}</option>
                   @endforeach
                @endif  --}}
    
              </select>
  
             
          </div><!-- END OF COLUMN -->
          </div><!-- END OF ROW -->
          <br>


          <div class="row" style="margin-left:0;margin-right:0;">



          {{-- <div class="col-sm-2">
        
            <label for="inputPostDate">Post Code</label>
            <input type="text" name="postCode" class="form-control mb-2" id="inputPostDate" value="{{ old('postCode')}}" >

         

          </div><!-----END OF COLUMN-----------> --}}

          <div class="col-md-4 customCell" >
            <label for="">Post Code <i class="fas fa-info-circle" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Please Enter Only Valid Post Code" style="cursor: pointer;"></i></label>
            <div class="input-group">
            <input type="text" class="form-control" name="postCode" id="postCode" placeholder="Post Code" value="@if(!empty($search)){{$search}}  @endif">
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
          <div class="btn btn-primary step1_next"  >Next</div>  
        </div><!-- END OF COLUMN -->
      </div><!-- END OF ROW ---> 

  </div><!-- END OF TAB 1 --->  

         <div id="step-2" class="tab-pane" role="tabpanel">

          <h3 style="margin:20px auto;">Property Details</h3>

          <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">
            
            
            <div class="col-sm-8" >
              
              {{-- <div class="form-group"> --}}
              
                <label for="inputPostTitle">&nbsp; Title</label>
                {{-- <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                  Popover on top
                </button>
                --}}
              

                <input type="text" name="title" class="form-control mb-2" id="inputPostTitle" placeholder="Enter Title" value="{{ old('title') }}">

                
                
                
                  
                </div><!-- END OF COLUMN -->
              </div><!-- END OF ROW --->
              <br><br>


              <div class="row" style="padding:20px;margin-left:0;margin-right:0;background:#fafafd;">

        
                <div class="col-sm-3">
                  <div id="checkRent">
                  {{-- <div class="form-group"> --}}
                  <label for="inputPostRent">Rent </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                       <div class="input-group-text">£</div>
                   </div>
                  <input type="text" maxlength="13" name="rent" class="form-control" id="inputPostRent"  value="{{ old('rent') }}" onkeypress="return isNumberKey(event, this);" >
                
                  </div><!------END OF INPUT GROUP------->
                
                </div><!-----END OF RENT-------->
        
                <div id="checkSale">
        
                  {{-- <div class="form-group"> --}}
                  <label for="inputPostSale">Sale
        
                  <div class="input-group">
                    <div class="input-group-prepend">
                       <div class="input-group-text">£</div>
                   </div>
                  <input type="text" maxlength="13" name="sale" step=".01" class="form-control" id="inputPostRent" value="{{ old('sale') }}" onkeypress="return isNumberKey(event, this);" >
                
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
                <label>No of Beds
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
        
        
  
            <div class="col-sm-3" id="checkPeriod">
        
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
        
              
        
        
              <div class="row" style="padding:10px;margin-left:0;margin-right:0;padding-top:30px;background:#fafafd;">
        
                <div class="col-sm-2">
        
                    <label for="datepicker">Date Available</label> &nbsp;&nbsp; <i class="fas fa-info-circle" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Please Enter the Date in the Format of dd-mm-yyyy" style="cursor: pointer;" ></i>
                    <input type="text" name="dateAvailable" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('dateAvailable')}}" >
          
                   
        
        
                  </div><!-----END OF COLUMN----------->
        
                <div class="col-sm-2" id="checkTenancy">
                  <label for="inputPostTenancy">Tenancy Length</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                       <div class="input-group-text">Month</div>
                   </div>
        
                    {{-- <label for="datepicker">Min Tenancy Length</label> --}}
                    {{-- <input type="text" name="minTanLength" class="form-control mb-2" autocomplete="off" id="datepicker" value="{{ old('minTanLength')}}" > --}}
        
                    <input type="text" maxlength="2" name="minTanLength" step="01" class="form-control" id="inputPostTenancy"  value="{{ old('minTanLength') }}" onkeypress="return isNumberNotDecimal(event, this);" >
                
                  </div><!------END OF INPUT GROUP------->
          
               
        
        
        
                  </div><!-----END OF COLUMN----------->
        
                  <div class="col-sm-2">
        
                    <label for="inputPostDeposit">Deposit Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                         <div class="input-group-text">£</div>
                     </div>
                    <input type="text" maxlength="13" name="depositAmount" autocomplete="off" class="form-control" id="inputPostDeposit"  value="{{ old('depositAmount')}}" onkeypress="return isNumberKey(event, this);" >
                  
                    </div><!------END OF INPUT GROUP------->
        
                  
        
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
        
                  
          
                </div><!-- END OF COLUMN -->
        
                 
        
        
                  
        
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
                              <input name="studentAllow" type="checkbox" id="example_2" @if(old('studentAllow')=='on'){{'checked'}} @endif >
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
                              <input name="familiesAllow" type="checkbox" id="example_3" @if(old('familiesAllow')=='on'){{'checked'}} @endif >
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
                            <input name="pets" type="checkbox" id="example_5" @if(old('pets')=='on'){{'checked'}} @endif >
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
                            <input name="smokeAllow" type="checkbox" id="example_6" @if(old('smokeAllow')=='on'){{'checked'}} @endif  >
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
                            <input name="billsInclude" type="checkbox" id="example_7" @if(old('billsInclude')=='on'){{'checked'}} @endif  >
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
                          <input name="parking" type="checkbox" id="example_8" @if(old('parking')=='on'){{'checked'}} @endif  >
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
                          <input name="gardenAccess" type="checkbox" id="example_9" @if(old('gardenAccess')=='on'){{'checked'}} @endif >
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
                          <input name="dss" type="checkbox" id="example_4" @if(old('dss')=='on'){{'checked'}} @endif >
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
                    <div class="btn btn-primary prev1" >Back</div>  
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
              <textarea id="editor" class="countChar" maxlength="10"   name="description" class="form-control mb-2" >{{ old('description') }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas quis quam aperiam accusantium consequatur! Nesciunt sapiente labore molestiae nemo fugit, velit, nulla similique natus facilis, odio reprehenderit deserunt aliquid vel eveniet ipsam possimus in officia minima dolore assumenda. Atque, minus!

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, in! Modi alias quis, blanditiis error quam deserunt a deleniti quia dignissimos minus impedit distinctio reiciendis libero voluptas ratione aperiam veniam veritatis natus molestias quae illum rem neque expedita obcaecati. Accusamus praesentium unde tenetur dignissimos nulla nemo harum voluptatum ratione nihil adipisci dolorum debitis expedita dolorem cupiditate, error architecto laudantium ullam est. Natus tempora voluptas consequuntur commodi mollitia deserunt iusto, officiis recusandae non rem ipsa quidem quo quis exercitationem ducimus id aperiam dolor rerum eligendi corrupti iure dolore? Molestiae accusantium dolor fugit nisi inventore fugiat, quas aut delectus alias excepturi modi!

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque dolore veniam pariatur, iusto vitae laboriosam, voluptatibus ducimus placeat adipisci natus necessitatibus a esse? Molestiae harum saepe ullam possimus ratione expedita accusantium esse modi inventore necessitatibus eum fugit, nisi totam magnam provident vel. Itaque facilis eum rerum, ea cupiditate voluptatem sint debitis amet iste, natus laudantium quibusdam quos vero pariatur temporibus voluptate aspernatur ab! Porro excepturi tempore explicabo, cumque esse distinctio voluptatibus, nulla, mollitia voluptas aliquam doloremque repellendus repellat saepe dolorem et dignissimos ipsam facere illo quod placeat expedita eveniet? Voluptas inventore maiores aperiam? Id quo sequi aliquam ut, ad consectetur inventore aperiam, commodi consequatur ipsam aut ea perspiciatis doloribus! Quidem adipisci similique tenetur saepe quas aliquid. Laborum maiores neque atque fugiat magni? Minima, quisquam reprehenderit molestias modi velit quos, temporibus voluptate quibusdam itaque eum officiis quidem recusandae accusantium, enim magnam laborum ullam iste? Repellat commodi blanditiis laborum! Sequi voluptatibus odit quo ipsam pariatur vero sapiente eaque sit. A non adipisci nobis nihil, aliquam neque nemo. Ipsa iusto blanditiis molestias eius nostrum illum possimus, culpa, dolores, officiis commodi praesentium dolorem eveniet nam cupiditate dicta repellendus tempora voluptate eligendi veniam repellat. Beatae distinctio dolorem magnam molestiae sunt rem, eius reprehenderit eos quae?
              </textarea>
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
            <input type="text" name="videos" class="form-control" id="inputPostRent"  value="{{ old('videos') }}" >
          
            </div><!------END OF INPUT GROUP------->
  
        
             
             {{-- <div id="VideoUploaded" style="background:white;"></div> --}}
          </div><!------END OF COLUMN ------->


{{-- <input type="file" name="kaka" /> --}}
          </div><!------END OF ROW ------->

  
          
          <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
            <div class="col-sm-4">
              <div class="btn btn-primary prev1" >Back</div>  
              <div class="btn btn-primary step3_next" >Next</div>  
            </div><!-- END OF COLUMN -->
          </div><!-- END OF ROW ---> 

         </div><!-- END OF TAB3 ---> 

         <div id="step-4" class="tab-pane" role="tabpanel">


          <div class="row" style="padding:10px;margin-left:0;margin-right:0;background:#fafafd;">

            <div class="col-sm-6">
    
              <label for="inputPostDate">Email</label>
              <input type="email" name="email" class="form-control mb-2" id="inputPostDate" value="{{ old('email') }}" >
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
              <input type="text" name="phone" class="form-control mb-2" id="inputPostDate" value="{{ old('phone') }}" >
    
              @if($errors->has('phone'))
                <div class="alert alert-danger mt-2" style="line-height:8px;">
                    @foreach($errors->get('phone') as $error)
                    {{$error}}
                    @endforeach
                </div>
              @endif
    
            </div><!-----END OF COLUMN----------->
            </div><!-----END OF ROW----------->

            
            <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
              <div class="col-sm-4">
                <div class="btn btn-primary prev1" >Back</div>  
                {{-- <div class="btn btn-primary next1" >Save and Preview</div>  --}}
                <button type="submit" class="btn btn-primary step4_next" >Save and Preview</button>   
              </div><!-- END OF COLUMN -->
            </div><!-- END OF ROW ---> 

          </div><!-- END OF TAB4 ---> 
{{-- 
          <div id="step-5" class="tab-pane" role="tabpanel">

            
            <div class="row" style="padding:20px 3px;margin-left:0;margin-right:0;">
              <div class="col-sm-4">
                <div class="btn btn-primary prev1" >Prev</div> 
                
            {{-- //////////////////////////PREVIEW AND SUBMIT ///////////////////////////// --}}

         




            {{-- //////////////////////////END OF PREVIEW AND SUBMIT ////////////////////// --}}









                

                
              </div><!-- END OF COLUMN -->
            </div><!-- END OF ROW ---> 

           
        </div><!-- END OF TAB5 --->     
      
      </div>
  </div> 

</div>


        <br>
    
      
                {{-- </div><!-------END OF FRAME---------------> --}}

     

        




      </form> 
    </div><!-----END OF CONTAINER---------------->
   
<script>

  


  // });

  $('#checkSale').hide();

  function propTypeAmount(val){
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
      if (uploadedImages > 15){
                  alert("You are only allowed to upload a maximum of 15 Images");
                  this.removeFile(file);
                  var count = $("img[name='del[]']").length;
                  output = document.getElementById('output');
                  output.innerText = 'Image '+count+' of 15 Images';
               
                  return;
               }

      // alert(files.length);
      // for (var i = 0; i <script files.length; i++) {
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
    


}




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

CKEDITOR.replace( 'editor' );

// ClassicEditor
// 		.create( document.querySelector( '#editor' ), {
      
// 			toolbar: ['bold', 'italic', 'bulletedList' ]
// 		} )
// 		.then( editor => {
// 			window.editor = editor;
// 		} )
// 		.catch( err => {
// 			console.error( err.stack );
// 		} );

    
 
// ClassicEditor
//     .create( document.querySelector( '#editor' ), {
//         fontSize: {
//             options: [
//                 'tiny',
//                 'default',
//                 'big'
//             ]
//         },
//         toolbar: [
//             'heading', 'bulletedList', 'numberedList', 'fontSize', 'undo', 'redo'
//         ]
//     } )
//     .then( editor => {
// 			window.editor = editor;
//  		} )
//     .catch( err => {
//  			console.error( err.stack );
//  		} );

$(document).ready(function(){
   
 
   
    
    });//////// END OF JQUERY


    


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





{{-- </div> --}}

@endsection
