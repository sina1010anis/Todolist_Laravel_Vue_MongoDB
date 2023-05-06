<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\MongoDB\Task;
use Illuminate\Http\Request;
use App\Models\MongoDB\SubTask;
use App\MyClass\CookieEesy as ClassCookie;

class SubTasks extends Controller
{
    public function get(Request $request)
    {
        $sub_task = SubTask::whereTask_id($request->id)->get();
        return $sub_task;
    }

    public function create(Request $request , ClassCookie $classCookie)
    {
        $uniq_code = $classCookie->check()->set(Str::password(10) , 9999)->get();
        $request->validate(['id'=>'required']);
        $count_user = Task::where(['uniq_code' => $uniq_code , '_id' => $request->id])->count();
        if($request->ajax() and $count_user == 1)
        {
            SubTask::create([
                'title'=>$request->title,
                'stauts'=>false,
                'task_id'=>$request->id,
            ]);
            return SubTask::where('task_id' , $request->id)->get();

        }
    }
}
