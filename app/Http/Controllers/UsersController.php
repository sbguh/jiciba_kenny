<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Mail;

class UsersController extends Controller
{
    //
    public function __construct()
      {
          $this->middleware('auth', [
              'except' => ['show', 'create', 'store',  'confirmEmail']
          ]);

          $this->middleware('guest', [
              'only' => ['create']
          ]);
      }

      public function index()
    {
      //$this->authorize('view');

      if(Auth::user()->is_admin){
        $users = User::paginate(10);
        return view('users.index', compact('users'));
      }else{
        return redirect('login');
      }


    }


    public function create()
      {
          return view('users.create');
      }

      public function show(User $user)
      {
          $this->authorize('update', $user);
          return view('users.show', compact('user'));
      }

      public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }


    protected function sendEmailConfirmationTo($user)
       {
           $view = 'emails.confirm';
           $data = compact('user');
           $from = 'aufree@yousails.com';
           $name = 'Aufree';
           $to = $user->email;
           $subject = "感谢注册 Sample 应用！请确认你的邮箱。";

           Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
               $message->from($from, $name)->to($to)->subject($subject);
           });
       }

    public function confirmEmail($token)
         {
             $user = User::where('activation_token', $token)->firstOrFail();

             $user->activated = true;
             $user->activation_token = null;
             $user->save();

             Auth::login($user);
             session()->flash('success', '恭喜你，激活成功！');
             return redirect()->route('users.show', [$user]);
         }

    public function edit(User $user)
    {
      $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
      {
          $this->validate($request, [
              'name' => 'required|max:50',
              'password' => 'nullable|confirmed|min:6'
          ]);
          $this->authorize('update', $user);
          $data = [];
          $data['name'] = $request->name;
          if ($request->password) {
              $data['password'] = bcrypt($request->password);
          }
          $user->update($data);

          session()->flash('success', '个人资料更新成功！');

          return redirect()->route('users.show', $user->id);
      }

      public function destroy(User $user)
   {
       $user->delete();
       session()->flash('success', '成功删除用户！');
       return back();
   }



}