@extends('clients.layout')



@section('content')


<style>


</style>

<div id="banner" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="banner-title">

                   
                   <form action="#" id="search_by_location_form" method="get">   


                    <div class="input-group" style="margin:150px;">
                        <input type="text" class="form-control" placeholder="Post Code">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="button">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>

                    </form>


                   {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt quis, architecto quasi. Iste excepturi veniam ea maxime libero officia, nesciunt.</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>


  {{-- RECENT PROPERTIES --}}

<div class="container">




    <div class="row">
        <div class="col-md-12">

            @if($posts)
              {{-- @foreach ($posts as $post)

              {{$post->title}}

             
                  
              @endforeach --}}
              @php 
              $totalRec =  $posts->count(); @endphp 

              {{-- @else 
              {{'not record found'}} --}}



            <div class="row my-5 ">
                <div class="col-md-12 mt-5">
                    <h2 class="text-center">Recent Properties</h2>
                </div>
            </div>


            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                  <a class="btn-floating" href="#multi-item-example" data-slide="prev" style="font-size:26px; margin-left:20px;"><i class="fas fa-caret-square-left"></i></a>
                  <a class="btn-floating" href="#multi-item-example" data-slide="next" style="font-size:26px;"><i class="fas fa-caret-square-right"></i></a>
                </div>
                <!--/.Controls-->
              
                <!--Indicators-->
                <ol class="carousel-indicators">
                  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                  <li data-target="#multi-item-example" data-slide-to="1"></li>
                  
                </ol>
                <!--/.Indicators-->
              
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
              
                  <!--First slide-->
                  @php 
                     $act = "active";
                     $row=1;
                     $mainRow = 1;
                     $bol = "false";
                  @endphp
                 {{-- <div class="carousel-item  {{$act}}"> --}}

                  @php 
                    //  $cycle =round((12 - $totalRec)/4); 
                     $cycle= intdiv(12 - $totalRec, $totalRec); 
                     $remainder = (12 - $totalRec)-($totalRec * $cycle);
                    //  echo $cycle."<br>";
                    //  echo $remainder;
                     $default=0;
                     if($remainder>0){
                         $default--;

                     }
                  @endphp 

                  {{-- @if($must >= $totalRec) --}}
               
                  @for($i=$cycle; $i >= $default; $i--)
                  @php 
                //   echo "code = " . $default;
                    if($i==-1 && $bol == "false"){
                        $bol = "true";
                    }
                   @endphp

                  
                    @foreach ($posts as $post)
                       @if(($mainRow == 1 && $row == 1) || ($mainRow == 2 && $row == 5) || ($mainRow == 3 && $row == 9) )
                              <div class="carousel-item  {{$act}}">
                       
                       @endif
                          
                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">

                                    @if(!$post->postImages->isEmpty())
                                    @foreach($post->postImages as $pImg)
                                      <img class="card-img-top" src="{{ asset('postImages/'.$pImg->photo)}}" alt="Image">
                                      @break
                         
                                      @endforeach
                                  @else 
                                      
                                      <img class="card-img-top" src="{{ asset('images/house.png')}}" alt="Image" width="170" height="160" >
                                
                                   @endif 

                                   {{-- @if(strlen($post->title) > 20)  {{ substr(html_entity_decode(strip_tags($post->title)),0,20) }}... @else  {{ substr(html_entity_decode(strip_tags($post->title)),0,20) }} @endif --}}
                              
                                <div class="card-body">
                                <h4 class="card-title">@if(strlen($post->title) > 16)  {{ substr(html_entity_decode(strip_tags($post->title)),0,16) }}... @else {{ substr(html_entity_decode(strip_tags($post->title)),0,16) }} @endif</h4>

                                <P style="font-size:14px;"> <i class="far fa-clock"></i>&nbsp;&nbsp;<time class="timeago" datetime="{{$post->updated_at}}z"></time>

                                </P>
                                <p style="font-size:14px;"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{$post->postCode}}</p>

                                <p class="card-text" style="min-height: 120px;"> @if(strlen($post->description) > 120)  {{ substr(html_entity_decode(strip_tags($post->description)),0,120) }}... @else  {{ substr(html_entity_decode(strip_tags($post->description)),0,120) }} @endif</p>

                                <form action="{{route('signlePreview')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="postId" value="{{$post->id}}" >
                                  <button class="btn btn-success" type="submit"  >View Details</button>
                                </form>

                                    {{-- <a href="#" class="btn btn-primary">View</a> --}}
                                </div>
                                </div>
                            </div>

                            @php 
                                $row++;
                                if($row>4){
                                    $act="";
                                //    break;
                                }
                                if($row == 5 || $row == 9){
                                    $mainRow++;
                                    echo '</div>';
                                }

                                if($bol=="true" && $remainder>=0){
                                    $remainder--;

                                }

                                if($remainder==0 && $bol=="true"){
                                break;

                                }
                                
                              
                             @endphp 
                        
                        {{-- @if( $mainRow == 2 || $mainRow == 3 )
                            </div> 
                            yahan per div lagi hei
                 
                          @endif --}}
                        
                    @endforeach

                   
                   
                
                    @endfor

                    {{-- </div> --}}


                                
                  
              
                    {{-- <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-2</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>
               --}}
                    {{-- <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-3</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div> --}}
                    
                     {{-- <div class="col-md-3" style="float:left">
                     <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-4</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div> --}}
              
                  {{-- </div> --}}
                  <!--/.First slide-->
              
                  <!--Second slide-->
                  {{-- <div class="carousel-item">
              
                    <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title--5</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>
              
                    <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-6</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>
              
                    <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-7</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3" style="float:left">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title-8</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>
              
                  </div> --}}
                  <!--/.Second slide-->
              
                 
              
                </div>
                <!--/.Slides-->
              
              </div>
              <!--/.Carousel Wrapper-->


              @endif 


              

        </div><!---END OF COLUMN----->

    </div><!---END OF ROW----->


    <!--Carousel Wrapper-->











</div><!----END OF CONTINER---->

    

























<div class="container section">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-head">Some Heading Goes Here</h2>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="service-box">
                <i class="fa fa-anchor"></i>
                <h3>Some Heading</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, provident.</p>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="service-box">
                <i class="fa fa-bar-chart"></i>
                <h3>Some Heading</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, provident.</p>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="service-box">
                <i class="fa fa-diamond"></i>
                <h3>Some Heading</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, provident.</p>
            </div>
        </div>
    </div>
</div>



{{-- <style>
    #map {
  height: 300px;
  width:400px;
}

</style>

<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">

<script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>
   <div id="map"></div>


<script>
  //  working example
   var address = 'ig3';
   var lati,loti;
$.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+address, function(data){
       console.log(data);
       lati = data[0]['lat'];
       loti = data[0]['lon'];
      
    //    alert(data[0][0]);

    var map = L.map('map').setView([lati, loti], 13);
    // var mymap = L.map('mapid').setView([51.505, -0.09], 15);


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// L.circle([lati,loti], 2).addTo(map);

var circle = L.circle([lati, loti], {
    // color: 'red',
    // fillColor: '#f03',
    fill:false,
    fillOpacity: 0.2,
    radius: 1500
}).addTo(map);


L.marker([lati, loti]).addTo(map)
//   .bindPopup(address)
//   .openPopup();

// L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
//     maxZoom: 18,
//     id: 'mapbox/streets-v11',
//     tileSize: 512,
//     zoomOffset: -1,
//     accessToken: 'your.mapbox.access.token'
// }).addTo(map);

    });

    // alert(lati);
    //    alert(loti);


function addr_search()
{
 var inp = document.getElementById("addr");
 var xmlhttp = new XMLHttpRequest();
 var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
 xmlhttp.onreadystatechange = function()
 {
   if (this.readyState == 4 && this.status == 200)
   {
    var myArr = JSON.parse(this.responseText);
    // myFunction(myArr);
        // alert(myArr);
        if(myArr.length > 0) {
            var out='';
            var kk=[];
            for(i = 0; i < myArr.length; i++){
                out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + myArr[i].lat + ", " + myArr[i].lon + ");return false;'>" + myArr[i].display_name + "</div>";
                kk[i]={'lat':myArr[i].lat,'lon':myArr[i].lon,'name':myArr[i].display_name };
                alert(kk[i]['name']);


            }
            // document.getElementById('results').innerHTML = out;
        }else{
            out="Sorry, no results...";
            // document.getElementById('results').innerHTML = "Sorry, no results...";
        }

   }
 };
 xmlhttp.open("GET", url, true);
 xmlhttp.send();

}
  

  
</script> --}}


{{-- @php


$lat = '51.03456676556'; // latitude of centre of bounding circle in degrees
    $lon = '-1.0374348374987'; // longitude of centre of bounding circle in degrees
    $rad ='4'; // radius of bounding circle in kilometers



    $R = 6371;  // earth's mean radius, km

    // first-cut bounding box (in degrees)
    $maxLat = $lat + rad2deg($rad/$R);
    $minLat = $lat - rad2deg($rad/$R);
    $maxLon = $lon + rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
    $minLon = $lon - rad2deg(asin($rad/$R) / cos(deg2rad($lat)));

    $sql = "Select Id, Postcode, Lat, Lon,
                   acos(sin(:lat)*sin(radians(Lat)) + cos(:lat)*cos(radians(Lat))*cos(radians(Lon)-:lon)) * :R As D
            From (
                Select Id, Postcode, Lat, Lon
                From MyTable
                Where Lat Between :minLat And :maxLat
                  And Lon Between :minLon And :maxLon
            ) As FirstCut
            Where acos(sin(:lat)*sin(radians(Lat)) + cos(:lat)*cos(radians(Lat))*cos(radians(Lon)-:lon)) * :R < :rad
            Order by D";
    $params = [
        'lat'    => deg2rad($lat),
        'lon'    => deg2rad($lon),
        'minLat' => $minLat,
        'minLon' => $minLon,
        'maxLat' => $maxLat,
        'maxLon' => $maxLon,
        'rad'    => $rad,
        'R'      => $R,
    ];
   
@endphp  --}}

<script>

        jQuery(document).ready(function() {
          jQuery("time.timeago").timeago();
        });

   
</script>






@endsection