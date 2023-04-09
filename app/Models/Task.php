<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'estimated_duration',
        'complexity',
        'provider_name',
        'developer_work_week',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function getDeveloperNameAttribute()
    {
        return $this->developer->name ?? null;
    }

    public function getDeveloperLevelAttribute()
    {
        return $this->developer->level ?? null;
    }

    public function getDeveloperEstimatedDurationAttribute()
    {
        if (empty($this->developer)) {
            return 0;
        }

        return $this->complexity / $this->developer->level;
    }
}
