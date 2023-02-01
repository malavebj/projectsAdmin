<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        //$this->call(TasksTableSeeder::class);
        //$this->call(ProjectsTableSeeder::class);

        $this->call(rolesPermissionTablesSeeder::class);
        User::factory(10)->create();
        Project::factory(5)->create();
        Task::factory(50)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
