<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

use App\Post;

class ClientLoginController extends Controller
{
    public function index()
    {
        return view('clients.login',['current'=>'userlogin']);
    }
    public function search()
    {
        return view('clients.prop_search',['current'=>'userlogin']);
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
        return view('users.login',['current'=>'userlogin']);
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


    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

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
        // if(Auth::user()->hasRole('user')) {
        //     return redirect()->intended('teacher/dashboard');
        // } else {
        //     return redirect()->intended('teacher/dashboard');
        // }

      return redirect('userlogin/successlogin');
     }
     else
     {
      return back()->with('error', 'Invalid User name or Password');
     }

    }

    function successlogin()
    {
        return redirect('/');
        // return view('');
    }

    function logout()
    {

        // get current user
            // $user = Auth::user();



            // // logout user
            // $userToLogout = User::find(5);
            // Auth::setUser($userToLogout);
            // Auth::logout();

            // // set again current user
            // Auth::setUser($user);


      Auth::logout();
             return redirect('/');
    }

    public function mainPage(){
        
        $posts = Post::orderBy('updated_at', 'desc')->limit(12)->get();
        $current = 'home';
        // dd($posts);
        return view('clients.index',compact('posts','current'));
    }















}

