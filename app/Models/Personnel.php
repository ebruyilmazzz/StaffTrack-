<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department; 

class Personnel extends Model
{
    protected $table = 'personnel';     
    protected $primaryKey = 'id';   
    public $timestamps = false; 
    protected $guarded = [];
    protected $fillable = [
        'name', 'surname', 'department_id', 'tc_no', 'email', 'phone',
        'birthday_date', 'gender', 'position', 'starts_date', 'status',
        'photo', 'created_at', 'update_at'
    ];
      
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function getGenderAttribute($value)
    {
        return $value == 'K' ? 'Kadın' : 'Erkek';
    }
    public function getStatusAttribute($value)
    {   
        return $value == '1' ? 'Aktif' : 'Pasif';
    }
}
