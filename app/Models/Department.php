<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; 

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
}
