<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\Store;
use App\Http\Requests\Groups\Update;
use App\Models\GroupsTask;
use App\Queries\GroupsTaskQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class GroupsController extends Controller
{

  
  public function index(GroupsTaskQueryBuilder $groupQueryBuilder):View 
  {
      return view('Admin.groups', ['groups'=> $groupQueryBuilder->getAll()]);
  }



    public function store(Store $request):RedirectResponse
  {
    $validated = $request->validated(); 
         
    $group = GroupsTask::create($validated);       
    
    if ($group) {       
      return (\redirect()->route('admin.groups', $group)-> with ('success', __('Группа упражнений успешно создана!')));           
    }        
    return (\back()->with('error', __('Ошибка создания!')));
 
  }

  public function edit(GroupsTask $group):View
  {
     return view('Admin.Update.group', compact('group'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Update $request, GroupsTask $group)
{ 
  //dd($request->all());
  $group = $group->fill($request->validated());
  if($group->save()) {       
      return (\redirect()->route('admin.groups', $group)->with('success', __('Группа упражнений успешно изменена!')));
  }
  return (\back()->with('error', __('Не удалось изменить!')));
}



  public function destroy(GroupsTask $group)
  {
    try {            
      $group->delete();   
        return (response()->with('success', __("Record deleted!"))->json(('Record deleted!')));

      }catch(Throwable $exception) {
        Log::error($exception->getMessage(), $exception->getTrace());
        return \response()->json('error', 400);
      }
  }
}
