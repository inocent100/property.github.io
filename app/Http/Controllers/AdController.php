<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Catagory;
use App\PostImage;
use App\PostVideo;
use App\propType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('ClientUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = \App\Post::with(['catagories','user'])->orderByRaw('(updated_at - created_at) desc')->paginate(10);
      //  $posts = \App\Post::with(['user'])->select('*',DB::raw(' `updated_at` - `created_at` AS  ABDiff'))->orderBy('ABDiff', 'desc')->paginate(10);
        // $posts = \App\Post::with(['user'])->select('*',DB::raw(' `updated_at` - `created_at` AS  ABDiff'))->orderBy('ABDiff', 'desc')->paginate(10);
        $posts = \App\Post::with(['user'])->select('*')->orderBy('updated_at', 'desc')->paginate(10);

        $current = 'userPost';
        // dd($posts);
        return view('clients.posts.index',compact('posts','current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $catagories = Catagory::all();
        $propTypes = propType::all();
        $current = 'userPost';
        // dd($countries);
        return view('clients.posts.create',compact('propTypes','current'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());

        // $newDate =date("Y-m-d", strtotime($request->dateAvailable));
        // dd($newDate);


       
        $userLogin = Auth::user()->id;

      

        // dd('adfadf');
        
        ////////////////  VALIDATION START HERE //////////////////////////
        // dd($request->input());

       

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'catagory' => 'bail|required|not_in:0',
            'noOfBeds' => 'bail|required|not_in:0',
            'noOfBaths' => 'bail|required|not_in:0',
            'furnish' => 'bail|required|not_in:0',
            'dateAvailable' => 'bail|required|date_format:d-m-Y',
            'propType' => 'bail|required|not_in:0',
            // 'minTanLength'=>'bail|required',
            'postCode' => 'required',
            'email' => 'bail|required|email',
            // 'rent' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'sale' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'videos' => 'mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx|max:20480',
        ],[
           'dateAvailable.required'=>'Date is Required',
           'dateAvailable.date_format'=>'Date Format should be in this Format dd-mm-yyyy',
           'noOfBeds.required'=>'Beds is Required',
           'noOfBeds.not_in'=>'Beds is Required',
           'noOfBaths.required'=>'Bath is Required',
           'noOfBaths.not_in'=>'Bath is Required',
           'furnish.required'=>'Furnish Required',
           'furnish.not_in'=>'Furnish Required',
           'postCode.required'=>'Post Code Required',
           'propType.required'=>'Property Required',
           'propType.not_in'=>'Property Required',
        ]);
        
     

        // VALIDATION of number of image files
        
        $k=1;
        if($request->images){
        foreach($request->images as $img){
            
            $data = $img;
            // $mm = base64_decode($data);
            
            $img = explode(',', $data);
            $ini =substr($img[0], 11);
            $extension = explode(';', $ini);
            
            $ext = $extension[0];
            $arr = array('jpeg','jpg','png','svg');  
            
            if($data){
                if(!in_array($ext,$arr)){
                    session()->flash('imageError','Invalid Imges Extension Please Allow Only ( pjg, jpeg, png ) Formats');
                    return redirect()->route('posts.create');
                }
            }
        }
    }
        ////////////////  VALIDATION ENDS //////////////////////////
        
    
    
    // dd('adsf');
    
    
    $post = new Post;
    $newDate =date("Y-m-d", strtotime($request->dateAvailable));
    $driveWay = $request->driveWay ? 1 : 0;
    $studentAllow = $request->studentAllow ? 1 : 0;
    $familiesAllow = $request->familiesAllow ? 1 : 0;
    $dss = $request->dss ? 1 : 0;
    $pets = $request->pets ? 1 : 0;
    $smokeAllow = $request->smokeAllow ? 1 : 0;
    $billsInclude = $request->billsInclude ? 1 : 0;
    $parking = $request->parking ? 1 : 0;
    $gardenAccess = $request->gardenAccess ? 1 : 0;
    // if($request->has('smokeAllow')){
    //     $smokeAllow=1;


    // }
    $post->catagory = $request->catagory;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = $userLogin;
    $post->rent = $request->rent;
    $post->sale = $request->sale;
    $post->dateAvailable = $newDate;
    $post->rentPeriod = $request->rentPeriod;
    $post->noOfBeds = $request->noOfBeds;
    $post->noOfBaths = $request->noOfBaths;
    $post->furnish = $request->furnish;
    $post->prop_types_id = $request->propType;
    $post->postCode = $request->postCode;
    $post->driveWay = $driveWay;
    $post->studentAllow = $studentAllow;
    $post->familiesAllow = $familiesAllow;
    $post->dss = $dss;
    $post->pets = $pets;
    $post->smokeAllow = $smokeAllow;
    $post->billsInclude = $billsInclude;
    $post->parking = $parking;
    $post->gardenAccess = $gardenAccess;
    $post->minTanLength = $request->minTanLength;
    $post->depositAmount = $request->depositAmount;
    $post->email = $request->email;
    $post->phone = $request->phone;

    
    // $post = Post::latest()->first(); //getting the last record
    
    // if($post){
        
        //     $post->catagories()->attach($request->catagories);
        
        //     return redirect()->route('posts.index');
        // }
        
        
        
        if($post->save()){
            
            $post = Post::latest()->first();

            $k=1;
        //    print_r($request->images);
        //     dd($request->input());
        if($request->images){
            foreach($request->images as $img){
                
                $data = $img;
              
                // $immmmg  = $this->validateBase64Image($data);
                // $immmmg  = $this->check_base64_image($data);
                // dd($immmmg);
                if($data){

                    $dir = public_path('postImages/user_'.$userLogin);
                    // dd($dir);
                    if ( !is_dir($dir ) ) {
                        mkdir( $dir);       
                    }
                    $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);
                    if ( !is_dir($dir ) ) {
                        mkdir( $dir);       
                    }

                   // if (base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data), true)) {
                        // dd('valid');
                          // $resize_image = Image::make($data->path());
                          $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
                          // $resized_image = Image::make($data)->resize(300, 200)->stream('png', 100);
      
                          //FOR RESIZING THE IMAGE
                          // $resized_image = Image::make($data)->resize(150, 150, function($constraint){
                          //     $constraint->aspectRatio();
      
                          // })->stream('png', 100);
      
      
      
      
      
                        
                          $fileNamee = $k."-".date('YmdHis').random_int(1,10000000).'.png';
      
                          // file_put_contents($dir.'/'.$fileNamee, $resized_image);
                          file_put_contents($dir.'/'.$fileNamee, $data);
      
                          PostImage::create([
                              'post_id' => $post->id,
                              'photo' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$fileNamee,
                              'filename' => $fileNamee
                          ]);

                    $k++;

                }
            }
        }

            if ($video = $request->videos) {
                // $name = $video->getClientOriginalName();
                // dd($name);
                // $dir = public_path('postImages/user_'.$userLogin);
                // if ( !is_dir($dir ) ) {
                //     mkdir( $dir);       
                // }
                // $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);
                // if ( !is_dir($dir ) ) {
                //     mkdir( $dir);       
                // }
    
    
                // $videotmp = date('YmdHis');
                // $postVideo = $videotmp . "." .  $video->getClientOriginalExtension(); 
                // $video->move($dir, $postVideo);

                PostVideo::create([
                    'post_id' => $post->id,
                    'video' => $video,
                    'filename' => ''
                ]);
    
    
            }

         
            
           

            // $ar = ['post_id'=>1,'photo'=>'hello/hjee'];
            // PostImage::insert($data);
            // $post_images = new PostImage;
            // $post_images->save($imageData);
            
            // $post->catagories()->attach($request->catagories);

            session()->flash('status','Post has been Successfully Saved');
            return redirect()->route('adListing.index');



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($post->id);
        $post = Post::find($id);
        // $catagories = Catagory::all();
        $propTypes = propType::all();

        $postImages = PostImage::where('post_id',$post->id)->get();
        $postVideos = PostVideo::where('post_id',$post->id)->first();
        $current = 'userPost';

        return view('clients.posts.edit',compact('post','postImages','postVideos','propTypes','current'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\H
     * ttp\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->sale);
        // dd($request->input());
        //    if(session()->has('removeLink')){
        //     foreach(session()->get('removeLink') as $removeValue){
        // //         //  session()->get('removeLink')[0]
        //         // unlink($dir.'/'.$removeValue);
        //         // $postImage = PostImage::where('filename',$post->id);
        //         // $postImage->delete();
        //         echo $removeValue."<br>";
    
                
        //      }
        // }

       
        // dd('adsf');
         
        $post = Post::find($id);
        $userLogin = Auth::user()->id;
        
        ////////////////  VALIDATION START HERE //////////////////////////

       

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'catagory' => 'bail|required|not_in:',
            'noOfBeds' => 'bail|required|not_in:0',
            'noOfBaths' => 'bail|required|not_in:0',
            'furnish' => 'bail|required|not_in:0',
            'dateAvailable' => 'bail|required|date_format:d-m-Y',
            'propType' => 'bail|required|not_in:0',
            // 'minTanLength'=>'bail|required',
            'postCode' => 'required',
            'email' => 'bail|required|email',
            // 'rent' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'sale' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'videos' => 'mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx|max:20480',
        ],[
           'dateAvailable.required'=>'Date is Required',
           'dateAvailable.date_format'=>'Date Format should be in this Format dd-mm-yyyy',
           'noOfBeds.required'=>'Beds is Required',
           'noOfBeds.not_in'=>'Beds is Required',
           'noOfBaths.required'=>'Bath is Required',
           'noOfBaths.not_in'=>'Bath is Required',
           'furnish.required'=>'Furnish Required',
           'furnish.not_in'=>'Furnish Required',
           'postCode.required'=>'Post Code Required',
           'propType.required'=>'Property Required',
           'propType.not_in'=>'Property Required',
        ]);
        
     

        
     

        // VALIDATION of number of image files
        
        $k=1;
        if($request->images){
        foreach($request->images as $img){
            
            $data = $img;
            // $mm = base64_decode($data);

            if (base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data), true)){
            
                $img = explode(',', $data);
                $ini =substr($img[0], 11);
                $extension = explode(';', $ini);
                
                $ext = $extension[0];
                $arr = array('jpeg','jpg','png','svg');  
            
                if($data){
                    if(!in_array($ext,$arr)){
                        session()->flash('imageError','Invalid Imges Extension Please Allow Only ( pjg, jpeg, png, svg ) Formats');
                        return redirect()->route('posts.create');
                    }
                }
            }
        }
        }
        ////////////////  VALIDATION ENDS //////////////////////////
        
    
    
    // dd('adsf');
    
    $newDate =date("Y-m-d", strtotime($request->dateAvailable));
    $driveWay = $request->driveWay ? 1 : 0;
    $studentAllow = $request->studentAllow ? 1 : 0;
    $familiesAllow = $request->familiesAllow ? 1 : 0;
    $dss = $request->dss ? 1 : 0;
    $pets = $request->pets ? 1 : 0;
    $smokeAllow = $request->smokeAllow ? 1 : 0;
    $billsInclude = $request->billsInclude ? 1 : 0;
    $parking = $request->parking ? 1 : 0;
    $gardenAccess = $request->gardenAccess ? 1 : 0;

    $post->catagory = $request->catagory;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = $userLogin;
    $post->rent = $request->rent;
    $post->sale = $request->sale;
    $post->dateAvailable = $newDate;
    $post->rentPeriod = $request->rentPeriod;
    $post->noOfBeds = $request->noOfBeds;
    $post->noOfBaths = $request->noOfBaths;
    $post->furnish = $request->furnish;
    $post->prop_types_id = $request->propType;
    $post->postCode = $request->postCode;
    $post->driveWay = $driveWay;
    $post->studentAllow = $studentAllow;
    $post->familiesAllow = $familiesAllow;
    $post->dss = $dss;
    $post->pets = $pets;
    $post->smokeAllow = $smokeAllow;
    $post->billsInclude = $billsInclude;
    $post->parking = $parking;
    $post->gardenAccess = $gardenAccess;
    $post->minTanLength = $request->minTanLength;
    $post->depositAmount = $request->depositAmount;
    $post->email = $request->email;
    $post->phone = $request->phone;
    // $post->lat = $request->lat;
    // $post->lon = $request->lon;
    // $post->distance = $request->distance;

    
         
        if($post->save()){

            $postVideo = PostVideo::where('post_id',$post->id);
            $postVideo->delete();

            if(session()->has('removeLink')){
                foreach(session()->get('removeLink') as $removeValue){
                    $postImage = PostImage::where('filename',$removeValue);
                    $postImage->delete();
           
                    
                 }
            }

            // if(session()->has('removeVideo')){
            //     foreach(session()->get('removeVideo') as $removeVid){
            //         $postVideo = PostVideo::where('post_id',$removeVid);
            //         $postVideo->delete();
           
                    
            //      }
            // }

          
            $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);

            if (is_dir($dir ) ) {
                // mkdir( $dir);       
                // $this->delTree($dir); //for directory remove
                // array_map( 'unlink', array_filter((array) glob($dir.'/*') ) ); //for files remove
                if(session()->has('removeLink')){
                    foreach(session()->get('removeLink') as $removeValue){
                //         //  session()->get('removeLink')[0]

                            if(file_exists($dir.'/'.$removeValue)) {
                                unlink($dir.'/'.$removeValue);
                            }
                                
                    
                        
                     }
                }

                // if(session()->has('removeVideo')){
                //     foreach(session()->get('removeVideo') as $removeVid){

                //         if(file_exists($dir.'/'.$removeVid)) {
                //             unlink($dir.'/'.$removeVid);
                //         }
                            
               
                        
                //      }
                // }
  

             }
            // dd($dir);
            // system("rm -rf ".escapeshellarg($dir));
         

            $k=1;
            
            if($request->images){
            foreach($request->images as $img){
                
                $data = $img;

                // Storage::delete('profiles/'.$user->profile->photo);

              
            //    echo $k."<br>";
                if($data){

                    $dir = public_path('postImages/user_'.$userLogin);
                    // dd($dir);
                  

                    if ( !is_dir($dir ) ) {
                        mkdir( $dir);       
                    }
                    $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);

                    // array_map('unlink', glob("$dir/*.*"));
                    // rmdir($dir);
                    // $this->rrmdir($dir);
                   
                    // dd('asdfadsf');

                    if ( !is_dir($dir ) ) {
                        mkdir( $dir);       
                    }

                    if (base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data), true)) {
                        // dd('valid');
                          // $resize_image = Image::make($data->path());
                    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
                    // $resized_image = Image::make($data)->resize(300, 200)->stream('png', 100);

                    //FOR RESIZING THE IMAGE
                    // $resized_image = Image::make($data)->resize(150, 150, function($constraint){
                    //     $constraint->aspectRatio();

                    // })->stream('png', 100);





                  
                    $fileNamee = $k."-".date('YmdHis').random_int(1,10000000).'.png';

                    // file_put_contents($dir.'/'.$fileNamee, $resized_image);
                    file_put_contents($dir.'/'.$fileNamee, $data);

                    PostImage::create([
                        'post_id' => $post->id,
                        'photo' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$fileNamee,
                        'filename' => $fileNamee
                    ]);

                    }
                    // file_put_contents($dir.'/'.$fileNamee, $resized_image);
                   

                    // } else {

                    // //     file_put_contents("file.png",file_get_contents("data://".$var_containing_the_data_uri));


                    //      move_uploaded_file($dir.'/post_'.$k.'.png', $img);
                       
                    // }

                  
                  
                    
                  
                    // dd($resized_image);

                    // file_put_contents($dir.'/post_'.$k.'.png', $data);
                   
                    // $imageData[]=['post_id'=>$post->id,'photo'=>'user_'.$userLogin.'/post_'.$post->id.'.png'];

                  

                    $k++;

                }
            }
        }////// END OF IF NEW IMAGES 

            if ($video = $request->videos) {
                // $name = $video->getClientOriginalName();
                // dd($video);
                // $dir = public_path('postImages/user_'.$userLogin);
                // if ( !is_dir($dir ) ) {
                //     mkdir( $dir);       
                // }
                // $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);
                // if ( !is_dir($dir ) ) {
                //     mkdir( $dir);       
                // }
    
    
                // $videotmp =  date('YmdHis');
                // $postVideo = $videotmp . "." .  $video->getClientOriginalExtension(); 
                // $video->move($dir, $postVideo);

                PostVideo::create([
                    'post_id' => $post->id,
                    'video' => $video,
                    // 'filename' => $postVideo
                    'filename' => ''
                ]);
    
    
            }

         
            
            // dd($request->catagories);
            
            // dd( $imageData);

            // $post->catagories()->attach($request->catagories);

            // dd($request->catagories);

            // $ar = ['post_id'=>1,'photo'=>'hello/hjee'];
            // PostImage::insert($data);
            // $post_images = new PostImage;
            // $post_images->save($imageData);
            
            // $post->catagories()->sync($request->catagories);

            session()->flash('status','Post has been Successfully Saved');
            // dd('helo');
            return redirect()->route('adListing.index');



        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fileSessionUpdate($val){

        session()->push('removeLink', $val);
        // echo $val;


    }
    
    // public function videoSessionUpdate($val){
    
    //     session()->push('removeVideo', $val);
    
    //     // echo $val;
    
    // }
    
    public function preview(Request $request){

        // dd($request->input());

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'catagories' => 'bail|required|not_in:0',
            'noOfBeds' => 'bail|required|not_in:0',
            'noOfBaths' => 'bail|required|not_in:0',
            'furnish' => 'bail|required|not_in:0',
            'dateAvailable' => 'bail|required|date_format:d-m-Y',
            'propType' => 'bail|required|not_in:0',
            // 'minTanLength'=>'bail|required',
            'postCode' => 'required',
            'email' => 'bail|required|email',
            // 'rent' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'sale' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'videos' => 'mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx|max:20480',
        ],[
           'dateAvailable.required'=>'Date is Required',
           'dateAvailable.date_format'=>'Date Format should be in this Format dd-mm-yyyy',
           'noOfBeds.required'=>'Beds is Required',
           'noOfBeds.not_in'=>'Beds is Required',
           'noOfBaths.required'=>'Bath is Required',
           'noOfBaths.not_in'=>'Bath is Required',
           'furnish.required'=>'Furnish Required',
           'furnish.not_in'=>'Furnish Required',
           'postCode.required'=>'Post Code Required',
           'propType.required'=>'Property Required',
           'propType.not_in'=>'Property Required',
        ]);
      

        // dd($request->input());

        // $posts = \App\Post::with(['catagories','user'])->select('*',DB::raw(' `updated_at` - `created_at` AS  ABDiff'))->orderBy('ABDiff', 'desc')->paginate(10);
        $request->description = htmlentities( $request->description, ENT_NOQUOTES, 'UTF-8');

        // $catagories = Catagory::find($request->catagories);

        // $cat_name = $catagories->title;

        // $cat_id = $request->catagories;
        $propType = propType::find($request->propType);
        $propType_name = $propType->name;

        // $propTypes_id = $request->propType;
        $current = '';
        // // dd($posts);
        return view('clients.posts.preview',compact('request','current','propType','propType_name'));

    }

    public function adsList(){

       // $posts = \App\Post::with(['user'])->select('*',DB::raw(' `updated_at` - `created_at` AS  ABDiff'))->orderBy('ABDiff', 'desc')->paginate(10);
        $posts = \App\Post::with(['user'])->select('*')->orderBy('updated_at', 'desc')->paginate(10);
        $current = 'userPost';
        // dd($posts);
        return view('clients.posts.index',compact('posts','current'));
    }






}
