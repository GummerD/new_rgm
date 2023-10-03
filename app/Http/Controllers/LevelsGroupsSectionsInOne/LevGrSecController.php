<?php

namespace App\Http\Controllers\LevelsGroupsSectionsInOne;

use App\Http\Controllers\Controller;
use App\Queries\GroupsTaskQueryBuilder;
use App\Queries\LevelQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SectionQueryBuilder;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class LevGrSecController extends Controller
{  
  protected QueryBuilder $levelQueryBuilder;
  protected QueryBuilder $sectionQueryBuilder;
  protected QueryBuilder $groupsTaskQueryBuilder;

  public function __construct( 
    LevelQueryBuilder $levelQueryBuilder,
    GroupsTaskQueryBuilder $groupsTaskQueryBuilder,      
    SectionQueryBuilder $sectionQueryBuilder
      )
  {  
    $this->groupsTaskQueryBuilder = $groupsTaskQueryBuilder;
    $this->levelQueryBuilder = $levelQueryBuilder;
    $this->sectionQueryBuilder = $sectionQueryBuilder;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('Admin.Create.levelsGroupsSections');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
    return view();
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
