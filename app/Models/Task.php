<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    const STATUS = [
      1 => ['label' => 'Not Started'],
      2 => ['label' => 'In Progress'],
      3 => ['label' => 'Completed'],
    ];

    /**
    * 状態のラベル
    * @return string
    */
    public function getStatusLabelAttribute() {
      $status = $this->attributes['status'];

      if(!isset(self::STATUS[$status])) {
        return '';
      }
      return self::STATUS[$status]['label'];
    }


}
