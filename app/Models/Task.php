<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    const STATUS = [
      1 => ['label' => 'Assigned'],
      2 => ['label' => 'In Progress'],
      3 => ['label' => 'Completed'],
      4 => ['label' => 'Pending'],
      5 => ['label' => 'Closed'],
    ];

    /**
    * Accessor: 状態のラベル
    * @return string
    */
    public function getStatusLabelAttribute()
    {
      // $status = $this->attributes['status'];
      $status = $this->status;


      if(!isset(self::STATUS[$status])) {
        return '';
      }
      return self::STATUS[$status]['label'];
    }

    /**
     * Accessor: 整形した期限日
     * @return string
     */
     public function getFormattedDueDateAttribute()
     {
       return Carbon::createFromFormat('Y-m-d', $this->due_date)->format('j F Y');
     }


}
