<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'personnel_id',
        'leave_type',
        'start_date',
        'end_date',
        'description',
        'status'
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
