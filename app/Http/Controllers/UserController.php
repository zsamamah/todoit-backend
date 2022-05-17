<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::where("email",$request['email'])->first();
        if($user)
            return Response("User Found",202);
        else{
            if($request['password']===$request['repassword']){
                User::create([
                    "name"=>$request['name'],
                    "email"=>$request['email'],
                    "password"=>Hash::make($request['password'])
                ]);
                return response("User Created",200);
            }
            else{
                return response("Password don`t match",201);
            }
        }
    }

    public function login(Request $request)
    {
        //check email
        $user = User::where('email', $request['email'])->first();

        if (!$user)
            return response(['message'=>'Email Not Found!'], 201);

        //check password
        if (!Hash::check($request['password'], $user->password)) {
            return response(['message'=>'Wrong Password'], 202);
        }

        // $todo = Task::where('user_id',$user['id'])->where('status','Todo')->get();
        // $doing = Task::where('user_id',$user['id'])->where('status','Doing')->get();
        // $done = Task::where('user_id',$user['id'])->where('status','Done')->get();
        
        $response = [
            'user' => $user,
            'todo' => [],
            'doing' => [],
            'done' => []
        ];
        return response($response, 200);
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
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(User $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(User $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $task)
    {
        //
    }
}
