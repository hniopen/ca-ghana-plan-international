<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{

	private static function canAddPermissions($roles) {
		if(Auth::user()->can('manage_users')) return true;
		foreach($roles as $role) {
			if(!Auth::user()->hasRole($role)) {
				return false;
			}
		}
		return true;
	}
	private static function filterToAddableRoles($roles) {
		if(!Auth::user()->can('manage_users')) { 
			$roles = $roles->reject(function($role) {
				return !Auth::user()->hasRole($role);
			}, []);
		}
		return $roles;
	}
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');
		$roles = self::filterToAddableRoles($roles);

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if (!self::canAddPermissions($roles)) {
            return abort(401);
        }
        $user = User::create($request->all());
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::get()->pluck('name', 'name');
		$roles = self::filterToAddableRoles($roles);

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if (!self::canAddPermissions($roles)) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
