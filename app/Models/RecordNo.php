<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordNo extends Model
{
    use HasFactory;

    protected $table = "OutRecord";

    public $timestamps = false;


    protected $primaryKey = 'RecordNo'; // or null

    public $incrementing = false;
}
