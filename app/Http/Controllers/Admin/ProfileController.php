<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Update;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        return view('admin.profile.index', ['user' => $user]);
    }

    public function update(Update $request): RedirectResponse
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {

            $dataForm = $request->validated();
            $errors = [];

            if (Hash::check($dataForm['password'], $user->password)) {
                $user = $user->fill($dataForm);
                $user->save();
                $request->session()->flash('MSG', 'Данные сохранены');
            } else {
                $errors['password'] [] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.profile.index', ['user' => $user])->withErrors($errors);

        }
        return redirect()->route('admin.profile.index', ['user' => $user]);
    }

    public function updateIsAdmin(Request $request): RedirectResponse
    {
        $user = User::find($request->post('id'));
        $userAuth = Auth::user();
        $errors = [];
        if (Hash::check($request->post('password'), $userAuth->password)) {
            $user->isAdmin = true;
            $user->save();
        } else {
            $errors['password'] [] = 'Неверно введен пароль';
            return redirect()->route('admin.users.edit', ['user' => $user])->withErrors($errors);
        }
        return redirect()->route('admin.users.index');
    }
}
