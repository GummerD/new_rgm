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
  public function index(TasksQueryBuilder $tasksQueryBuilder): View
  {
    return view('Admin.tasks', ['tasks' => $tasksQueryBuilder->getAll()]);
  }




  /**
   * Show the form for creating a new resource.
   */
  public function create():View
  {
    return view('Admin.Create.task');
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
    $lev = Level::where('num_level', $level)->get();
    $sect = Section::where('num_section', $section)->get();
    $gr = GroupsTask::where('num_group', $group)->get();
    $tsk = Task::where('group_id', $group)->get();
    $helps = Rule::all();
    return view('Tasks.tasks', compact('lev', 'sect', 'gr', 'tsk', 'helps'));
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
