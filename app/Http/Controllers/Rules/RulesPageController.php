<?php

namespace App\Http\Controllers\Rules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rules\Store;
use App\Http\Requests\Rules\Update;
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
  public function store(Store $request)
  {
   // dd($request->all());

    $validated = $request->validated();
   
    $rule = Rule::create($validated);

    if ($rule) {
     
      return (\redirect()->route('admin.rules', $rule )->with('success', __('Правило было создано успешно!')));
    }
    return (\back()->with('error', __('Не удалось создать правило!')));

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
  public function update(Update $request, Rule $rule)
  {
    //dd($request->all(), $rule);
    $rule = $rule->fill($request->validated());
    if($rule->save()) {       
        return (\redirect()->route('admin.rules', $rule)->with('success', __('Правило было изменить успешно!')));
    }
    return (\back()->with('error', __('Не удалось изменить правило!')));
  }
 
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Rule $rule)
  {
    try {            
      $rule->delete();   
      return (response()->header('success', __("Record deleted!")));

    }catch(Throwable $exception) {
        Log::error($exception->getMessage(), $exception->getTrace());
        return \response()->json('error', 400);
    }
  } 
 
}
