<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleManagementController;

Route::middleware(['auth', 'verified', 'role:admin', 'permission:create-super-user'])->group(function () {

    Route::get('/admin/roles', [RoleManagementController::class, 'index'])
        ->name('admin.roles.index');

    Route::get('/admin/users/{user_id}/edit-roles', [RoleManagementController::class, 'editUserRoles'])
        ->name('admin.users.edit-roles');

    Route::put('/admin/users/{user_id}/edit-roles', [RoleManagementController::class, 'updateUserRoles'])
        ->name('admin.users.update-roles');

    Route::get('/admin/roles/manage', [RoleManagementController::class, 'manageRoles'])
        ->name('admin.roles.manage');

    Route::post('/admin/roles', [RoleManagementController::class, 'storeRole'])
        ->name('admin.roles.store');

    Route::put('/admin/roles/{roleId}/permissions', [RoleManagementController::class, 'updateRolePermissions'])
        ->name('admin.roles.update-permissions');

    Route::delete('/admin/roles/{roleId}', [RoleManagementController::class, 'destroyRole'])
        ->name('admin.roles.destroy');

    Route::get('/admin/roles/users', [RoleManagementController::class, 'listUsers'])
        ->name('admin.users.list');

});
