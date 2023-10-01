<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Edit;
use App\Models\Profile;
use App\Models\Task;
use App\Models\User;
use App\Queries\UserQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfilePageController extends Controller
{
  /* ИЗВЛЕЧЬ ВСЕ ПРОФИЛИ */

  public function index(UserQueryBuilder $userQueryBuilder): View
  {
    return view('admin.profiles', ['profiles' => $userQueryBuilder->getAll()]);
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


  /* СОХРАНИТЬ ПРОГРЕСС (ПРОЙДЕННЫЕ ЗАДАЧИ) */
  public function saveprogress(Request $request)
  {
    $uspex = $request->progress;
    $parts = explode(",", $uspex);
    $level = $parts[0];
    $section = $parts[1];
    $group = $parts[2];
    $task_by_group = Task::where('level_id', $level)
      ->where('section_id', $section)
      ->where('group_id', $group + 1)->first();
    if ($task_by_group) {
      $group_next = $group + 1;
      $uspex2 = $level . "/" . $section . "/" . $group_next;
      Profile::where('user_id', Auth::user()->id)->update(['progress' => $uspex2]);
      $group = $group_next;
    } else {
      $section_next = $section + 1;
      $task_by_section = Task::where('level_id', $level)->where('section_id', $section_next)->first();
      if ($task_by_section) {
        $uspex3 = $level . '/' . $section_next . '/1';
        Profile::where('user_id', Auth::user()->id)->update(['progress' => $uspex3]);
        $section = $section_next;
        $group = 1;
      } else {
        $level_next = $level + 1;
        $task_by_level = Task::where('level_id', $level_next)->first();
        if ($task_by_level) {
          $uspex4 = $level_next . '/1/1';
          Profile::where('user_id', Auth::user()->id)->update(['progress' => $uspex4]);
          $level = $level_next;
          $section = 1;
          $group = 1;
        } else {
          return redirect()->route('profiles');
        }
      }
    };

    return redirect()->route('tasks', [
      'level' => $level,
      'section' => $section,
      'group' => $group
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(User $user): View
  {
    return view('Profiles.redactProfile', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Edit $request, User $user)
  {
    $new = array_filter($request->validated());

    if (array_key_exists('password', $new) && !array_key_exists('path_img', $new)) {

      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
        'password' => Hash::make($new['password'])
      ]);
      return (\redirect()->route('profiles'));
    }
    if (array_key_exists('path_img', $new) && array_key_exists('password', $new)) {

      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
        'password' => Hash::make($new['password'])
      ]);

      $avatar = $request->file('path_img')->store('avatars', 'public');
      $url = Storage::url($avatar);
      Profile::where('user_id', $user->id)->update(['path_img' => $url]);
      return (\redirect()->route('profiles'));
    }
    if (array_key_exists('path_img', $new) && !array_key_exists('password', $new)) {

      $avatar = $request->file('path_img')->store('avatars', 'public');
      $url = Storage::url($avatar);
      Profile::where('user_id', $user->id)->update(['path_img' => $url]);

      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
      ]);
      return (\redirect()->route('profiles'));
    } else {
      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
      ]);
      return (\redirect()->route('profiles'));
    }


    return (\back());
  }
}
