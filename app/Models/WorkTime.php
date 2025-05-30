<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'date',
        'start_time',
        'end_time',
        'work_duration',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'personnel_id');
    }
}
