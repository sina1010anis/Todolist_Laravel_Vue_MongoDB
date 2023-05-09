<?php

namespace App\Http\Controllers;

use App\Models\MongoDB\SubTask;
use Response;
use Illuminate\Support\Str;
use App\Models\MongoDB\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\MyClass\CookieEesy as ClassCookie;

class TaskController extends Controller
{
    public function create(Request $request , ClassCookie $classCookie)
    {
        $request->validate(['title'=>'required|min:5|max:105']);
        if($request->ajax())
        {
            Task::create([
                'title'=>$request->title,
                'stauts'=>false,
                'uniq_code'=>$classCookie->CSG(Str::password(10) , 9999)
            ]);
            return response()->json('OK' , 200);
        }
    }

    public function get(ClassCookie $classCookie)
    {
        return Task::whereUniq_code($classCookie->CSG(Str::password(10) , 9999))->latest('created_at')->get();
    }

    public function delete($mode , Request $request , ClassCookie $classCookie){
        if($request->ajax()){
            switch($mode){
                case 'all':
                    Task::where('uniq_code' , $classCookie->CSG(Str::password(10) , 9999))->delete();
                    break;
                case 'task':
                    Task::where(['uniq_code' => $classCookie->CSG(Str::password(10) , 9999) , '_id' => $request->id])->delete();
                    break;
                case 'sub_task':
                    $count_task = Task::where(['uniq_code' => $classCookie->CSG(Str::password(10) , 9999) , '_id' => $request->id])->count();
                    ($count_task == 1) ? SubTask::where(['_id' => $request->id_sub])->delete():'Error : FFf987';
                    break;
                case 'all_sub_task':
                    $count_task = Task::where(['uniq_code' => $classCookie->CSG(Str::password(10) , 9999) , '_id' => $request->id])->count();
                    ($count_task == 1) ? SubTask::where('task_id' , $request->id)->delete():'Error : FFf987';
                    break;
            }
        }
    }
}
