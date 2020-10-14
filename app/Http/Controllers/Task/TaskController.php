<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.list', [
            'records' => [
                1,2,3
            ],
            'i'=>2
        ]);
    }

    public function edit()
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

    public function create()
    {
        return view('tasks.create');
    }
}
