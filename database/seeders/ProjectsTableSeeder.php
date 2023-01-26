<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate(); 

        for($i=1;$i<=3;$i++){
            $project = new Project;
            $project->name = 'project '.$i;
            $project->mainObjective = 'Lorem ipsum dolor sit amet consectetur adipisicing elit';
            $project->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima beatae sed natus, id vel molestiae accusamus cum qui dolorem, sit quam suscipit. Eveniet rerum consectetur ab reprehenderit ad? Nihil, ratione!';
            $project->user_id = 1;
            $project->save();    
        }
    }
}
