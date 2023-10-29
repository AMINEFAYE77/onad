<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecordNo;

class RecordController extends Controller
{

      public function index()
    {

        $records =  RecordNo::orderBy('RecordNo','DESC')->get();

       return $records;
    }
    public function day()
    {

        $records =  RecordNo::orderBy('RecordNo','DESC')->get();

       return $records;
    }
    public function week()
    {

        $records =  RecordNo::orderBy('RecordNo','DESC')->get();

       return $records;
    }

}
