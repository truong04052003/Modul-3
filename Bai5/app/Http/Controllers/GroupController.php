<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class GroupController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Group::class);

        $groups = Group::paginate(4);
        // $users = User::get();
        // $param = [
        //     'groups' => $groups,
        //     'users' => $users
        // ];
        return view('admin.groups.index',compact('groups'));
    }
    public function create()
    {
        // $this->authorize('create', Group::class);
        $groups = Group::all();
        return view('admin.groups.create',compact('groups'));
    }
    public function store(Request $request)
    {

        $group = new Group();
        $group->name = $request->name;
        $group->save();
        return redirect()->route('group.index');
    }
    public function edit($id)
    {
        // $this->authorize('update', Group::class);

        $group = Group::find($id);
        return view('admin.groups.edit', compact('group'));
    }
    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('group.index')->with($notification);
    }
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
    }
    public function detail($id)
    {
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.detail',$params);
    }
}
