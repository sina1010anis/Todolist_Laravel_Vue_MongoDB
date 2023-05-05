<?php
namespace App\Http\Controllers;
use App\Models\MongoDB\UserMongo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('index.index-page');
        //return UserMongo::all();

    }
}
