<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Queries\TasksQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasksPageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(TasksQueryBuilder $tasksQueryBuilder, int $levelId = 1): View
  {    
    return view('Tasks.tasks', ['tasks' => $tasksQueryBuilder->getTasksByLevel($levelId)]);
  }


  

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
  public function show(string $id)
  {
    //
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
