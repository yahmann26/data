<?php
namespace App\Http\Controllers;

use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $this->authorize("manageUsers", User::class);

        $users = User::whereNot('id', auth()->id())->get();
        return view("admin.users.index", compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize("manageUsers", User::class);

        $user->delete();
        return redirect()->route('admin.users.index')->with('success');
    }

}

?>
