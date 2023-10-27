<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardIssue extends Model
{
    use HasFactory;

    protected $table = "CardIssue";

    public $timestamps = false;


    protected $primaryKey = 'CardNo'; // or null

    public $incrementing = false;
}
