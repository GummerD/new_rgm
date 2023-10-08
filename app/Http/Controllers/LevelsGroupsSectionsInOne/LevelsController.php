<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Queries\LevelQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class LevelsController extends Controller
{

    public function index(LevelQueryBuilder $levelQueryBuilder): View
    {
        return view('Admin.levels', ['levels'=> $levelQueryBuilder->getAll()]);
    }


    public function store(Request $request):RedirectResponse
    {
       $data = $request->all();
      //$data = $request->validate(); 
     //dd($data);
        
      $level = Level::create($data);       
  
      if ($level) {       
        return (\redirect()->route('admin.level', $level)-> with ('success', __('The task was successfully created!')));           
      }        
      return (\back()->with('error', __('Task creation error!')));
   
    }

    public function edit(Level $level):View
    {
       return view('Admin.Update.level', compact('level'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
  { 
    // dd($request->all());
    $level = $level->fill($request->all());
    if($level->save()) {       
        return (\redirect()->route('admin.level', $level)->with('success', ['message' =>'The task has been successfully updated!']));
    }
    return (\back()->with('error', __('Error updating the article!')));
  }



    public function destroy(Level $level)
    {
        try {            
            $level->delete();   
            return (response()->with('success', __("Record deleted!"))->json(('Record deleted!')));
  
        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }
}
