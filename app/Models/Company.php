<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;

    protected $fillable = [
        "address",
        "user_id"
    ];
}
