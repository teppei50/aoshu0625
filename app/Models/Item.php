<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'kakaku', 'bunrui', 'shosai', 'user_id', 'updated_by']; // 追加したカラムを指定

    // ...
}
