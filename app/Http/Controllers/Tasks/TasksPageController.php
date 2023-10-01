<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\GroupsTask;
use App\Models\Level;
use App\Models\Rule;
use App\Models\Section;
use App\Models\Task;
use App\Queries\TasksQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasksPageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  // public function index(TasksQueryBuilder $tasksQueryBuilder, int $level_id = 1): View
  // {
  //   return view('Tasks.tasks', ['tasks' => $tasksQueryBuilder->getTasksByLevel($level_id)]);
  // }




  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $level, string $section, string $group): View
  {
    $level_view = Level::where('num_level', $level);
    $section_view = Section::where('num_section', $section);
    $group_view = GroupsTask::where('num_group', $group);
    $tasks_view = Task::where('level_id', $level)
      ->where('section_id', $section)
      ->where('group_id', $group)->get();
    $helps = Rule::all();
    return view('Tasks.tasks', compact(
      'level_view',
      'section_view',
      'group_view',
      'tasks_view',
      'helps'
    ));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
