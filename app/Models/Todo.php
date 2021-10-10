<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'expiration_date',
      'completed',
      'user_id',
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function users_assigned() {
      return $this->belongsToMany(User::class);
    }
}
