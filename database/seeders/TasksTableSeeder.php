<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate(); 

        for($i=1;$i<=10;$i++){
            $task = new Task;
            $task->title = 'Task '.$i;
            $task->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum cupiditate architecto quam amet neque aliquam ullam. Minus, harum omnis rem neque quam quaerat ea delectus deleniti porro eos sit.';
            $task->project_id=1;
            $task->user_id=1;
            $task->deadline = Carbon::now()->addDays(5);
            $task->save();    
        }
        
    }
}
