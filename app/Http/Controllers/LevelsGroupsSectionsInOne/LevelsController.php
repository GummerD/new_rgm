<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\Levels\Store;
use App\Http\Requests\Levels\Update;
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


    public function store(Store $request):RedirectResponse
    {
      $validated = $request->validated(); 
      $level = Level::create($validated);       
  
      if ($level) {       
        return (\redirect()->route('admin.level', $level)-> with ('success', __('Уровень успешно сщздан!')));           
      }        
      return (\back()->with('error', __('Не удалось сщздать уровень!')));
   
    }


    public function edit(Level $level):View
    {
       return view('Admin.Update.level', compact('level'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Level $level)
   { 
        $level = $level->fill($request->validated());
    if($level->save()) {       
        return (\redirect()->route('admin.level', $level)->with('success',  __('Уровень успешно изменен!')));
    }
    return (\back()->with('error', __('Не удалось изменить уровень!')));
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
