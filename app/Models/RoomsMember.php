<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsMember extends Model
{
    use HasFactory;

    protected $fillable = ['member_name', 'school_year', 'status', 'group_judg', 'room_id']; //許可
}
