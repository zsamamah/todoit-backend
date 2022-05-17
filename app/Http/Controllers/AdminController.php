<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $contacts = Contact::all();
        return view('admin.index',compact('users','contacts'));
    }
    public function users_page()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
    public function create_user()
    {
        return view('admin.user.add');
    }
    public function save_user(Request $request)
    {
        if($request['password']===$request['rpassword']){
            User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password'])
            ]);
        }
        return redirect('admin-users');
    }
    public function edit_user(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }
    public function update_user(Request $request,$id)
    {
        $user = User::find($id);
        $user->update([
            'name'=>$request['name'],
            'email'=>$request['email']
        ]);
        if($request['password']!==null){
            $user->update([
                'password'=>Hash::make($request['password'])
            ]);
        }
        return redirect('admin-users');
    }
    public function delete_user(User $user)
    {
        if($user['email']=='admin@admin.com')
            return redirect('admin-users');
        Board::where('owner',$user['id'])->delete();
        $user->deleteOrFail();
        return redirect('admin-users');
    }
}
