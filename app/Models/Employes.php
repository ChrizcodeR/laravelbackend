<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;

    protected $fillable = [

        "employed_id",
        "name",
        "lastname",
        "email",
        "address",
        "photo"

    ];
}
