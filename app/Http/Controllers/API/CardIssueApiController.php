<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CardIssue;
use Illuminate\Http\Request;

class CardIssueApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CardNo' => 'required|unique:CardIssue'
        ]);

        $card = new CardIssue;
        $card->CardNo = $request->CardNo;

        $card->CarNo = $request->CarNo;

        $card->CardType = $request->CardType;

        $card->CardIndate = $request->CardIndate;

        $card->CardAmount = $request->CardAmount;

        $card->CarType = $request->CarType;

        $card->CarStyle = $request->CarStyle;
        $card->CarColor = $request->CarColor;
        $card->MasterName = $request->MasterName;
        $card->MasterTel = $request->MasterTel;
        $card->MasterAddr = $request->MasterAddr;
        $card->ParkNo = $request->ParkNo;
        $card->ParkPosition = $request->ParkPosition;
        $card->PayAmount = $request->PayAmount;
        $card->MakeDateTime = $request->MakeDateTime;
        $card->OperatorName = $request->OperatorName;
        $card->Enable = $request->Enable;
        $card->Remark = $request->Remark;
        $card->societe_id = $request->societe_id;

        $card->save();

        return response()->json('Carte  bien crée');
    }


    public function recharge(Request $request)
    {
        $validated = $request->validate([
            'CardNo' => 'required',
            'CardAmount' => 'required',
        ]);

        $card =  CardIssue::where('CardNo', $request->CardNo)->first();

        if (empty($card)){
            return response()->json('Carte introuvable');
        }

        $card->CardAmount = $card->CardAmount + $request->CardAmount;

        $card->save();

        return response()->json('Achat bien reussi');
    }


    public function cardbysociete($societe_id)
    {

        $cards =  CardIssue::where('societe_id',$societe_id)->get();

       return $cards;
    }


    public function index(Request $request)
    {

       return $cards =  CardIssue::all();

        return response()->json('Achat bien reussi');
    }

}
