<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Edit;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfilePageController extends Controller
{
  /* ИЗВЛЕЧЬ ВСЕ ПРОФИЛИ */ 
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /* ИЗВЛЕЧЬ ПРОФИЛЬ АВТОРИЗОВАННОГО ПОЛЬЗОВАТЕЛЯ - 
  " */

  public function show(): View
  {
    $profile = Profile::where('user_id', Auth::user()->id)->get();
    return view('Profiles.profile', compact('profile'));
  }

 

  /**
   * Update the specified resource in storage.
   */
  public function update(User $user):View
  {
    return view('Profiles.redactProfile', compact('user'));
  }

   /**
   * Show the form for editing the specified resource.
   */
  public function edit(Edit $request, User $user)
  {
    $new = array_filter($request->validated());  
   
    if(in_array('avatar', $new)){
      dd($new);
    }else{
      User::where('id', $user->id)->update($new);
      return (\redirect()->route('profiles'));
    }  
    return (back());
   
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
