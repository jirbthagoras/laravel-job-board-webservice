<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = "id";
    protected $keyType = "integer";
    public $timestamps = true;

    protected $fillable = [
        "name",
        "description",
        "salary",
        "company_id",
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, "job_id", "id");
    }
}
