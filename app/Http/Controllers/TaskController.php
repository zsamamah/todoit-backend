<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class TaskController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'name'=>$request['name'],
            'user_id'=>$request['user_id'],
            'description'=>$request['description'],
            'board_id'=>$request['board_id']
        ]);
        return response('Task Added',200);
    }

    public function user_tasks($id,$board_id)
    {
        $todo = Task::where('user_id',$id)->where('board_id',$board_id)->where('status','Todo')->get();
        $doing = Task::where('user_id',$id)->where('board_id',$board_id)->where('status','Doing')->get();
        $done = Task::where('user_id',$id)->where('board_id',$board_id)->where('status','Done')->get();
        $tasks=[
            'todo' => $todo,
            'doing' => $doing,
            'done' => $done
        ];
        return response($tasks,200);
    }
    public function user_tasks_todo($id)
    {
        $tasks = Task::where('user_id',$id)->where('status','Todo')->get();
        return response($tasks,200);
    }
    public function user_tasks_doing($id)
    {
        $tasks = Task::where('user_id',$id)->where('status','Doing')->get();
        return response($tasks,200);
    }
    public function user_tasks_done($id)
    {
        $tasks = Task::where('user_id',$id)->where('status','Done')->get();
        return response($tasks,200);
    }
    public function save($id,Request $request)
    {
        $arr=[];
        foreach ($request['temper'] as $key=>$value) {
            $task = Task::where('id',$value['id'])->first();
            $task->update([
                'name'=>$value['name'],
                'description'=>$value['content'],
                'status'=>$value['prefix'],
                'user_id'=>$id
            ]);
        }
        return response('Done',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
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
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
