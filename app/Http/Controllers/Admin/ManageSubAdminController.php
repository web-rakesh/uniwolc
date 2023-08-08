<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\ManageSubAdmin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageSubAdminController extends Controller
{
    public function index()
    {
        return view('admin.manage-sub-admin.index');
    }

    public function create()
    {
        return view('admin.manage-sub-admin.create');
    }

    public function store(Request $request)
    {

        try {
            //code...
            DB::beginTransaction();

            $admin = Admin::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]
            );

            foreach ($request->menu_name as $menu) {
                if ($request[$menu] != null) {
                    ManageSubAdmin::create([
                        'admin_id' => $admin->id,
                        'menu' => $menu,
                        'permission' => json_encode($request[$menu])
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.manage-sub-admin.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show($id)
    {
        return view('admin.manage-sub-admin.show');
    }

    public function edit($id)
    {
        $editSubAdmin = Admin::with('user_permission')->where('id', $id)->first();
        // return $editSubAdmin;
        return view('admin.manage-sub-admin.edit', compact('editSubAdmin'));
    }

    public function update(Request $request, $id)
    {
        // return $request;

        try {
            //code...
            DB::beginTransaction();

            // $admin = Admin::where('id', $id)->update(
            //     [
            //         'name' => $request->name,

            //     ]
            // );
            $aa = [];
            foreach ($request->menu_name as $i => $menu) {
                // return $menu;
                ManageSubAdmin::where('admin_id', $id)->where('menu', $menu)->delete();
                if ($request[$menu] != null) {
                    ManageSubAdmin::create([
                        'admin_id' => $id,
                        'menu' => $menu,
                        'permission' => json_encode($request[$menu])
                    ]);
                }
            }
            // return $aa;
            DB::commit();

            return redirect()->route('admin.manage-sub-admin.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        //
    }
}
