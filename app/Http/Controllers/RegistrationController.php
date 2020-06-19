<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Auth;


class RegistrationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.register',['current'=>'userregister']);
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

        // dd($request->input());

        $request->validate([
            'first_name' => 'required',
            'address1' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'email' => 'bail|required|unique:users',
            'password' => 'bail|required|confirmed|min:3',
            // 'roles'=>'required',
            // 'photo' => 'mimetypes:video/avi,video/mpeg,video/quicktime,jpeg,bmp,png',

            // 'photo' => 'mimes:mp4,jpeg,bmp,png|max:2000',
        ],[
            'first_name.required'=>'Please Enter the Name',
            'address1.required'=>'Please Enter the Address',
            'post_code.required'=>'Please Enter the Post Code',
            'city.required'=>'Please Enter the City',
            'email.required'=>'Please Enter the Email Address',

        ]);

        // dd('asdfasd');

       


     

        // $validator = $this->user_registration_rules($request);   
        // if($validator->fails())
        // {
        // return redirect()->back()->withErrors($validator)->withInput();
        // }

        // if($request->hasFile('photo')){
        //     echo "mili";
        // }else{
        //     echo "no";
        // }

        // dd($request->input());

        
        
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){

            $user = User::latest()->first();
 
            $filename = sprintf('profile_'.$user->id.'.jpg');

            if($request->hasFile('photo')){ //check if file exist
                // dd('asdf');
                $filename = $request->file('photo')->storeAs('profiles',$filename,'public');
                // dd(public_path());
                // $file = $request->file('photo');
                // $filename = 'profiles/'.'profile_'.$user->id.'_'.time().'.'.$file->extension();
                // $file->move(public_path().'/Storage/profiles/', $filename);  
                // dd($filename);
                    // $request->file('thumbnail')->storeAs('images',$filename,'public');
                    // dd("dfd");
                }else{
                    $filename = "profile/dummy.jpg";
                }

                $profile = new UserProfile;

                $profile->user_id = $user->id;
                $profile->address1 = $request->address1;
                $profile->address2 = $request->address2;
                $profile->city = $request->city;
                $profile->post_code = $request->post_code;
                $profile->phone = $request->phone;
                $profile->photo = $filename;
                $profile->status = 'YES';
                $profile->save();

                $user->roles()->attach(2);

                session()->flash('status','User has been Successfully Registered');

                $user_data = array(
                    'email'  => $request->get('email'),
                    'password' => $request->get('password')
                   );
              
                  //  dd($user_data);
              
                   if(Auth::attempt($user_data))
                   {
                      // dd(Auth::user()->roles[0]);
              
                       if(Auth::user()->roles[0]->name == 'User'){
                          // return redirect()->route('home')->with('status','You are not Allowed');
                          // return redirect()->route('home');
                          return redirect('userlogin/successlogin');
                        
                       }else{
              
                          // $this->logout();
                          Auth::logout();
              
                          return back()->with('error', 'Invalid User name or Password');
              
                       }
                   }

                // return redirect('userlogin/successlogin');

                // return redirect('userregister');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function register(){
        return view('clients.register',['current'=>'userregister']);


    }


}
