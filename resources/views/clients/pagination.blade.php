       {{-------------------------- FOR LISTING --------------------------------}}
       {{-- @if(!$postListing || $postListing->isEmpty())

       <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
      
          <div class="alert alert-danger" style="margin-bottom: 1px;height: 30px; line-height:30px; padding:0px 15px;">
            <p>Oops! No Record Not Found</p>
      
          </div>
        </div>
       </div>

   @endif  --}}

      
       @if($postListing)

       <div class="row">
         <div class="col-md-12" style="padding:0;">
           <div class="alert alert-info" style="margin-bottom: 1px;height: 40px; line-height:40px; padding:0px 15px;">
             <p>We have Found <span style="font-size:16px;margin-left:5px;margin-right:5px;color:red;"><strong>{{$postListing->total()}}</strong></span> Properties in this Area</p>

           </div>
         </div>
       </div>


       @foreach($postListing as $postList)
       
       <div class="row shadow mb-3 bg-white rounded mt-4">
         {{-- THIS IS FOR IMAGE --}}
         <div class="col-md-2 pt-3">
           {{-- {{dd($postList->postImagess)}} --}}
         @if(!$postList->postImages->isEmpty())
           @foreach($postList->postImages as $pImg)
             <img src="{{ asset('postImages/'.$pImg->photo)}}" alt="#" width="170" height="170">
             @break

             @endforeach
         @else 
             
             <img src="{{ asset('images/house.png')}}" alt="#" width="170" height="170">
       
          @endif           
     </div><!-----END OF COLUMN-------->
         
         {{-- THIS IS DETAILS SECTION--}}
         
         <div class="col-md-10">
           <div class="row">
             <div class="col-md-4 pt-3">
               @if($postList->catagory=='rent')
                  <span> <strong>£ {{number_format($postList->rent,2)}}</strong>&nbsp;&nbsp; Per month</span>
               @else 
                  
                  <span> <strong>£ {{number_format($postList->sale,2)}}</strong>&nbsp;&nbsp; Sale Amount</span>
               @endif 

             </div><!-----END OF COLUMN-------->

             <div class="col-md-2 pt-2">
               <i class='fas fa-map-marker-alt'></i> {{number_format($postList->dist,2)}}&nbsp; miles
             </div><!-----END OF COLUMN-------->

             <div class="col-md-6  pt-2" style="text-align: right">
               <i class="far fa-clock"></i>&nbsp;Last Update around&nbsp; <time class="timeago" datetime="{{$postList->updated_at}}z"></time>
               
           </div><!----END OF COLUMN-------->

           </div><!-----END OF ROW-------->


           <div class="row">
                 <div class="col-md-12 pt-2">
                     {{-- Heading --}}
                     <a href="#"><h4>{{$postList->title}}</h4></a>

                 </div><!----END OF COLUMN-------->
                
               
       
           </div><!-----END OF ROW-------->
       
           <div class="row ">
             <div class="col-md-3 ">
             

               {{-- postcode --}}
               <span>Postcode : <strong> {{$postList->postCode}}</strong></span>
               
              </div><!----END OF COLUMN-------->
              
              <div class="col-md-4 ">
                
                <span>Property Type : <strong> {{$postList->prop_type}}</strong></span>
              
            
               
           </div><!----END OF COLUMN-------->
           </div><!----END OF ROW-------->
       
                   
       
           <div class="row">
             <div class="col-md-12 pt-2">
               {{-- detail written by user --}}
               <p > @if(strlen($postList->description) > 200)  {{ substr(html_entity_decode(strip_tags($postList->description)),0,200) }}... @else  {{ substr(html_entity_decode(strip_tags($postList->description)),0,200) }} @endif </></p>
               {{-- <p>{{ $postList->dist }}</p> --}}
           </div><!----END OF COLUMN-------->
         </div><!----END OF ROW-------->
       
       
           <div class="row">
             <div class="col-md-2 pl-4 ">
               @if($postList->furnish==1)
                   <p><strong>{{'Furnished'}}</strong> </p>
                @else
                    <p><strong>{{'unFurnished'}}</strong> </p>
                @endif 
              
           </div><!----END OF COLUMN-------->
       
       
             <div class="col-md-2 ">
             {{-- 1 bed and 1 bath --}}
           </div><!----END OF COLUMN-------->
       
             <div class="col-md-8 pt-0 pb-2" style="text-align: right">
               {{-- <a href="{{route('signlePreview',$postList->id)}}" class="btn btn-success" >View Details</a> --}}
               <form action="{{route('signlePreview')}}" method="post">
                @csrf
                <input type="hidden" name="postId" value="{{$postList->id}}" >
              <button class="btn btn-success" type="submit"  >Vew Details</button>
            </form>

           </div><!----END OF COLUMN-------->
       
           </div><!-----END OF ROW-------->
       
       
       
       
       
         </div><!-----END OF COLUMN-------->
       </div><!-----END OF ROW-------->

     @endforeach

     <div class="row">
      <div class="col-md-12 mt-5 mb-5">
          <div class="float-right">{{$postListing->links("pagination::bootstrap-4")}}</div>
          <div id="showInfo"></div>
          <script>
              // alert(kk);
               var per_page = $('#perPg option:selected').val();
              var tot_recds =  {!! $postListing->total() !!}; 
              var tot_pages = Math.ceil(tot_recds/per_page);
              var curr_page = {!! $postListing->currentPage() !!};
              // alert(curr_page);
              // alert(tot_pages);


              $('#showInfo').html('Page ' + curr_page + ' of ' + tot_pages);





              //  alert(kk);
          </script>
          {{-- @php
          $totalPages =  ceil( $postListing->total() / 5);
          @endphp --}}

          



         {{-- <div>Page {{$postListing->currentPage()}} of {{$totalPages}} </div> --}}
     

      </div>
    </div>
   
     
     @endif

    

    

  
  

     <script>
       jQuery(document).ready(function() {
          jQuery("time.timeago").timeago();
        });

        </script>
        
