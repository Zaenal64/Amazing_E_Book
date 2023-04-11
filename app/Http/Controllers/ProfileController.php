<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile', [
            'title' => 'Amazing E-Book | Profile'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validated_data = $request->validate([
            'first_name' => 'required|max:25|alpha_num',
            'middle_name' => 'max:25',
            'last_name' => 'required|max:25|alpha_num',
            'gender_id' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if($request->hasFile('display_picture_link')){
            $request->validate([
                'display_picture_link' => 'image|file'
            ]);
        }


        $validated_data['password'] = bcrypt($validated_data['password']);

        if($validated_data['gender_id'] === 'male'){
            $validated_data['gender_id'] = 1;
        }else{
            $validated_data['gender_id'] = 2;
        }

        $account = User::where('account_id', auth()->user()->account_id)->first();
        $account->first_name = $validated_data['first_name'];
        if($validated_data['middle_name']){
            $account->middle_name = $validated_data['middle_name'];
        }
        $account->last_name = $validated_data['last_name'];
        $account->first_name = $validated_data['first_name'];
        $account->gender_id = $validated_data['gender_id'];
        $account->email = $validated_data['email'];
        $account->password = $validated_data['password'];

        if (request()->hasFile('display_picture_link')){
            $uploadedImage = $request->file('display_picture_link');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images/');
            $uploadedImage->move($destinationPath, $imageName);

                // $filename = $request->file('display_picture_link')
                // $imageName = time() . '.' . $filename->getClientOriginalExtension();
                // $request->file('display_picture_link')->storeAs('images',$filename,'public');
                // Auth()->user()->update(['display_picture_link'=>$imageName]);
                // $destinationPath = public_path('/images/profile-pic');
                // $filename->move($destinationPath, $imageName);


                $user = Auth::user();
                $user->display_picture_link = $imageName;
                $user->save();




        }
        $account->save();

        return view('/success',[
            'title' => 'Amazing E-Book',
            'message' => 'Saved!'
        ]);
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
