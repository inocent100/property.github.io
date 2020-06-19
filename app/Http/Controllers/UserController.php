<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\User;
use App\Country;
use App\Role;
use App\UserProfile;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles','profile'])->get();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::all();
        // $countries = Country::all();
        return view('dashboard.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->roles);

        // dd($request->input());

        $request->validate([
            'first_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'address1'=>'required',
            'post_code'=>'required',
            'roles'=>'required',
            // 'photo' => 'mimetypes:video/avi,video/mpeg,video/quicktime,jpeg,bmp,png',

            'photo' => 'mimes:mp4,jpeg,bmp,png|max:2000',
        ]);

        // dd('break');

       


     

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

            // dd("hello");

            

            // $user = User::latest()->first();
 
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
                $profile->city = $request->city;
                $profile->post_code = $request->post_code;
                $profile->phone = $request->phone;
                $profile->photo = $filename;
                $profile->status = 'YES';
                $profile->save();

                $user->roles()->attach($request->roles);

                session()->flash('status','User has been Successfully Saved');
                return redirect()->route('users.index');

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
        $user = User::find($id);
        $roles = Role::all();
        return view('dashboard.users.edit',compact('user','roles'));
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

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|min:6',
        //     'address'=>'required',
        //     'post_code'=>'required',
        //     'roles'=>'required',
        // ]);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        
        if($user->save()){

            $filename = sprintf('profile_'.$user->id.'.jpg');

            if($request->hasFile('photo')){ //check if file exist

                //delete the old file
                if(Storage::exists('profiles/'.$user->profile->photo)){
                    // dd('asdf');

                    Storage::delete('profiles/'.$user->profile->photo);
                
                  }
                // Storage::disk('profile')->delete($user->profile->photo);

                $filename = $request->file('photo')->storeAs('profiles',$filename,'public');
                // dd($filename);
                    // $request->file('thumbnail')->storeAs('images',$filename,'public');
                    // dd("dfd");
                }else{
                    $filename = $user->profile->photo;
                }

                $profile = UserProfile::where('user_id',$user->id)->first();
                $profile->address1 = $request->address1;
                $profile->city = $request->city;
                $profile->post_code = $request->post_code;
                $profile->phone = $request->phone;
                $profile->photo = $filename;
                // $profile->status = 'YES';
                $profile->save();

                $user->roles()->sync($request->roles);

                session()->flash('status','User has been Successfully Saved');
                return redirect()->route('users.index');

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
        $user = User::find($id);
        $user->profile()->delete();
        $user->roles()->detach(); //remove from roles many to many relation

        $user->delete();
        session()->flash('status-delete','User has been Successfully Deleted');

        return redirect()->route('users.index');
    }

    // public function messages(){
    //     return  [
    //         'name.required' => 'Please Enter the Name',
    //     ];
    // }

    public function user_registration_rules(array $data)
    {
        $messages = [
            'name.required' => 'Please enter full name',     
            'email.required' => 'Please enter Email Address'
        ];

        $validator = Validator::make($data, [
            'name' => 'required|min:5|max:70', 
            'email' => 'required'     
        ], $messages);

        return $validator;
    }


}
