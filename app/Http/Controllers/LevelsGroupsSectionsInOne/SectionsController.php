<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
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

    public function store(Request $request):RedirectResponse
    {
       $data = $request->all();
      //$data = $request->validate(); 
     //dd($data);
        
      $section = Section::create($data);       
  
      if ($section) {       
        return (\redirect()->route('admin.levGrSec', $section)-> with ('success', __('The task was successfully created!')));           
      }        
      return (\back()->with('error', __('Task creation error!')));
   
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
