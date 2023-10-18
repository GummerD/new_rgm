<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupsTask;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Rule;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $users = User::all();
    $profiles = Profile::all();
    $tasks = Task::all();
    $rules = Rule::all();
    $levels = Level::all();
    $groups = GroupsTask::all();
    $sections = Section::all();
    return view('Admin.admin', compact('users', 'tasks', 'rules', 'levels', 'groups', 'sections', 'profiles'));
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
