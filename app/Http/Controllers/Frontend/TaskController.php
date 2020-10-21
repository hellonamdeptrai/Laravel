<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $list = [
//            [
//                'name' => 'Học View trong Laravel',
//                'status' => 0
//            ],
//            [
//                'name' => 'Học Route trong Laravel',
//                'status' => 1
//            ],
//            [
//            'name' => 'Làm bài tập View trong Laravel',
//            'status' => -1
//            ],
//        ];

        $tasks = Task::get();
        return view('tasks.list')->with([
            'tasks'=>$tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $name = $request -> get('name');
//        $name = $request -> only('name', 'content','deadline');
//
//        dd($name);
        $task = new Task();
        $task->name = $request -> get('name');
        $task->priority = $request -> get('priority');
        $task->status = 1;
        $task->content = $request -> get('content');
        $task->deadline = $request -> get('deadline');
        $task->save();
        return redirect()->route('task.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $task = Task::find($id);
        $task = Task::where('id', $id)->first();
        dd($task->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name = "hoc lap trinh";
//       return view('tasks.edit', [
//           'name' => $name
//       ]);
//        return view('tasks.edit')->with('name', $name);

        return view('tasks.edit')->with([
            'name'=>$name
        ]);
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
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.list');
    }





    public function complete($id)
    {
        $task = Task::find($id);
        $task->status = 2;
        $task->save();
        return redirect()->route('task.list');
    }

    public function reComplete($id)
    {
        $task = Task::find($id);
        $task->status = -1;
        $task->save();
        return redirect()->route('task.list');
    }
}
