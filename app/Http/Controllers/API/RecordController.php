<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecordNo;

class RecordController extends Controller
{

      public function index()
    {
 
        $records =  RecordNo::orderBy('RecordNo','DESC')->paginate(50);

       return $records;
    }

}
 