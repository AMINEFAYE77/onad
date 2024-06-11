<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CardIssue;
use Illuminate\Http\Request;
use App\Models\RecordNo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecordController extends Controller
{

    public function index()
    {
        $records = RecordNo::orderBy('RecordNo', 'DESC')->paginate(300);

        return $records;
    }
   public function store(Request $request)
    {
        $records = new  RecordNo();

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


    public function update(Request $request)
    {

        $validated = $request->validate([
            'RecordNo' => 'required'
        ]);


        $record =  RecordNo::where('RecordNo', $request->RecordNo)->first();

        if (empty($record)){
            return response()->json('record introuvable');
        }

        $record->zone = $request->zone;

        $record->provenance = $request->provenance;

        $record->date_sortie = $request->date_sortie;

        $record->CarStyle = $request->CarStyle;

        $record->save();

        return response()->json('Mise a jour   bien crée');
    }

    public function destroy(Request $request)
    {
Log::error('validation');
        $validated = $request->validate([
            'RecordNo' => 'required'
        ]);
Log::error('debut');
        DB::beginTransaction();

        try {
            $record = RecordNo::where('RecordNo', $request->RecordNo)->first();

            if (empty($record)) {
                DB::rollBack();
                return response()->json('record introuvable', 404);
            }

            $cardissue = CardIssue::where('CardNo', $record->CardNo)->first();

            if (empty($cardissue)) {
                DB::rollBack();
                return response()->json('carte introuvable', 404);
            }

            $cardissue->CardAmount = $cardissue->CardAmount + $cardissue->PayAmount;
            $cardissue->save();

            $record->delete();

            DB::commit();

            Log::error('ok termine');
            return response()->json('Mise a jour  crée', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Erreur lors de la mise à jour', 500);
        }
    }

    public function day()
    {
        // Pour obtenir les enregistrements du jour
        $records = RecordNo::whereDate('InDateTime', today())->orderBy('RecordNo', 'DESC')->paginate(300);
        return $records;
    }

    public function week()
    {
        // Pour obtenir les enregistrements de la semaine en cours (du lundi au dimanche)
        $records = RecordNo::whereBetween('InDateTime', [now()->startOfWeek(), now()->endOfWeek()])->orderBy('RecordNo', 'DESC')->paginate(300);
        return $records;
    }


}
