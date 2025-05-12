<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
//        $permissions = Permission::all();
//        $users = User::all();
        return view('admin.roles.index-roles', compact('roles'));
    }

    public function editUserRoles($user_id)
    {
        $user = User::findOrFail($user_id);
        $roles = Role::all();
        return view('Admin.roles.edit-roles', compact('user', 'roles'));
    }

    public function updateUserRoles(Request $request, $user_id)
    {
        $request->validate([
            'role' => 'nullable|exists:roles,name'
        ]);
        $user = User::findOrFail($user_id);
        if ($request->filled('role')) {
            $user->syncRoles([$request->role]);
            return redirect()->route('admin.roles.index')->with('success', 'نقش کاربر به‌روزرسانی شد!');
        }
        return redirect()->route('admin.roles.index')->with('info', 'هیچ نقشی انتخاب نشد، نقش‌های قبلی حفظ شدند.');
    }

    public function manageRoles()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('admin.roles.manage-roles', compact('roles', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name|string|regex:/^[a-zA-Z\- \_]+$/u|max:60',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name'
        ],
            [
                'name.unique' => 'نام نقش تکراری است',
                'name.required' => 'فیلد نام ضروری است',
                'name.regex' => 'نام نقش فقط میتواند متشکل از حروف باشد'
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.manage')
            ->with('success', 'نقش با موفقیت ایجاد شد');
    }

    public function updateRolePermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $validator = Validator::make($request->all(), [
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.manage')
            ->with('success', 'تغییر پرمیژن های نقش  موفق. ');
    }

    public function destroyRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();

        return redirect()->route('admin.roles.manage')
            ->with('success', 'Role deleted successfully');
    }

    public function listUsers(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('username', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('firstname', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%');
        }

        $users = $query->with('roles')->get();
        return view('admin.roles.users-roles', compact('users'));
    }
}
