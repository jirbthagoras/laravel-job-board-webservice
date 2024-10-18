<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model
{
    protected $table = "workers";
    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;

    protected $fillable = [
        "age",
        "prophecy",
        "user_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
