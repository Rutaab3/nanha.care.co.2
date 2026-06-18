<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\RoleAssignmentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        return view('dashboard.admin.roles.index', compact('roles', 'users'));
    }

    public function assign(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,moderator,babysitter,parent,shop_owner,doctor,support',
        ]);

        $user = User::findOrFail($data['user_id']);
        $oldRoles = $user->getRoleNames()->toArray();

        $user->syncRoles([$data['role']]);

        RoleAssignmentLog::create([
            'admin_id' => Auth::id(),
            'user_id' => $user->id,
            'old_role' => implode(', ', $oldRoles),
            'new_role' => $data['role'],
        ]);

        return redirect()->back()->with('success', 'Role assigned successfully.');
    }
}
