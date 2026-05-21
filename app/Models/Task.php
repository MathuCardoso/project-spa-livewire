<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'user_id', 'status'])]

class Task extends Model {

    public function users() {
        return $this->belongsTo(User::class);
    }
}
