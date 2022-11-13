<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaks extends Model
{
    use HasFactory;

    protected $primaryKey = 'break_id';
    protected $table = 'breaks';

    protected $guarded = [];
}
