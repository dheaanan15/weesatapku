<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::getAll();

        return view('backend.pages.user.UserIndex', [
            'users' => $users
        ]);
    }

    public function destroy($id) {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.user.index')->with('destroy', 'User berhasil dihapus');
    }
}
