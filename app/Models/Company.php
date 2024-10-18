<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, "company_id", "id");
    }
}
