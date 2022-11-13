<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $primaryKey = 'slot_id';

    protected $guarded = [];

    public function appointments(){
        return $this->hasMany(Appointment::class,'slot_id');
    }
}
