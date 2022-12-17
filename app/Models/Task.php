<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $konhurikuto_surukana;

    use HasFactory;
    protected $fillable = ['title'];

    public function time_logs(){
        return $this->hasMany('App\Models\TimeLog');
    }
}
