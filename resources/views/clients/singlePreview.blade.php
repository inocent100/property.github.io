@extends('clients.layout')

@section('content')



@if($post)
<style>

  .carousel-inner{
    margin-top:-20px;
  }
 .carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel-item{
    text-align: center;
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
    padding:0 !important;
}
.bs-example{
	margin: 20px;
}

.carousel-item img{
  width:100%;
  height: 500px;
}

/* .modal-dialog,
.modal-content {
    /* 80% of window height */
 /*   height: 100%;
    width: 100%;
}

.modal-body {
    /* 100% = dialog height, 120px = header + footer */
   /* max-height: calc(100% - 120px);
    overflow-y: scroll;
} */


/* 
.carousel-control-prev-icon {
  margin-left: -160px;
}
*/
.col{
  border:1px solid black;
}

.carousel-control-prev-icon:after {
   content: '<';
  font-size: 20px;
  font-weight: bold; 
  padding:5px;
  color:white;
  background: black;
}

.carousel-control-next-icon:after {
   content: '>';
  font-size: 20px;
  font-weight: bold; 
  padding:5px;
  color:white;
  background: black;
}


table tr{
  line-height: 16px;

}
 table td{
   border:0px;
 }





/* .carousel-control-next-icon {
  margin-right: -150px;
} */



/* /////////////////////////////////////////// */


/* $bootstrap-sm: 576px;
$bootstrap-md: 768px;
$bootstrap-lg: 992px;
$bootstrap-xl: 1200px;

// Crop thumbnail images.
#gallery {
  img {
    height: 75vw;
    object-fit: cover;
    
    @media (min-width: $bootstrap-sm) {
      height: 35vw;
    }
    
    @media (min-width: $bootstrap-lg) {
      height: 18vw;
    }
  }
}

// Crop images in the coursel
.carousel-item {
  img {
    height: 60vw;
    object-fit: cover;
    
    @media (min-width: $bootstrap-sm) {
      height: 350px;
    }
  }
} */

</style>

<div class="container my-5 ">




          <div class="row" >

          <div class="col-sm-10 offset-1">

            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="false" >
            <!-- Carousel indicators -->


            <ol class="carousel-indicators">
              @if($post->postImages->count()!=0)
                  
                  @php $m=0; @endphp
                  @foreach($post->postImages as $img)
                  @if($m==0)
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                    @php $m++; @endphp
                    @continue
                  @endif
                    <li data-target="#myCarousel" data-slide-to="{{$m}}"></li>
                    @php $m++; @endphp
                  @endforeach 


              @endif 
                {{-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li> --}}
            </ol>
            <!-- Wrapper for carousel items -->
            @php  $act = "active"; @endphp
            <div class="carousel-inner ">
              {{-- @if( $p->postImages->count() > 1 ) --}}
            @if($post->postImages->count()!=0)
           
               @foreach($post->postImages as $img)
                  <div class="carousel-item item {{$act}}">
                     <a href="#" class="showModel"><img src="{{asset('project/public/postImages/'.$img->photo)}}" alt="#"></a>
                  </div>
                   @php $act=""; @endphp
              @endforeach    
            @else 
            <div class="carousel-item active">
            <a href="#" class="showModel"><img src="{{asset('images/house.png')}}" alt="#"></a>
            </div>

            @endif 
              
               
                {{-- <div class="carousel-item">
                  <a href="#" class="showModel"><img src="{{asset('postImages/user_2/post_50/2-202006131401537450032.png')}}" alt="Second Slide"></a>
                </div>
                <div class="carousel-item">
                  <a href="#" class="showModel"><img src="{{asset('postImages/user_2/post_50/3-202006131401534582552.png')}}" alt="Third Slide"></a>
                </div> --}}
                
              </div>
              <!-- Carousel controls -->
              
              
              
            </div>
            <a class="carousel-control-prev prev" href="#myCarousel" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a> 
            
            <a class="carousel-control-next next" href="#myCarousel" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
            
            <div class="num mt-3" style="font-size:16px;font-weight:bold;" ></div>
          </div>

        
     
 



    </div><!--------END OF ROW------>


    {{-- /////////////////////////////////////////////////////////////////////////////// --}}
<div class="row my-5 p-3">
    <div class="col-md-7">
          <div class="row pb-3 p-2 rounded bg-white mb-4">
            <div class="col-md-12">
              <h3>Overview</h3>
            <hr>
            <div class="row mt-2">
              <div class="col-md-3">
                <span><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Location : </span>

               </div><!-----END OF COLUMN-------->
              <div class="col-md-4">
                <span>{{$post->postCode}}</span>

               </div><!-----END OF COLUMN-------->

              <div class="col-md-3">
                <span><i class="fas fa-bed"></i>&nbsp;&nbsp;No of Beds : </span>

               </div><!-----END OF COLUMN-------->
              <div class="col-md-2">
                <span>{{$post->noOfBeds}}</span>

               </div><!-----END OF COLUMN-------->


            </div><!------END OF ROW------->

            <br>

            <div class="row mt-2">
              <div class="col-md-3">
                <span><i class="fas fa-bath"></i>&nbsp;&nbsp;Bathroom : </span>

               </div><!-----END OF COLUMN-------->
              <div class="col-md-4">
                <span>{{$post->noOfBaths}}</span>

               </div><!-----END OF COLUMN-------->

              <div class="col-md-4">
                <span><i class="fas fa-users"></i>&nbsp;&nbsp;Maximum Tenants : </span>

               </div><!-----END OF COLUMN-------->
              <div class="col-md-2">
                <span>{{$post->maxNumbTan}}</span>

               </div><!-----END OF COLUMN-------->


            </div><!------END OF ROW------->




              
            </div><!------END OF COLUMN------>
          </div><!------END OF ROW------>

      <div class="row">
        <div class="col-md-12">
          
          <div class="row pb-3 p-2 rounded bg-white mb-4">
            <div class="col-md-12">
              <h3>Description</h3>
              <hr>
              <p>{!! $post->description !!}</p>
  
            </div><!------END OF COLUMN------>
  
          </div><!------END OF ROW------>
   




        </div><!------END OF COLUMN------>
      </div><!------END OF ROW------>

      <div class="row pb-3 p-2 rounded bg-white mb-4">
        <div class="col-md-12">
          

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="true">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="localTransport-tab" data-toggle="tab" href="#localTransport" role="tab" aria-controls="localTransport" aria-selected="false">Local Transport</a>
            </li>
          
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="features" role="tabpanel" aria-labelledby="features-tab">
  
              <div class="row mt-4">
                <div class="col-md-6 mb-3" >
                  <span style="font-size:20px;"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;Price & Bills</span>
                </div><!-----END OF COLUMN-------->
                     
               <div class="col-md-6">
                  <span style="font-size:20px;"><i class="fas fa-user-alt"></i>&nbsp;&nbsp;Tenant Preference</span>
                  
                </div><!-----END OF COLUMN-------->
                
                
                
              </div><!-----END OF ROW-------->
              <div class="row">
                <div class="col-md-6">
  
                  <table class="table table-striped">
                    
                    <tbody>
                      <tr>
                        <td>Deposit</td>
                         <td>{{ number_format($post->deposit,2) }}</td>
                      </tr>
  
                      @if($post->catagory=="rent")
                      <tr>
                        <td>Rent PCM</td>
                         <td>£ {{ number_format($post->rent,2) }}</td>
                      </tr>
                      
                    
                      <tr>
                        <td>Bills Include</td>
                         <td>
                           @if($post->billsInclude == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
                      @else 
                      <tr>
                        <td>Sale Price</td>
                         <td>£ {{ number_format($post->sale,2) }}</td>
                      </tr>
  
                      @endif
  
  
                    </tbody>
      
      
                  </table>
                  
  
  
              </div><!-----END OF COLUMN-------->
  
                <div class="col-md-6">
  
                  <table class="table table-striped">
                    
                    <tbody>
                      <tr>
                        <td>Student Friendly</td>
                         <td>
                           @if($post->studentAllow == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
                     
                      <tr>
                        <td>Families Allowed</td>
                         <td>
                           @if($post->familiesAllow == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                      <tr>
                        <td>Pets Allowed</td>
                         <td>
                           @if($post->pets == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                      <tr>
                        <td>Smokers Allowed</td>
                         <td>
                           @if($post->smokeAllow == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                      <tr>
                        <td>DSS Income Accepted</td>
                         <td>
                           @if($post->dss == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                    
                      
                    </tbody>
      
      
                  </table>
                  
  
  
              </div><!-----END OF COLUMN-------->
  
  
              </div><!-----END OF ROW-------->
  
              <div class="row"  >
                <div class="col-md-6 mt-3 mb-3" >
                  <span style="font-size:20px;"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Availability</span>
                </div><!-----END OF COLUMN-------->
                     
               <div class="col-md-6 mt-3 mb-3">
                  <span style="font-size:20px;"><i class="far fa-list-alt"></i>&nbsp;&nbsp;Features</span>
                  
                </div><!-----END OF COLUMN-------->
                
                
                
              </div><!-----END OF ROW-------->
  
  
               
              <div class="row">
                <div class="col-md-6">
  
                  <table class="table table-striped">
                    
                    <tbody>
                      <tr>
                        <td>Available From</td>
                         <td>{{ date_format(date_create($post->dateAvailable),"d-m-Y") }}</td>
                      </tr>
  
                      @if($post->catagory=="rent")
  
                      <tr>
                        <td>Minimum Tenancy</td>
                         <td>{{ $post->minTanLength }}</td>
                      </tr>
                    @endif
                    </tbody>
  
                  </table>
                </div><!-----END OF COLUMN--------->
  
  
  
                <div class="col-md-6">
  
                  <table class="table table-striped">
                    
                    <tbody>
                      <tr>
                        <td>Garden</td>
                         <td>
                           @if($post->gardenAccess == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
                     
                      <tr>
                        <td>Parking</td>
                         <td>
                           @if($post->parking == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                      <tr>
                        <td>Furnishing</td>
                         <td>
                           @if($post->furnish == 1)
                              <span style="color:#5cb85c;font-size:1.2em;font-weight:bold;"><i class="fas fa-check"></i></span>
                           @else 
                             <span style="color:#b94a48;font-size:1.2em;font-weight:bold;"><i class="fas fa-times"></i></span>
  
                           @endif 
                         </td> 
                      </tr>
  
                    
  
                  
  
                    
                      
                    </tbody>
      
      
                  </table>
                  
  
  
              </div><!-----END OF COLUMN-------->
  
  
  
  
              </div><!-----END OF ROW------->
              
             
             
  
            </div><!----END OF TABLE FEATURES---------->
  
            <div class="tab-pane fade" id="localTransport" role="tabpanel" aria-labelledby="localTransport-tab">...

  
            
            </div><!-----END OF LOCAL TRANSPORT---->
          </div>






        </div><!------END OF COLUMN------>
      </div><!------END OF ROW------>

      <div class="row pt-3 pb-3 rounded bg-white">
        <div class="col-md-12">
          

          <style>
            #map {
          height: 300px;
          width:100%;
        }
        
        </style>
        
          <div id="map"></div>
    
          <script>
            
      var address = {!! json_encode($post->postCode) !!};
      // alert(address);
       var lati,loti;
    $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+address, function(data){
           console.log(data);
           lati = data[0]['lat'];
           loti = data[0]['lon'];
          
        //    alert(data[0][0]);
    
        var map = L.map('map',{ zoomControl: false }).setView([lati, loti], 15);
        // var mymap = L.map('mapid').setView([51.505, -0.09], 15);
    
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // L.circle([lati,loti], 2).addTo(map);
    
    // var circle = L.circle([lati, loti], {
    //     // color: 'red',
    //     // fillColor: '#f03',
    //     fill:false,
    //     fillOpacity: 0.2,
    //     radius: 1500
    // }).addTo(map);
    
    
    L.marker([lati, loti]).addTo(map);
    // var map = new L.map('map', { zoomControl: false });

    
    map.dragging.disable();
    // var map = L.mapbox.map('map', { zoomControl: false });

    // map.zoomControl  false;

    
    });
    
    
      
    </script>












        </div><!------END OF COLUMN------>
      </div><!------END OF ROW------>


    </div><!------END OF COLUMN------>


    <div class="col-md-4 ml-5">
      <div class="row pb-3 p-2 rounded bg-white mb-4">
        <div class="col-md-12 ">

          <h3 >Contact</h3>
          <hr>
        

          <div class="row">
            <div class="col-md-4">
              <i class="fas fa-at"></i>&nbsp;&nbsp;E mail : 
            
          </div><!-----END OF COLUMN-------->
            <div class="col-md-4">
            {{$post->email}}
            
          </div><!-----END OF COLUMN-------->
              </div><!------END OF ROW------->
  
              <br>
  
          <div class="row">
            <div class="col-md-4">
              <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;Phone : 
            
          </div><!-----END OF COLUMN-------->
            <div class="col-md-4">
            {{$post->phone}}
            
          </div><!-----END OF COLUMN-------->
              </div><!------END OF ROW------->


        </div><!------END OF COLUMN------>
      </div><!------END OF ROW------>

      <div class="row">
        <div class="col-md-12" style="height:700px;background:white">
          Advertisement
        </div><!------END OF COLUMN------>
      </div><!------END OF ROW------>



    </div><!------END OF COLUMN------>




  </div>

 {{-- /////////////////////////////////////////////////////////////////////////////////    --}}

 
  <div class="row">
    <div class="col-md-12">
      <a href="javascript:history.back()" class="btn btn-primary">Go Back to List</a> 
    </div> 
  </div>
  

   

  </div><!----END OF CONTAINER-------->

@endif




<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">

<div class="modal-content">

<div class="modal-header">
  Images
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>


<div class="mnum"></div>

  <div id="carouselExample" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="false">
    @php  $act = "active"; @endphp
    <div class="carousel-inner ">
      {{-- @if( $p->postImages->count() > 1 ) --}}
    @if($post->postImages->count()!=0)
   
       @foreach($post->postImages as $img)
          <div class="carousel-item mitem {{$act}}">
             <a href="#" class="showModel"><img src="{{asset('project/public/postImages/'.$img->photo)}}" alt="#"></a>
          </div>
           @php $act=""; @endphp
      @endforeach    
    @else 
    <div class="carousel-item active">
    <a href="#" class="showModel"><img src="{{asset('images/house.png')}}" alt="#"></a>
    </div>

    @endif 
      
       
      
    </div>
    
    <a class="carousel-control-prev mprev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next mnext" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>






</div>
</div>
</div><!-------END OF MODEL------->

<script>
    $(document).ready(function(){

      $('.showModel').click(function(){

        $('#exampleModal').modal();

      });



      var totalItems = $('.item').length;
            var currentIndex = $('div.item.active').index() + 1;

            var down_index;
            $('.num').html(''+currentIndex+'/'+totalItems+'');

                $(".next").click(function(){
                currentIndex_active = $('div.item.active').index() + 2;
                if (totalItems >= currentIndex_active)
                {
                    down_index= $('div.item.active').index() + 2;
                    $('.num').html(''+currentIndex_active+'/'+totalItems+'');
                }
            });

                $(".prev").click(function(){
                    down_index=down_index-1;
                if (down_index >= 1 )
                {
                    $('.num').html(''+down_index+'/'+totalItems+'');
                }
            });
      
      var mtotalItems = $('.mitem').length;
            var mcurrentIndex = $('div.mitem.active').index() + 1;

            var mdown_index;
            $('.mnum').html(''+mcurrentIndex+'/'+mtotalItems+'');

                $(".mnext").click(function(){
            
                mcurrentIndex_active = $('div.mitem.active').index() + 2;
                if (mtotalItems >= mcurrentIndex_active)
                {
                    mdown_index= $('div.mitem.active').index() + 2;
                    $('.mnum').html(''+mcurrentIndex_active+'/'+mtotalItems+'');
                }
            });

                $(".mprev").click(function(){
                    mdown_index=mdown_index-1;
                if (mdown_index >= 1 )
                {
                    $('.mnum').html(''+mdown_index+'/'+mtotalItems+'');
                }
            });
      





    });

 


   
</script>

@endsection 
