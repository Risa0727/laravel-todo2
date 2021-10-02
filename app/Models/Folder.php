<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    public function tasks()
    {
      // both has the same meaning
      // return $this->hasMany('App\Models\Task', 'folder_id', 'id');
      return $this->hasMany('App\Models\Task');

    }
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
