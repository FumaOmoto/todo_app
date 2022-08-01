<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TimeLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'work_time',
        'date',
    ];
    
    public function task(){
        return $this->belongTo('App\Models\Task');
    }

    //表のラベル用(横軸)を作成
    //引数は全てののTimeLog
    //($time_logs->all()が必要)
    public function chart_labels(array $all_time_logs){
        //dateが要素の配列を作成
        $date_arr = array();

        foreach($all_time_logs as $time_log){
            array_push($date_arr, $time_log->date);
        }
        
        $chart_labels = array();
        $max_date_elem = Carbon::parse(max($date_arr));
        $min_date_elem = Carbon::parse(min($date_arr));
        $diff_in_days = $max_date_elem->copy()->diffInDays($min_date_elem);

        //labelsは降順
        while($diff_in_days >= 0){
            array_push($chart_labels, $max_date_elem->copy()->subDays($diff_in_days));
            $diff_in_days--;
        }

        return $chart_labels;
    }

    //表のデータ(縦軸)の配列を作成
    public function chart_datasets_data(array $time_logs, array $chart_labels){
        $chart_data = array();

        foreach($time_logs as $time_log){
            for ($i=0; $i < count($chart_labels); $i++) { 
                $carbon_time_log_date = Carbon::parse($time_log->date);
                if ($carbon_time_log_date->eq($chart_labels[$i])) {
                    $chart_data[$i] = $time_log->work_time;
                }else if(!isset($chart_data[$i])){
                    $chart_data[$i] = 0;
                }
            }
        }

        return $chart_data;
    }
}
