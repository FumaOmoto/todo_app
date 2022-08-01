<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TimeLog;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::get();
        $all_time_logs = TimeLog::get();
        $time_log = new TimeLog();

        $chart_labels = array();
        if(!$all_time_logs->isEmpty()){
            $chart_labels = $time_log->chart_labels($all_time_logs->all());
        }

        $chart_datasets_data_arr = array();
        foreach($tasks as $task){
            if(!$task->time_logs->isEmpty()){
                array_push($chart_datasets_data_arr, $time_log->chart_datasets_data($task->time_logs->all(), $chart_labels));
            }    
        }

        $chart_datasets_label_arr = array();
        foreach($tasks as $task){
            array_push($chart_datasets_label_arr, $task->title);
        }
        
        return view('tasks/index')->with([
            "tasks" => $tasks,
            "chart_labels" => $chart_labels,
            "chart_datasets_data_arr" => $chart_datasets_data_arr,
            "chart_datasets_label_arr" => $chart_datasets_label_arr,
        ]);
    }

    public function edit(){
        $tasks = Task::get();
        
        return view('tasks/index')->with([
            "tasks" => $tasks
        ]);
    }

    public function create(Request $request){
        $task = new Task();
        $title = $request->input('title');

        $task->fill(['title' => $title])->save();

        return redirect(route('tasks.index'));
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $title = $request->input('title');

        $task->fill(['title' => $title])->update();

        return redirect(route('tasks.index'));
    }
    
    public function destroy($id){
        Task::destroy($id);

        return redirect(route('tasks.index'));
    }
}
