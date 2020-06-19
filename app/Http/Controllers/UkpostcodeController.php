<?php

namespace App\Http\Controllers;

use App\Ukpostcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\TempPost;

use App\Catagory;
use App\PostImage;
use App\PostVideo;
use App\propType;


class UkpostcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $catagories = Catagory::all();
        $propTypes = propType::orderBy('name')->get();
        // dd('index');


        // $search = "RM8 2QB";

        // $postcode = Ukpostcode::where('postcode', $search)->first();
        // // dd($ukpostcode);

        // if(!$postcode){
        //     // dd('asdfasd');
        //     session()->flash('error','Invalid Location ! ');

        //     return redirect('prop_search');
        //     // return redirect()->route('posts.create');

        //     // return back()->with('error', 'Invalid Location ! ');

        // }
     
        // // $someVariable = Input::get("some_variable");
        // $lat = $postcode->latitude; // latitude of centre of bounding circle in degrees
        // $lon = $postcode->longitude; // 
        // // $lat = 51.563562323935000; // latitude of centre of bounding circle in degrees
        // // $lon = 0.103759299322415; // longitude of centre of bounding circle in degrees
        // $d = 0.5; // radius of bounding circle in kilometers

        // $searchResult =DB::select(" SELECT *, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat -abs(dest.Latitude)) * pi()/180 / 2),2) + COS($lat * pi()/180 ) * COS( abs(dest.Latitude) *  pi()/180) * POWER(SIN(($lon - dest.Longitude) *  pi()/180 / 2), 2) )) as distance FROM ukpostcodes dest having distance < $d ORDER BY distance ASC limit 1000");

        // //    $searchResult =DB::select("SELECT *, 3956 * 2 * ASIN(SQRT( POWER(SIN((51.559705459000300 -ABS(dest.latitude)) * PI()/180 / 2),2) + COS(51.559705459000300 * PI()/180 ) * COS( ABS(dest.Latitude) * PI()/180) * POWER(SIN((0.121182505177579 - dest.longitude) * PI()/180 / 2), 2) )) AS distance FROM ukpostcodes dest HAVING distance < 0.5 ORDER BY distance ASC");
    
    
        //     // dd($searchResult);
        //     $data = [];
          
        //     foreach($searchResult as $res){
        //         $data[]=array('postcode'=>$res->postcode,'latitude'=>$res->latitude,'longitude'=>$res->longitude,'distance'=>$res->distance);
             
        //     }
    
        
        // $postListing = Post::whereIn('postcode',$data)->orderBy('dist', 'Asc')->get();

        // // dd($postListing);

        // $query = DB::select(" DELETE FROM temp_posts");

        // $p=0;
        // //  title, description, rent, sale,furnish,updated_at
        // foreach($postListing as $pp){
                 
            
        //     foreach($data as $dd){
        //         // echo $dd['postcode']." = ". $dd['latitude']." = ". $dd['longitude'] ." = ". $dd['distance'] . "<br>";
        //         if($dd['postcode']==$pp->postCode){

        //             if($pp->rent==null) { $rent =0;  }else{ $rent = $pp->rent; }
        //             if($pp->sale==null) { $sale =0; }else{ $sale = $pp->sale; }
        //             //  DB::table('posts')->where('postcode', strtoupper($pp->postCode))->update(['lat' => $dd['latitude'],'lon'=> $dd['longitude'],'dist'=>$dd['distance']]);

        //            // DB::select("INSERT INTO temp_posts (id,user_id,title,description,rent,sale,furnish,updated_at) VALUES ({$postListing[$p]['id']},{$postListing[$p]['user_id']},'{$postListing[$p]['title']}','{$postListing[$p]['description']}',{$rent},{$sale},{$postListing[$p]['furnish']},'{$postListing[$p]['updated_at']}')");

        //             DB::INSERT("INSERT INTO temp_posts (id,user_id,title,description,rent,sale,furnish,postcode,updated_at,dist) VALUES ({$pp->id},{$pp->user_id},'{$pp->title}','{$pp->description}',{$rent},{$sale},'{$pp->furnish}','{$pp->postCode}','{$pp->updated_at}',{$dd['distance']})");
                    
        //             // $postListing[$p]['distance']=$dd['distance'];
                    
                    
        //         }
              
        //     }
        //     $p++;
  
        // }


        // // $p = TempPost::find(26);
        // // dd($p->postImagess);
        // // dd('sdfsf');
      
        // //   $postListing = DB::table("temp_posts")->orderBy('dist','Asc')->paginate(3);
        //   $postListing = TempPost::orderBy('dist','Asc')->paginate(3);
        // //   dd($postListing);
        
        
          $current='search';
          $postListing="";

        //   return view('clients.prop_search',compact('result','current'));
          return view('clients.prop_search',compact('current','postListing','propTypes','catagories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ukpostcode  $ukpostcode
     * @return \Illuminate\Http\Response
     */
    public function show(Ukpostcode $ukpostcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ukpostcode  $ukpostcode
     * @return \Illuminate\Http\Response
     */
    public function edit(Ukpostcode $ukpostcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ukpostcode  $ukpostcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ukpostcode $ukpostcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ukpostcode  $ukpostcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ukpostcode $ukpostcode)
    {
        //
    }

    public function verifyPostcode($search=null){
        $search = trim($search);
        // echo $search;
        // return;
       

        // $catagories = Catagory::all();
         $propTypes = propType::orderBy('name')->get();
 
 
         $postcode = Ukpostcode::where('postcode', $search)->first();
         // dd($ukpostcode);
 
         if(!$postcode){
             // dd('asdfasd');
           
             echo "no";
             // return redirect()->route('posts.create');
 
             // return back()->with('error', 'Invalid Location ! ');
 
         }else{
             echo "ok";
         }
      
    }

    public function searchProp(Ukpostcode $ukpostcode,Request $request)
    {

        // dd($request->input());
        $search = trim($request->search);
       

       // $catagories = Catagory::all();
        $propTypes = propType::orderBy('name')->get();


        $postcode = Ukpostcode::where('postcode', $search)->first();
        // dd($ukpostcode);

        if(!$postcode){
            // dd('asdfasd');
            session()->flash('error','Invalid Location ! ');

            return redirect('prop_search');
            // return redirect()->route('posts.create');

            // return back()->with('error', 'Invalid Location ! ');

        }
     
    

        // $search = trim($request->search);

        // $postcode = Ukpostcode::where('postcode',$search)->first();
        // dd($postcode);
       
        $lat = $postcode->latitude; // latitude of centre of bounding circle in degrees
        $lon = $postcode->longitude; // longitude of centre of bounding circle in degrees
        $d = $request->distance; 

        // dd($d);

    //    echo $lat."<br>";
    //    echo $lon."<br>";
    //    echo $d."<br>";

       
        $searchResult =DB::select(" SELECT *, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat -abs(dest.Latitude)) * pi()/180 / 2),2) + COS($lat * pi()/180 ) * COS( abs(dest.Latitude) *  pi()/180) * POWER(SIN(($lon - dest.Longitude) *  pi()/180 / 2), 2) )) as distance FROM ukpostcodes dest having distance < $d ORDER BY distance ASC LIMIT 500");

    //    $searchResult =DB::select("SELECT *, 3956 * 2 * ASIN(SQRT( POWER(SIN((51.559705459000300 -ABS(dest.latitude)) * PI()/180 / 2),2) + COS(51.559705459000300 * PI()/180 ) * COS( ABS(dest.Latitude) * PI()/180) * POWER(SIN((0.121182505177579 - dest.longitude) * PI()/180 / 2), 2) )) AS distance FROM ukpostcodes dest HAVING distance < 0.5 ORDER BY distance ASC");


        // dd($searchResult);
        $data = [];
      
        foreach($searchResult as $res){
            $data[]=array('postcode'=>$res->postcode,'latitude'=>$res->latitude,'longitude'=>$res->longitude,'distance'=>$res->distance);
         
        }

      
        
       
  
        $postListing = Post::whereIn('postcode',$data)->orderBy('dist', 'Asc')->get();
        $postListing = $postListing->where('catagory','=',$request->catagory);


        if($request->propType){
            $postListing = $postListing->where('prop_types_id','=',$request->propType);

        }
       

        // dd($postListing);

        $query = DB::select(" DELETE FROM temp_posts");

        //FINDING POSTCODES FORM ADS POST
        // $postListing->withPath('searchProp');
        
        // $postListing = \App\Post::select('*')->orderBy('dist', 'Asc')->paginate(10);
        
        $p=0;
        foreach($postListing as $pp){

            foreach($pp->catagories as $cat){
                $catt = $cat->title;
            }

            // dd($catt);
               
            
            foreach($data as $dd){
                // echo $dd['postcode']." = ". $dd['latitude']." = ". $dd['longitude'] ." = ". $dd['distance'] . "<br>";
                if($dd['postcode']==$pp->postCode){

                    // echo $pp->propType->name."<br>";


                    if($pp->rent==null) { $rent =0;  }else{ $rent = $pp->rent; }
                    if($pp->sale==null) { $sale =0; }else{ $sale = $pp->sale; }
                    //  DB::table('posts')->where('postcode', strtoupper($pp->postCode))->update(['lat' => $dd['latitude'],'lon'=> $dd['longitude'],'dist'=>$dd['distance']]);

                   // DB::select("INSERT INTO temp_posts (id,user_id,title,description,rent,sale,furnish,updated_at) VALUES ({$postListing[$p]['id']},{$postListing[$p]['user_id']},'{$postListing[$p]['title']}','{$postListing[$p]['description']}',{$rent},{$sale},{$postListing[$p]['furnish']},'{$postListing[$p]['updated_at']}')");
                
                    DB::INSERT("INSERT INTO temp_posts (id,user_id,title,description,rent,sale,furnish,postcode,updated_at,dist,prop_type,catagory) VALUES ({$pp->id},{$pp->user_id},'{$pp->title}','{$pp->description}',{$rent},{$sale},'{$pp->furnish}','{$pp->postCode}','{$pp->updated_at}',{$dd['distance']},'{$pp->propType->name}','{$pp->catagory}')");
                    
                    // $postListing[$p]['distance']=$dd['distance'];
                    
                    
                }
              
            }
            $p++;
  
        }
        // dd('asdfsadf');
        
     //   $postListing = TempPost::orderBy('dist','Asc')->paginate(5);

   
    //  $prop_type = $request->propType;
     $catagory = $request->catagory;

    //  dd($request->propType);
    //  prop_types_id

            // dd($catagory); 
            $postListing = TempPost::orderBy('dist','Asc');

    if($catagory=="rent"){
         $postListing = $postListing->reorder('rent','Asc');
        //  dd($postListing);
    }else{
        $postListing = $postListing->reorder('sale','Asc');

    }
    
    
    if($request->min && $request->max){
        // This will only execute if you received any price
        // Make you you validated the min and max price properly
        if($catagory=="rent"){
                    $postListing = $postListing->where('rent','>=',$request->min);
                    $postListing = $postListing->where('rent','<=',$request->max);
                }else{
                    $postListing = $postListing->where('sale','>=',$request->min);
                    $postListing = $postListing->where('sale','<=',$request->max);

                }
            }
            $postListing = $postListing->paginate(5);


        

  
        $current='search';
        $search = $request->search;
        $distance = $request->distance;
        // dd($postListing);


        return view('clients.prop_search',compact('current','search','distance','postListing','propTypes'));


    }

    
    // public function searcharray($value, $key, $array) {
    //     foreach ($array as $k => $val) {
    //         if ($val[$key] == $value) {
    //             return $k;
    //         }
    //     }
    //     return 'null';
    //  }

     
    public function searcharray($value, $array) {

            foreach($array as  $postList){
                // echo $postList->postCode."<br>";

                if($value==$postList->postCode){
                    // echo "yes";
                    return 'yes';
                    // if(in_array($value,$dataList))
                    // $dataList[]=[$value];

                }
            }
            return null;
        }

    // This ajax request for using map
    public function ajaxReq($search = null,$distance = null){
          
            $search = trim($search);

            $postcode = Ukpostcode::where('postcode',$search)->first();
            // dd($postcode);
            // echo $postcode;
            // return;
    
            // $lat = 51.563562323935000; // latitude of centre of bounding circle in degrees
            // $lon = 0.103759299322415; // longitude of centre of bounding circle in degrees
            $lat = $postcode->latitude; // latitude of centre of bounding circle in degrees
            $lon = $postcode->longitude; // longitude of centre of bounding circle in degrees
            $d = $distance; 


    
        
    
           
            $searchResult =DB::select(" SELECT *, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat -abs(dest.Latitude)) * pi()/180 / 2),2) + COS($lat * pi()/180 ) * COS( abs(dest.Latitude) *  pi()/180) * POWER(SIN(($lon - dest.Longitude) *  pi()/180 / 2), 2) )) as distance FROM ukpostcodes dest having distance < $d ORDER BY distance ASC limit 500");
    
            $data = [];
          
            foreach($searchResult as $res){
                $data[]=array('postcode'=>$res->postcode,'latitude'=>$res->latitude,'longitude'=>$res->longitude);
             
            }
    
       
    
            //FINDING POSTCODES FORM ADS POST
            $postListing = Post::whereIn('postcode',$data)->get();
    
            // dd($postListing);
    
            //THEN AGAIN FINIALIZE SHORT LIST SELECTED FROM SEARCH RESULTE
            $dataList=[];
            $i=0;
            foreach($data as $dd){
                foreach($dd as $key=>$value){
                    if($key=='latitude'){
                        $lat = $value;
                    }
                    if($key=='longitude'){
                        $lon = $value;
                    }
                    if($key=='postcode'){
                        // echo "postcode yeh hei = " . $value;
    
                        // $key = array_search('RM8 2QB', array_column($postListing, 'postcode','id'));
                        $results = $this->searcharray($value, $postListing);
                        // echo $results."<br>";
                        if($results=='yes'){
    
                            $dataList[]=[$value,$lat,$lon];
                        }
    
                        
    
                     }
    
                }
            }

            if(!$dataList){
                $dataList[]=[$search,$lat,$lon];
            }
            
            echo json_encode($dataList);

        
         

        }


    public function getPostcodeList($search=null){

            // $search = '%'.$search.'%';
            // echo $search;
            // return;
            // // return;
            $search= trim($search);

            $ukpostcode = Ukpostcode::where('postcode', 'like','%'.$search.'%' )->take(10)->get();
            // dd($ukpostcode);
            //   return;
           
            $response=[];
            foreach($ukpostcode as $p){
                $response[]=array('label'=>$p['postcode'],'id'=>$p['id']);
    
            }


            // echo json_encode("hello");
            if($response){
              echo json_encode($response);
            //    echo $response;
               return;
            }else{
                // echo "No";
                echo json_encode("No Record Found");
             }
            //  }




        }

    // public function getPostcodeListt($search=null){

    //         // echo $search;
    //         // return;
    //         // // return;

    //         // echo 'hello';
    //         // return "asdfsadf";

    //          $search= trim($search);

    //         $ukpostcode = Ukpostcode::where('postcode', 'like','%'.$search.'%' )->take(10)->get();
    //         // // dd($ukpostcode);
    //         // //   return;
           
    //         $response=[];
    //         foreach($ukpostcode as $p){
    //             $response[]=array('label'=>$p['postcode'],'id'=>$p['id']);
    
    //         }


    //         // // echo json_encode("hello");
    //         if($response){
    //           echo json_encode($response);
    //         //    echo $response;
    //            return;
    //         }else{
    //             // echo "No";
    //             echo json_encode("No Record Found");
    //          }
    //         //  }
    //     }



        function get_ajax_data(Request $request)
        {
         
         if($request->ajax())
         {
        
        
    
    
            // return view('clients.prop_search',compact('current','search','distance','postListing'))->render();
        // echo "asdfasdf";
        // return;
        //   $postListing = TempPost::paginate(3);
        //   $postListing = DB::table("temp_posts")->orderBy('dist','Asc')->paginate(3);
        $perPage = $request->perPage;
        $orderBy = $request->orderBy;

      

        if($orderBy=="priceLow"){
            $orderBy = "rent";
            $sort = "Asc";
        }elseif($orderBy=="priceHigh"){
            $orderBy = "rent";
            $sort = "Desc";
        }elseif($orderBy=="date"){

            $orderBy = "updated_at";
            $sort = "Desc";
        }elseif($orderBy=="distance"){

            $orderBy = "dist";
            $sort = "Asc";


        }
        // echo "oder = ".$orderBy."<br>";
        //  echo "sort".$sort."<br>";
        //  echo "page".$perPage."<br>";
        // return;
          $postListing = TempPost::orderBy($orderBy,$sort)->paginate($perPage);


        //   print_r($postListing);
        //   return;
          return view('clients.pagination', compact('postListing'))->render();
         }
    }

    public function signlePreview(Request $request){

        $id = $request->postId;
        // dd($request->input());
        $post = Post::find($id);
        $current = 'singlePreview';
        return view('clients.singlePreview',compact('current','post'));
    }





}
