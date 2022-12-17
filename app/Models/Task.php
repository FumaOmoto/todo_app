<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function time_logs(){
        return $this->hasMany('App\Models\TimeLog');
    }

    public function test_git(){
        dd('git_test_sitai');
    }
}
