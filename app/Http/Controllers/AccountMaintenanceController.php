<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Whoops\Run;

class AccountMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account-maintentance',[
            'title' => 'Amazing E-Book | Account Maintenance',
            'account' => User::all()
        ]);
    }

    public function delete_user(Request $request){
        $account_id = $request->account_id;

        User::where('account_id', $account_id)->delete();
        return back()->with('deleteUserSuccess', 'User Deleted!');
    }

    public function update_role($id){
        $account = User::where('account_id', $id)->first();

        return view('update-role', [
            'title' => 'Amazing E-Book | Upate Role',
            'account' => $account
        ]);
    }

    public function update_role_user(Request $request){
        $account = User::where('account_id', $request->account_id)->first();

        if($request->role_id === 'Admin'){
            $account['role_id'] = 1;
        }else{
            $account['role_id'] = 2;
        }

        $account->save();

        return redirect('/acc-maintenance');
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
