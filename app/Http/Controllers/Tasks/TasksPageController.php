<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\Store;
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
use Illuminate\Support\Facades\Validator;
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
      )
  {  
      $this->tasksQueryBuilder=$tasksQueryBuilder;
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
  public function create():View
  {
    $levels = $this->levelQueryBuilder->getAll();
    $groups = $this->groupsTaskQueryBuilder->getAll();
    $sections = $this->sectionQueryBuilder->getAll();
    
    return view('Admin.Create.task', compact("levels", "groups", "sections"));
  }

  /**
   * Store a newly created resource in storage.
   */




  public function store(Request $request):RedirectResponse
  {

    $data = $request->all();
    //$data = $request->validate(); 
   // dd($data);
      
    $task = Task::create($data);       

    if ($task) {          
      $level = Level::find($request->id);
      $group  = GroupsTask::find($request->id);
      $section = Section::find($request->id);
      return (\redirect()->route('admin.tasks', [$level, $group, $section])-> with ('success', __('The task was successfully created!')));           
    }        
    return (\back()->with('error', __('Task creation error!')));
 
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
  public function update(Request $request, Task $task)
  { 
    // dd($request->all());
    $task = $task->fill($request->all());
    if($task->save()) {
        $level = Level::find($request->id);
        $group  = GroupsTask::find($request->id);
        $section = Section::find($request->id);
    
        return (\redirect()->route('admin.tasks', [$level, $group, $section])->with('success', __('The task has been successfully updated!')));
    }
    return (\back()->with('error', __('Error updating the article!')));
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

      }catch(Throwable $exception) {
          Log::error($exception->getMessage(), $exception->getTrace());
          return \response()->json('error', 400);
      }
  }

}
