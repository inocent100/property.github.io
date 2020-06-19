@extends('clients.layout')


{{-- Page is going to on index on pagination --}}
@php

// print_r($dataList);

@endphp

@section('content')
<style>
    #map {
  height: 100%;
  width:100%;
  min-height: 450px;
  margin:0;
 
  /* border:1px solid black; */
}

.table{
  margin-top:50px;
  margin-bottom:50px;
  border:1px solid black;
}

.table th, .table td { 
     border-top: none !important; 
 }

 #search{
  text-transform: uppercase;
 }



.customCell{
  padding:10px 10px 10px 30px;

}

.detailCell{
  padding-top:5px;
  padding-left: 10px;
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
			font-size:16px;
			font-weight: bold;
			margin-bottom: 0px;
			margin-right: 0px;
			min-width: 5%;
			width:auto;
			border: 1px solid #5c9bce;
			border-radius: 5px; 
			padding: 2px 10px 2px 10px; 
			/* background-color: #ffffff; */
      background: #34495e;
      color:white
		}


/* .listRow{
  margin-top:20px;
  margin-bottom:10px;
 
} */
 
 /* div[class^="col-"] {
    border: 1px solid black;
} */

</style>





<div class="container" style="margin-top:30px;">

  @if(session('error'))

  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{session('error')}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     

<script>
   $('#exampleModal').modal('show');
</script>


  @endif

  <style>
   
  </style>


  

     <div class="row">
       <div class="col-md-12">
            <p id="displayLocation" style="font-size: 20px; color:red; font-weight:bold;"></p>
       </div>
     </div>

     <form action="{{ url('prop_search')  }}" method="post">
        @csrf

        <input type="hidden" name="userSearch" id="userSearch" value=" {{ !empty($search)  ? $search :"london" }} " >
            <input type="hidden" name="dist" id="dist" value=" {{ !empty($distance)  ? $distance :"0.5" }} " >
            {{-- <input type="hidden" name="dataList" id="dataList" value=" {{ !empty($dataList)  ? $dataList :"" }} " > --}}






            <div class="row bg-white rounded mb-5 p-0" >
              <div class="col-md-3">
                  <div class="row">

                      <div class="col-md-12 customCell" >
                        <label for="">Post Code <i class="fas fa-info-circle" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Please Enter Only Valid Post Code" style="cursor: pointer;"></i></label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Post Code" value="@if(!empty($search)){{$search}}  @endif">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                        </div><!-----END OF COLUMN-------->

                        <div class="col-md-6 customCell">

                          <label for="">Catagory</label><br>
                          <select name="catagory" id="catagory" class="form-control"  id="">
                              <option value="rent">Rent</option>
                              <option value="sale">Sale</option>
                            
                          </select>
                          
                        </div><!-----END OF COLUMN-------->

                      <div class="col-md-6 customCell">

                        <label for="">Distance</label><br>
                        <select name="distance" id="distance" class="form-control"  id="">
                            <option value="0.5">0.5 Mile</option>
                            <option value="1">1 Mile</option>
                            <option value="2">2 Mile</option>
                            <option value="5">5 Mile</option>
                            <option value="10">10 Mile</option>
                            <option value="15">15 Mile</option>
                            <option value="20">20 Mile</option>
                            <option value="30">30 Mile +</option>
                        </select>
                        
                      </div><!-----END OF COLUMN-------->
                     

                  
                      <div class="col-md-12 customCell">
                        <label>Price Range</label><br>
                           <div class="row">
                               <div class="col-sm-2">
                                 Min:
                               </div><!---END OF COLUMN----->
                               <div class="col-sm-8">
                                <input type="text" class="form-control" name="min">
                               </div><!---END OF COLUMN----->

                           </div><!---END OF ROW---->
                           <div class="row">
                               <div class="col-sm-2">
                                 Max:
                               </div><!---END OF COLUMN----->
                               <div class="col-sm-8">
                                <input type="text" class="form-control" name="max">
                               </div><!---END OF COLUMN----->

                           </div><!---END OF ROW---->
                         
                    
                        
                      
                      </div><!-----END OF COLUMN-------->

                      <div class="col-md-12 customCell">
                        <label>Property Type</label><br>

                        <select name="propType" class="form-control" >
                          <option value="0" selected>All</option>
                          @if(!$propTypes->isEmpty())
                             @foreach($propTypes as $propType)
                              
                              <option  @if($propType->id==old('propType')) {{'selected'}} @endif value="{{$propType->id}}">{{$propType->name}}</option>
                             @endforeach
                          @endif 
              
                        </select>

                     
                        
                      </div><!-----END OF COLUMN-------->

                      <div class="col-md-12 customCell">
                        <button class="btn btn-success">Search</button>
                      </div><!-----END OF COLUMN-------->

                  </div><!-----END OF ROW-------->
              </div><!-----END OF COLUMN-------->


              {{-- This is for MAP --}}
              <div class="col-md-9" style="padding-right:0;">
                <div id="map"></div>

                <script>
               
                // alert(address);
                var add=null;
                var address = $('#userSearch').val();
                var distance = $('#dist').val();
                // alert(distance);

              
                       var tmp = null;
               $.when( $.ajax({
                'async': false,
                url:"/ajaxReq/"+address+"/"+ distance,
                // data:param
            })).done(function( a1 ) {
              // alert(a1);
               tmp = JSON.parse(a1);
              //  alert(tmp);
             
               return a1;
              
 
                

                });

                        

                // var address = 'ig3 9xg';
                distance = distance * 1609.34;

                 var lati,loti;
                        $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+address, function(data){
                            // console.log(data);
                            lati = data[0]['lat'];
                            loti = data[0]['lon'];
                            var name = data[0]['display_name'];
                            // alert(name);
                           name = name.replace(', Royaume-Uni','')
                            $('#displayLocation').html("<i class='fas fa-map-marker-alt'></i>"+" "+name);
                            // alert(lati);
                            // alert(loti);
                            
                            //    alert(data[0][0]);

                            var map = L.map('map').setView([lati, loti], 13);
                            // var mymap = L.map('mapid').setView([51.505, -0.09], 15);


                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                      //  alert(tmp);

                      
                      if(tmp==null){
                        // alert(lati);
                        // alert(loti);
                              marker =new  L.marker([lati, loti]).addTo(map);
                            //  $('#search').val('SW1A 2DX');

                            }
                         
                            
                            for (var i = 0; i < tmp.length; i++) {
                              console.log(tmp[i][0]);
                            marker = new L.marker([tmp[i][1],tmp[i][2]])
                              .bindPopup(tmp[i][0])
                              .addTo(map);
                            // console.log([tmp[i][1],tmp[i][2]]);
                          }

                     
                        // L.circle([lati,loti], 2).addTo(map);

                     //   alert(distance);

                    //  alert(lati);
                    //  alert(loti);

                    //  circle=L.Circle([lats[i],longs[i]],value[i]).addTo(map);

                    //     var circle = L.circle([lati, loti], {
                    //         // color: 'red',
                    //         // fillColor: '#f03',
                    //         fill:false,
                    //         fillOpacity: 0.2,
                    //         radius: distance
                    //     }).addTo(map);


                        // L.marker([lati, loti]).addTo(map)

                      //   L.geoJson(sites,{
                      //     onEachFeature: siteslabels
                      // }).addTo(map);
                      
                      //   function siteslabels (feature, layer){
                      //     layer.bindPopup("<p class='info header'>"+ 
                      //     "<b>" + feature.properties.SITE + "</b>" + 
                      //     "</br>" + feature.properties.Address1 +
                      //     "</br>" + feature.properties.Address2 +
                      //     "</p>");
                      //     };

                            });

                                                
                        </script>
             
              
              </div><!-----END OF COLUMN-------->
          </div><!-----END OF ROW-------->



          
    </form>

    <div class="row" style="background:white;padding:10px;margin-bottom:10px;">
      <div class="col-md-12">
        <div class="row form-group">
        


          <label for="" class="col-form-label">Per Page</label>
          <div class="col-sm-1">
            <select name="perPg" id="perPg" class="form-control" id="">
              <option value="5" selected>5</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
          </select>
          </div><!--END OF COLUMN----->

          <label for="" class="col-form-label">Order By</label>
          <div class="col-sm-3">
            <select name="orderBy" id="orderBy" class="form-control" id="">
              <option value="priceLow">Price : Low to High</option>
              <option value="priceHigh">Price : High to Low</option>
              <option value="date">Date</option>
              <option value="distance">Distance</option>
 
 
         </select>
          </div><!--END OF COLUMN----->

          <div class="col-sm-2">
              <a href="#" id="filter" class="btn btn-success"  >Apply Filter</a>

          </div><!--END OF COLUMN----->

        </div><!-----END OF ROW AND FORM GROUP------>

             
               
      
      </div><!----END OF COLUMNS------>
    </div><!----END OF ROW------>

    
  
   

    <div id="table_data" style="margin-top: 10px;">
      @include('clients.pagination')
         </div>
      </div>

   


  </div><!---------END OF CONTAINER------------>

   

   



    <script>
      
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



        $('#search').autocomplete({
            // source: data,
              source: function(request, response) {
                // console.log(request);
            // Fetch data
            $.ajax({
                url: "getPostcodeList/"+request.term,
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

       
        // $("#search']").autocomplete({
        //             // select: function(evt, ui) {
        //             //     var p = $(this).parent().parent(),
        //             //         i = ui.item;
        //             //     // p.find('.gl_code').val(i.id);
        //             //     $('#client_id').val(i.id);
                       

        //             // },
        //             minLength :0,
        //             source: function(request, response) {
        //                 // Fetch data
        //                 $.ajax({
        //                     url: "getPostcodeList/"+search,
        //                     type: 'post',
        //                     dataType: "json",
        //                     data: {
        //                         search: request.term
                          
        //                     },
        //                     success: function(data) {
        //                         alert(data);
        //                         response(data);
        //                     }
                          
        //                 });
        //             }
        //         }).focus(function () {
        //                 $(this).autocomplete('search', $(this).val())
        //         });
        ////





    //     $(".editor").each(function () {
    //     let id = $(this).attr('id');
    //     CKEDITOR.replace(id, options);
    // });
        // CKEDITOR.replace( '.editor' );
 


        $(document).ready(function(){

          
        // $("#perPg").change(function() {

        // var selectedValue = $(this).val(),
        //     selectedText = $('option:selected', this).text();
        //     // alert(selectedText);
        //     fetch_data(1);

        // });

        // $("#orderBy").change(function() {

        // var selectedValue = $(this).val(),
        //     selectedText = $('option:selected', this).text();
        //     // alert(selectedText);
        //     fetch_data(1);

        // });

        $("#filter").click(function() {

            // alert(selectedText);
            fetch_data(1);

        });


      


   
         
         $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          // alert();
          var page = $(this).attr('href').split('page=')[1];

          fetch_data(page);
         });
         
         function fetch_data(page)
         {
           var search = $('#search').val();
           var distance = $('#distance').val();
           var perPage = $('#perPg').val();
           var orderBy = $('#orderBy').val();
          //  alert(perPage);
          // alert(orderBy);

          var param = {'search':search,'distance':distance,'perPage':perPage,'orderBy':orderBy};
        
          $.ajax({
           url:"get_ajax_data?page="+page,
          //  dataType:'post',
           data: param,
         
           success:function(data)
           {
            //  alert(data);
            $('#table_data').html(data);
           }
          });
         }
         
        });

     



       
    </script>






@endsection 