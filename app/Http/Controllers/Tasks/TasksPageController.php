<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\Store;
use App\Http\Requests\Tasks\Update;
use App\Models\GroupsTask;
use App\Models\Level;
use App\Models\Rule;
use App\Models\Section;
use App\Models\Task;
use App\Queries\GroupsTaskQueryBuilder;
use App\Queries\LevelQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SectionQueryBuilder;
use App\Queries\TasksQueryBuilder;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class TasksPageController extends Controller
{

  protected QueryBuilder $tasksQueryBuilder;
  protected QueryBuilder $levelQueryBuilder;
  protected QueryBuilder $sectionQueryBuilder;
  protected QueryBuilder $groupsTaskQueryBuilder;

  public function __construct(
    TasksQueryBuilder $tasksQueryBuilder,
    LevelQueryBuilder $levelQueryBuilder,
    GroupsTaskQueryBuilder $groupsTaskQueryBuilder,
    SectionQueryBuilder $sectionQueryBuilder
  ) {
    $this->tasksQueryBuilder = $tasksQueryBuilder;
    $this->groupsTaskQueryBuilder = $groupsTaskQueryBuilder;
    $this->levelQueryBuilder = $levelQueryBuilder;
    $this->sectionQueryBuilder = $sectionQueryBuilder;
  }

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
  public function create(): View
  {
    $levels = $this->levelQueryBuilder->getAll();
    $groups = $this->groupsTaskQueryBuilder->getAll();
    $sections = $this->sectionQueryBuilder->getAll();

    return view('Admin.Create.task', compact("levels", "groups", "sections"));
  }

  /**
   * Store a newly created resource in storage.
   */

  public function store(Store $request): RedirectResponse
  {
    //$data = $request->all();
    $validated = $request->validated();    
   
    $task = Task::create($validated);
    
    if ($task) {
      $level = Level::find($request->id);
      $group  = GroupsTask::find($request->id);
      $section = Section::find($request->id);
      return (\redirect()->route('admin.tasks', [$task, $level, $group, $section])->with('success', __('Упражнение успешно создано!')));
    }
    return (\back()->with('error', __('Не удалось создать упражнение!')));
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
  public function edit(Task $task):View
  {
    $levels = $this->levelQueryBuilder->getAll();
    $groups = $this->groupsTaskQueryBuilder->getAll();
    $sections = $this->sectionQueryBuilder->getAll();
    return view('Admin.Update.task', compact('task', 'levels', 'groups', 'sections'));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Update $request, Task $task)
  { 
    $task = $task->fill($request->validated());
    if($task->save()) {
        $level = Level::find($request->id);
        $group  = GroupsTask::find($request->id);
        $section = Section::find($request->id);
    
        return (\redirect()->route('admin.tasks', [$level, $group, $section])->with('success', __('Упражнение успешно обновлено!')));
    }
    return (\back()->with('error', __('Не удалось обновить сообщение')));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Task $task)
  {
    // dd("controller");
    try {
      $task->delete();
      return (response()->with('success', __("Record deleted!"))->json(('Record deleted!')));
    } catch (Throwable $exception) {
      Log::error($exception->getMessage(), $exception->getTrace());
      return \response()->json('error', 400);
    }
  }
}
