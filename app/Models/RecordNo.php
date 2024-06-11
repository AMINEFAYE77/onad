<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordNo extends Model
{
    use HasFactory;

    protected $table = "OutRecord";

    public $timestamps = false;

    protected $fillable = [
        'RecordNo',
        'ComputeNo',
        'ParkNo',
        'CardNo',
        'CarNo',
        'CardType',
        'CardIndate',
        'CardAmount',
        'CarType',
        'CarStyle',
        'CarColor',
        'MasterName',
        'MasterID',
        'MasterTel',
        'MasterAddr',
        'ParkPosition',
        'InTrackName',
        'InDateTime',
        'InPictureName',
        'InOperatorName',
        'InStyle',
        'OutTrackName',
        'OutDateTime',
        'OutPictureName',
        'OutOperatorName',
        'OutStyle',
        'CarFee',
        'PayAmount',
        'CardPayAmount',
        'PayDateTime',
        'ParkTime',
        'PicInAdd',
        'PicOutAdd',
        'Remark',
        'date_sortie',
        'zone',
        'provenance'
    ];

    protected $primaryKey = 'RecordNo'; // or null

    public $incrementing = false;
}
