<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\User;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebook = Ebook::all();
        return view('home', [
            'title' => 'Amazing E-Book | Home Page',
            'ebook' => $ebook
        ]);
    }

    public function gotoLogIn(){
        return view('login', [
            'title' => 'Amazing E-Book | Log In'
        ]);
    }

    public function gotoRegister(){

        return view('register', [
            'title' => 'Amazing E-Book | Log In'
        ]);
    }

    public function register(Request $request){
        
        $validated_data = $request->validate([
            'first_name' => 'required|max:25|alpha_num',
            'middle_name' => 'max:25',
            'last_name' => 'required|max:25|alpha_num',
            'gender_id' => 'required',
            'email' => 'required|email:dns',
            'role_id' => 'required|in:Admin,User',
            'password' => ['required', Password::min(8)->numbers()],
            'display_picture_link' => 'required'
        ]);
        

        if($request->hasFile('image')){
            $request->validate([
                'display_picture_link' => 'required|image|file'
            ]);
        }
        
        
        $validated_data['password'] = bcrypt($validated_data['password']);

        if($validated_data['gender_id'] === 'male'){
            $validated_data['gender_id'] = 1;
        }else{
            $validated_data['gender_id'] = 2;
        }

        if($validated_data['role_id'] === 'Admin'){
            $validated_data['role_id'] = 1;
        }else{
            $validated_data['role_id'] = 2;
        }
        
        $last_index = User::orderBy('account_id', 'desc')->first();

        $validated_data['account_id'] = (int)$last_index['account_id'] + 1;

        User::create($validated_data);

        if($request->file('display_picture_link')){
            $last_index = User::orderBy('account_id', 'desc')->first();
            $last_index['display_picture_link'] = 'storage/' . $request->file('display_picture_link')->store('images/profile-pic');
        }
        
        $last_index->save();

        $request->session()->flash('regis_success', 'Registration successful! Please login!');

        return redirect('/login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Wrong email or password!');
    }

    public function logout(Request $request){
    
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    

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
}
