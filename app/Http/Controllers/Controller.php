<?php
namespace App\Http\Controllers;

use App\Models\MongoDB\Task;
use App\MyClass\CookieEesy as ClassCookie;
use Illuminate\Support\Str;
use App\Models\MongoDB\UserMongo;
use Database\Factories\MongoDB\TaskFactory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(ClassCookie $classCookie)
    {
        $uniq_code = $classCookie->check()->set(Str::password(10) , 9999)->get();
        $tasks = Task::whereUniq_code($uniq_code)->latest('created_at')->get();
        return view('index.index-page' , compact('tasks'));

    }
}
