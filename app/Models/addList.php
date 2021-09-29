<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addList extends Model
{
    use HasFactory;

    protected $table = "to_do";

    protected $fillable = ['task_date','time_from','time_to','task_title','task_desc','user_id'];
}
