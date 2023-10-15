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
    return view('Admin\profiles', ['profiles' => $userQueryBuilder->getAll()]);
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
    $user = User::join('profiles', 'user_id', '=', 'id')
      ->orderBy('rating', 'desc')
      ->with('profile')
      ->select('users.*')
      ->paginate(10);
    $counter = $user->firstItem();
    $profile = Profile::all();
    return view('Profiles.profile', compact('profile', 'user', 'counter'));
  }

  /* СОХРАНЕНИЕ ПРОГРЕССА (ПРОЙДЕННЫХ ЗАДАЧ) */
  public function saveprogress(Request $request)
  {
    $uspex = $request->progress;
    $parts = explode(",", $uspex);
    $level = $parts[0];
    $section = $parts[1];
    $group = $parts[2];
    $correct_answers = $parts[3];
    $incorrect_answers = $parts[4];
    $task_by_group = Task::where('level_id', $level)
      ->where('section_id', $section)
      ->where('group_id', $group + 1)->first();
    $update_profile = Profile::where('user_id', Auth::user()->id);
    $qt_user = User::count();
    $rat = (($correct_answers - $incorrect_answers) + $qt_user / 0.4) * $group;
    $current_rating = $update_profile->value('rating');
    $new_rating = $current_rating + $rat;
    $current_correct_answer = $update_profile->value('correct_answer');
    $current_incorrect_answer = $update_profile->value('incorrect_answer');
    $new_correct_answer = $current_correct_answer + $correct_answers;
    $new_incorrect_answer = $current_incorrect_answer + $incorrect_answers;

    if ($task_by_group) {
      $group_next = $group + 1;
      $uspex2 = $level . "/" . $section . "/" . $group_next;
      $group = $group_next;
      $update_profile->update([
        'progress' => $uspex2,
        'correct_answer' => $new_correct_answer,
        'incorrect_answer' => $new_incorrect_answer,
        'rating' => $new_rating,
      ]);
    } else {
      $section_next = $section + 1;
      $task_by_section = Task::where('level_id', $level)->where('section_id', $section_next)->first();
      if ($task_by_section) {
        $uspex3 = $level . '/' . $section_next . '/1';
        $update_profile->update([
          'progress' => $uspex3,
          'correct_answer' => $new_correct_answer,
          'incorrect_answer' => $new_incorrect_answer,
          'rating' => $new_rating,
        ]);
        $section = $section_next;
        $group = 1;
      } else {
        $level_next = $level + 1;
        $task_by_level = Task::where('level_id', $level_next)->first();
        if ($task_by_level) {
          $uspex4 = $level_next . '/1/1';
          $update_profile->update([
            'progress' => $uspex4,
            'correct_answer' => $new_correct_answer,
            'incorrect_answer' => $new_incorrect_answer,
            'rating' => $new_rating,
          ]);
          $level = $level_next;
          $section = 1;
          $group = 1;
        } else {
          $update_profile->increment('num_trainings');

          $update_profile->update([
            'progress' => '1/1/1',
            'correct_answer' => $new_correct_answer,
            'incorrect_answer' => $new_incorrect_answer,
            'rating' => $new_rating,
          ]);
          $this->scaleGrafik();
          return redirect()->route('profiles')->with('success', __('Ура! Вы справились со всеми заданиями!'));;
        }
      }
    };
    $this->scaleGrafik();
    return redirect()->route('tasks', [
      'level' => $level,
      'section' => $section,
      'group' => $group
    ]);
  }

  // Масштабирование графика
  public function scaleGrafik()
  {
    $max_rating = Profile::max('rating');
    $max_pix = 200;
    Profile::where('rating', $max_rating)->update(['pixel_rating' => $max_pix]);
    $allprof = Profile::all();
    foreach ($allprof as $item) {
      $n_r = round((200 * $item->rating) / $max_rating);
      $item->where('user_id', $item->user_id)->update(['pixel_rating' => $n_r]);
    }
    return true;
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
      return (\redirect()->route('profiles')->with('success', __('Данные пользователя успешно изменены.')));
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
      return (\redirect()->route('profiles')->with('success', __('Данные пользователя успешно изменены.')));
    }
    if (array_key_exists('path_img', $new) && !array_key_exists('password', $new)) {

      $avatar = $request->file('path_img')->store('avatars', 'public');
      $url = Storage::url($avatar);
      Profile::where('user_id', $user->id)->update(['path_img' => $url]);

      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
      ]);
      return (\redirect()->route('profiles')->with('success', __('Данные пользователя успешно изменены.')));
    } else {
      User::where('id', $user->id)->update([
        'login' => $new['login'],
        'email' => $new['email'],
      ]);
      return (\redirect()->route('profiles')->with('success', __('Данные пользователя успешно изменены.')));
    }

    return (\back()->with('error', __('Не удалось изменить данные!')));
  }


  public function updateUserStatus(Request $request, User $user)
  {
    $status = $request->all();
    $a = Profile::where('user_id', $user->id)->update(['user_status' => $status['user_status']]);

    if ($a) {
      return (\redirect()->route('admin.profiles')->with('success', __("The user's status has been successfully updated")));
    }
    return (\back()->with('error', __('Failed to update status!')));
  }
}
