<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecordNo;

class RecordController extends Controller
{

    public function index()
    {
        $records = RecordNo::orderBy('RecordNo', 'DESC')->get();
        return $records;
    }
    public function show($id)
    {
        $records = RecordNo::where('RecordNo',$id)->first();

        if (empty($records)) {
           return [];
        }
        return $records;
    }

    public function day()
    {
        // Pour obtenir les enregistrements du jour
        $records = RecordNo::whereDate('InDateTime', today())->orderBy('RecordNo', 'DESC')->get();
        return $records;
    }

    public function week()
    {
        // Pour obtenir les enregistrements de la semaine en cours (du lundi au dimanche)
        $records = RecordNo::whereBetween('InDateTime', [now()->startOfWeek(), now()->endOfWeek()])->orderBy('RecordNo', 'DESC')->get();
        return $records;
    }


}
