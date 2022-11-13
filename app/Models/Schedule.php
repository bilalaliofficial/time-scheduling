<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $primaryKey = 'schedule_id';

    protected $guarded = [];

    public function slots(){
        return $this->hasMany(Slot::class,'schedule_id')->with('appointments');
    }

    public function schedule_type(){
        return $this->belongsTo(ScheduleType::class,'schedule_type_id');
    }
}
