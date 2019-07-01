<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speaks;
class SpeakController extends Controller
{
    public function index(Request $request)
    {

    	$speaks = Speaks::paginate(5);
    	return view('admin.speak.index',['speaks'=>$speaks,'params'=>$request->all()]);
    }
}
