<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\Store;
use App\Http\Requests\Sections\Update;
use App\Models\Section;
use App\Queries\SectionQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class SectionsController extends Controller
{

    public function index(SectionQueryBuilder $sectionQueryBuilder):View
    {
        return view('Admin.sections', ['sections'=> $sectionQueryBuilder->getAll()]);
    }

    public function store(Store $request):RedirectResponse
    {
      $validated = $request->validated(); 
    
      $section = Section::create($validated);       
  
      if ($section) {       
        return (\redirect()->route('admin.section', $section)-> with ('success', __('Секция упражнений успешно создана!')));           
      }        
      return (\back()->with('error', __('Не удалось создать секцию!')));
   
    }


    public function edit(Section $section):View
    {
       return view('Admin.Update.section', compact('section'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Section $section)
  { 
    //dd($request->all());
    $section = $section->fill($request->validated());
    if($section->save()) {       
        return (\redirect()->route('admin.section', $section)->with('success',  __('Секция упражнений успешно изменена!')));
    }
    return (\back()->with('error', __('Не удалось изменить секцию!')));
  }


    public function destroy(Section $section)
    {
        try {            
            $section->delete();   
            return (response()->with('success', __("Record deleted!"))->json(('Record deleted!')));
  
        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }
}
