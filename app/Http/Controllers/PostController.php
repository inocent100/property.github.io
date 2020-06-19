<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Catagory;
use App\PostImage;
use App\PostVideo;
use App\propType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    public function index()
    {
        
        $posts = \App\Post::with(['catagories','user'])->paginate(10);
        // dd($posts);
        return view('dashboard.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();
        $propTypes = propType::all();
        // dd($countries);
        return view('dashboard.posts.create',compact('catagories','propTypes'));
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

        $userLogin = 1;

      

        // dd('adfadf');
        
        ////////////////  VALIDATION START HERE //////////////////////////
        // dd($request->input());

       

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'catagories' => 'bail|required|not_in:0',
            'noOfBeds' => 'bail|required|not_in:0',
            'noOfBaths' => 'bail|required|not_in:0',
            'furnish' => 'bail|required|not_in:0',
            'dateAvailable' => 'bail|required|date_format:d-m-Y',
            'propType' => 'bail|required|not_in:0',
            'postCode' => 'required',
            'email' => 'bail|required|email',
            // 'rent' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'sale' => 'regex:/^\d+(\.\d{1,2})?$/',
            'videos' => 'mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx|max:20480',
        ],[
           'dateAvailable.required'=>'Date is Required',
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
        foreach($request->images as $img){
            
            $data = $img;
            // $mm = base64_decode($data);
            
            $img = explode(',', $data);
            $ini =substr($img[0], 11);
            $extension = explode(';', $ini);
            
            $ext = $extension[0];
            $arr = array('jpeg','jpg','png');  
            
            if($data){
                if(!in_array($ext,$arr)){
                    session()->flash('imageError','Invalid Imges Extension Please Allow Only ( pjg, jpeg, png ) Formats');
                    return redirect()->route('posts.create');
                }
            }
        }
        ////////////////  VALIDATION ENDS //////////////////////////
        
    
    
    // dd('adsf');
    
    
    $post = new Post;
    $newDate =date("Y-m-d", strtotime($request->dataAvailable));
    $smokeAllow = $request->smokeAllow ? 1 : 0;

    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = 1;
    $post->rent = $request->rent;
    $post->sale = $request->sale;
    $post->dateAvailable = $newDate;
    $post->rentPeriod = $request->rentPeriod;
    $post->noOfBeds = $request->noOfBeds;
    $post->prop_types_id = $request->propType;
    $post->postCode = $request->postCode;
    $post->smokeAllow = $smokeAllow;
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
                    $resized_image = Image::make($data)->resize(150, 150, function($constraint){
                        $constraint->aspectRatio();

                    })->stream('png', 100);

                    $fileNamee = $k."-".date('YmdHis').random_int(1,10000000).'.png';

                    file_put_contents($dir.'/'.$fileNamee, $resized_image);
                   

                   
                  
                    
                  
                   

                    // file_put_contents($dir.'/post_'.$k.'.png', $data);
                   
                    // $imageData[]=['post_id'=>$post->id,'photo'=>'user_'.$userLogin.'/post_'.$post->id.'.png'];

                    PostImage::create([
                        'post_id' => $post->id,
                        'photo' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$fileNamee,
                        'filename' => $fileNamee
                    ]);

                    $k++;

                }
            }

            if ($video = $request->file('videos')) {
                // $name = $video->getClientOriginalName();
                // dd($name);
                $dir = public_path('postImages/user_'.$userLogin);
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }
                $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }
    
    
                $videotmp = date('YmdHis');
                $postVideo = $videotmp . "." .  $video->getClientOriginalExtension(); 
                $video->move($dir, $postVideo);

                PostVideo::create([
                    'post_id' => $post->id,
                    'video' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$postVideo,
                    'filename' => $postVideo
                ]);
    
    
            }

         
            
           

            // $ar = ['post_id'=>1,'photo'=>'hello/hjee'];
            // PostImage::insert($data);
            // $post_images = new PostImage;
            // $post_images->save($imageData);
            
            $post->catagories()->attach($request->catagories);

            session()->flash('status','Post has been Successfully Saved');
            return redirect()->route('posts.index');



        }


      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $catagories = Catagory::all();
        $propTypes = propType::all();

        $postImages = PostImage::where('post_id',$post->id)->get();
        $postVideos = PostVideo::where('post_id',$post->id)->first();

        return view('dashboard.posts.edit',compact('post','catagories','postImages','postVideos','propTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        //   if(session()->has('removeLink')){
        //     foreach(session()->get('removeLink') as $removeValue){
        // //         //  session()->get('removeLink')[0]
        //         // unlink($dir.'/'.$removeValue);
        //         // $postImage = PostImage::where('filename',$post->id);
        //         // $postImage->delete();
        //         echo $removeValue."<br>";
    
                
        //      }
        // }

       
        // dd('adsf');
         

        $userLogin = 1;
        
        ////////////////  VALIDATION START HERE //////////////////////////
        // dd($request->input());

       

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'catagories' => 'required|not_in:0',
            'noOfBeds' => 'required|not_in:0',
            'dataAvailable' => 'required',
            'propType' => 'required|not_in:0',
            'postCode' => 'required',
            'email' => 'required|email',
            // 'rent' => 'regex:/^\d+(\.\d{1,2})?$/',
            // 'sale' => 'regex:/^\d+(\.\d{1,2})?$/',
            'videos' => 'mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx|max:20480',
        ]);
        
     

        // VALIDATION of number of image files
        
        $k=1;
        foreach($request->images as $img){
            
            $data = $img;
            // $mm = base64_decode($data);

            if (base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data), true)){
            
                $img = explode(',', $data);
                $ini =substr($img[0], 11);
                $extension = explode(';', $ini);
                
                $ext = $extension[0];
                $arr = array('jpeg','jpg','png');  
            
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
    
    $newDate =date("Y-m-d", strtotime($request->dataAvailable));

    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = 1;
    $post->rent = $request->rent;
    $post->sale = $request->sale;
    $post->dateAvailable = $newDate;
    $post->rentPeriod = $request->rentPeriod;
    $post->noOfBeds = $request->noOfBeds;
    $post->prop_types_id = $request->propType;
    $post->postCode = $request->postCode;
    $post->email = $request->email;
    $post->phone = $request->phone;

    
         
        if($post->save()){

            if(session()->has('removeLink')){
                foreach(session()->get('removeLink') as $removeValue){
                    $postImage = PostImage::where('filename',$removeValue);
                    $postImage->delete();
           
                    
                 }
            }

            if(session()->has('removeVideo')){
                foreach(session()->get('removeVideo') as $removeVid){
                    $postVideo = PostVideo::where('filename',$removeVid);
                    $postVideo->delete();
           
                    
                 }
            }

          
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

                if(session()->has('removeVideo')){
                    foreach(session()->get('removeVideo') as $removeVid){

                        if(file_exists($dir.'/'.$removeVid)) {
                            unlink($dir.'/'.$removeVid);
                        }
                            
               
                        
                     }
                }
  

             }
            // dd($dir);
            // system("rm -rf ".escapeshellarg($dir));
         

            $k=1;

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
                    $resized_image = Image::make($data)->resize(150, 150, function($constraint){
                        $constraint->aspectRatio();

                    })->stream('png', 100);





                  
                    $fileNamee = $k."-".date('YmdHis').random_int(1,10000000).'.png';

                    file_put_contents($dir.'/'.$fileNamee, $resized_image);

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

            if ($video = $request->file('videos')) {
                // $name = $video->getClientOriginalName();
                // dd($video);
                $dir = public_path('postImages/user_'.$userLogin);
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }
                $dir = public_path('postImages/user_'.$userLogin.'/post_'.$post->id);
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }
    
    
                $videotmp =  date('YmdHis');
                $postVideo = $videotmp . "." .  $video->getClientOriginalExtension(); 
                $video->move($dir, $postVideo);

                PostVideo::create([
                    'post_id' => $post->id,
                    'video' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$postVideo,
                    'filename' => $postVideo
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
            
            $post->catagories()->sync($request->catagories);

            session()->flash('status','Post has been Successfully Saved');
            // dd('helo');
            return redirect()->route('posts.index');



        }
        

          
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    public function getAjaxData($id){

        // $postImage = Post::find($id)->first();
        // dd($post);
        // return  json_encode($postImage);
        return  'helo';

        
    }

//    //THIS IS FOR DROPZONE.JS
    public function storeData(Request $request)
	{
		try {
			$post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            $post_id = $post->id; // this give us the last inserted record id
		}
		catch (\Exception $e) {
			return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
		}
		return response()->json(['status'=>"success", 'post_id'=>$post_id]);
	}



// 	// We are submitting are image along with userid and with the help of user id we are updateing our record
	public function storeImage(Request $request)
	{
        // dd($request->input());
        $post = new Post;
     
        $post->title = $request->title;
        $post->user_id = 1;
        $post->save();    
        $k=1;
        foreach($request->input('files') as $img){
                
            $data = $img;
            
            // $immmmg  = $this->validateBase64Image($data);
            // $immmmg  = $this->check_base64_image($data);
            // dd($immmmg);
            if($data){
                // echo $data;
                
                $dir = public_path('postImages/user_1');
                // dd($dir);
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }
                $dir = public_path('postImages/user_1/post_1');
                if ( !is_dir($dir ) ) {
                    mkdir( $dir);       
                }

               // if (base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data), true)) {
                    // dd('valid');
                      // $resize_image = Image::make($data->path());
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
                // $resized_image = Image::make($data)->resize(300, 200)->stream('png', 100);
                $resized_image = Image::make($data)->resize(150, 150, function($constraint){
                    $constraint->aspectRatio();

                })->stream('png', 100);

                $fileNamee = $k."-".date('YmdHis').random_int(1,10000000).'.png';

                file_put_contents($dir.'/'.$fileNamee, $resized_image);
               

               
              
                
              
               

                // file_put_contents($dir.'/post_'.$k.'.png', $data);
               
                // $imageData[]=['post_id'=>$post->id,'photo'=>'user_'.$userLogin.'/post_'.$post->id.'.png'];

                // PostImage::create([
                //     'post_id' => $post->id,
                //     'photo' => 'user_'.$userLogin.'/post_'.$post->id.'/'.$fileNamee,
                //     'filename' => $fileNamee
                // ]);

                $k++;

            }
        }
        dd('finish');

       
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    
        $file = $request->file('file');
    
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
    
        $file->move($path, $name);
    
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
        dd('finish');
        // $file = base64_decode(request('file'));
        // dd($file);
		if($request->file('file')){
            // dd('asdf');

            $img = $request->file('file');

            //here we are geeting userid alogn with an image
            $postid = $request->postid;

            $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
            $user_image = new PostImage();
            $original_name = $img->getClientOriginalName();
            $user_image->photo = $imageName;
            $user_image->save();


            if(!is_dir(public_path() . '/uploads/images/')){
                mkdir(public_path() . '/uploads/images/', 0777, true);
            }

        $request->file('file')->move(public_path() . '/uploads/images/', $imageName);

        // we are updating our image column with the help of user id
        // $user_image->where('id', $postid)->update(['image'=>$imageName]);

        return response()->json(['status'=>"success",'imgdata'=>$original_name,'postid'=>$postid]);
        }
	}

public function delTree($dir)
{ 
    $files = array_diff(scandir($dir), array('.', '..')); 

    foreach ($files as $file) { 
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    }

    return rmdir($dir); 
} 


public function fileSessionUpdate($val){

    session()->push('removeLink', $val);
}

public function videoSessionUpdate($val){

    session()->push('removeVideo', $val);

    echo $val;

}
}
