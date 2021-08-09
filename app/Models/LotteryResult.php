<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryResult extends Model
{
    use HasFactory;

    protected $fillable = ['leader_name', 'order', 'group_id', 'room_id']; //許可
}
