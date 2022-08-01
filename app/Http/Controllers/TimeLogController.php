<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TimeLog;

class TimeLogController extends Controller
{
    public function create(Request $request, $id){
        $task = Task::find($id);
        $time_log = new TimeLog();
        $work_time = $request->input('work_time');
        $date = $request->input('date');

        TimeLog::where([['task_id', '=', $id], ['date', '=', $date]])->delete();
        $time_log->fill(['task_id' => $id,'work_time' => $work_time, 'date' => $date])->save();
        
        return redirect(route('tasks.index'));
    }
}
