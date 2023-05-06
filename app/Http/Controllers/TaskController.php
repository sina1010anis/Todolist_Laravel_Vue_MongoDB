<?php

namespace App\Http\Controllers;

use App\Models\MongoDB\Task;
use Illuminate\Http\Request;
use App\MyClass\CookieEesy as ClassCookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Response;

class TaskController extends Controller
{
    public function create(Request $request , ClassCookie $classCookie)
    {
        $uniq_code = $classCookie->check()->set(Str::password(10) , 9999)->get();
        $request->validate(['title'=>'required|min:5|max:105']);
        if($request->ajax())
        {
            Task::create([
                'title'=>$request->title,
                'stauts'=>false,
                'uniq_code'=>$uniq_code
            ]);
            return response()->json('OK' , 200);
        }
    }

    public function get(ClassCookie $classCookie)
    {
        $uniq_code = $classCookie->check()->set(Str::password(10) , 9999)->get();
        return Task::whereUniq_code($uniq_code)->latest('created_at')->get();
    }
}
