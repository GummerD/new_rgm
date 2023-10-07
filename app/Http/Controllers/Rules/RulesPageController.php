<?php

namespace App\Http\Controllers\Rules;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Queries\RulesQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Ui\Presets\Vue;
use Throwable;

class RulesPageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(RulesQueryBuilder $rulesQueryBuilder): View
  {
   
    return view('Admin.rules', ['rules' => $rulesQueryBuilder->getAll()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('Admin.Create.rule');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
   // dd($request->all());

    $data = $request->all();
   
    $rule = Rule::create($data);

    if ($rule) {
     
      return (\redirect()->route('admin.rules', $rule )->with('success', __('The task was successfully created!')));
    }
    return (\back()->with('error', __('Task creation error!')));

  }

  /**
   * Display the specified resource.
   */
  public function show(RulesQueryBuilder $rulesQueryBuilder)
  {
    return view('Rules.rules', ['rules' => $rulesQueryBuilder->getAll()]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Rule $rule):View
  {
    return view('Admin.Update.rule', compact('rule'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Rule $rule)
  {
    //dd($request->all(), $rule);
    $rule = $rule->fill($request->all());
    if($rule->save()) {       
        return (\redirect()->route('admin.rules', $rule)->with('success', __('The rule has been successfully updated!')));
    }
    return (\back()->with('error', __('Error updating the rule!')));
  }
 
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Rule $rule)
  {
    try {            
      $rule->delete();   
      return (response()->with('success', __("Record deleted!")));

    }catch(Throwable $exception) {
        Log::error($exception->getMessage(), $exception->getTrace());
        return \response()->json('error', 400);
    }
  } 
 
}
