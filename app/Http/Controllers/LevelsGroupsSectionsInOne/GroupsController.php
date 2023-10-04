<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
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



    public function store(Request $request):RedirectResponse
  {
     $data = $request->all();
    //$data = $request->validate(); 
   //dd($data);
      
    $group = GroupsTask::create($data);       

    if ($group) {       
      return (\redirect()->route('admin.groups', $group)-> with ('success', __('The task was successfully created!')));           
    }        
    return (\back()->with('error', __('Task creation error!')));
 
  }

  public function edit(GroupsTask $group):View
  {
     return view('Admin.Update.group', compact('group'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, GroupsTask $group)
{ 
  //dd($request->all());
  $group = $group->fill($request->all());
  if($group->save()) {       
      return (\redirect()->route('admin.groups', $group)->with('success', __('The task has been successfully updated!')));
  }
  return (\back()->with('error', __('Error updating the article!')));
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
