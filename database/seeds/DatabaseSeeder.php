<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        DB::table('users')->truncate();
        factory(App\User::class, 4)->create();
        DB::table('todo_lists')->truncate();
        DB::table('tasks')->truncate();
        factory(App\Todolist::class, 15)->create();

        factory(App\Task::class, 15)->create();
    }
}
