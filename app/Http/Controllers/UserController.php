<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function validateUser($data)
    {
    	return Validator::make($data,[
    		'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
    	]);
    }

    public function showAddUserForm()
    {
    	$users_types=UserType::pluck('type','id');
    	$currencies=Currency::getCurrencies();
    	return view('users.add',compact('users_types','currencies'));
    }

    public function add_users(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateUser($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	User::create([
    		'name' => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
    	]);

    	return redirect('/dashboard/users')->with('flashMessage',['status'=>'success','message'=>'Successfully create users.']);
    }

    public function changePassword($value='')
    {
    	# code...
    }

    public function delete_users($users_id)
    {
        User::findOrFail($users_id)->delete();
        return redirect('/dashboard/users')->with('flashMessage',['status'=>'success','message'=>'Successfully delete users.']);
    }
}
