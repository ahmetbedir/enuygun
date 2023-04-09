<?php

namespace App\Models;

use App\Services\Task\TaskService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Developer extends Model
{
    use HasFactory;

    const WEEKLY_WORKING_HOURS = 45;

    protected $fillable = [
        'name',
        'level',
        'estimated_duration',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getEstimatedDurationWeeksAttribute()
    {
        return app(TaskService::class)->calculateEstimatedWeeks($this->estimated_duration);
    }

    public function getTasksEstimatedDurationAttribute()
    {
        return $this->tasks->sum('estimated_duration');
    }

    public function getTasksEstimatedDurationWeeksAttribute()
    {
        return app(TaskService::class)->calculateEstimatedWeeks($this->tasks_estimated_duration);
    }
}
