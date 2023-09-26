<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Edit;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
   

    
    if (array_key_exists('password', $new) && !array_key_exists('path_img', $new)){   
      
      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'], 
        'password' => Hash::make($new['password'])     
      ]);
      return (\redirect()->route('profiles'));      

    }if (array_key_exists('path_img', $new) && array_key_exists('password', $new)){ 
   
      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'], 
        'password' => Hash::make($new['password'])     
      ]);  
        
        $avatar = $request->file('path_img')->store('avatars', 'public');
        $url = Storage::url($avatar);
        Profile::where('user_id', $user->id)->update(['path_img' => $url]);
        return (\redirect()->route('profiles')); 

      }if(array_key_exists('path_img', $new) && !array_key_exists('password', $new)){ 

        $avatar = $request->file('path_img')->store('avatars', 'public');
        $url = Storage::url($avatar);
        Profile::where('user_id', $user->id)->update(['path_img' => $url]);

        User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],      
    ]);
    return (\redirect()->route('profiles'));

    } else{
      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],      
    ]);
    return (\redirect()->route('profiles'));
    }

       
      return (\back());

    }
   
   
  }

