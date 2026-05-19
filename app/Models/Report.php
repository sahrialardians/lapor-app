<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['user_id', 'title', 'description', 'status'])]
class Report extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
