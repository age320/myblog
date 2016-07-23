<?php

namespace App\Http\Controllers\zhaotanjia;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImpressController extends Controller
{
    public function love(){
    	return \View::make('zhaotanjia.love');
    }
}
