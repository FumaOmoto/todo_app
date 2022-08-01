<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimeLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $work_times = [100, 20, 60, 40, 30, 150];
        $current_date = new Carbon();

        for ($i = 0; $i < 3; $i++) {
            $counter = 0;
            foreach($work_times as $work_time){

                DB::table('time_logs')->insert([
                    'task_id' => $i+1,
                    'work_time' => $work_time,
                    'date' => $current_date->copy()->addDay($counter+$i),
                ]);
                
                $counter++;
            }
        }
    }
}
