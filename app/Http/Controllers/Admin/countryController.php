<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class countryController extends Controller
{
    // ============= Admins ==============

    /**
     * All Admins
     *
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *          view => dashboard/users/admins.blade.php
     */
    public function index()
    {
        $data   = Country::with(['Cities', 'Neighborhoods'])->OrderBy('title', 'asc')->get();
        $roles  = Role::latest()->get();
        return view('dashboard.country.index', compact('data', 'roles'));
    }

    /**
     * Add new Admin
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        // Validation rules
        $rules = [
            'title'              => 'required|min:2|max:255',
        ];

        // Validator messages
        $messages = [
            'title.required'     => 'الاسم مطلوب',
            'title.min'          => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'          => 'الاسم لابد ان يكون اصغر من 255 حرف',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store country
        $add = new Country;
        $add->title = $request->title;
        $add->save();

        addReport(auth()->user()->id, 'باضافة بلد جديدة', $request->ip());
        Session::flash('success', 'تم الأضافة بنجاح');
        return back();
    }

    public function update(Request $request)
    {

        // Validation rules
        $rules = [
            'title'              => 'required|min:2|max:255',
        ];

        // Validator messages
        $messages = [
            'title.required'     => 'الاسم مطلوب',
            'title.min'          => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'          => 'الاسم لابد ان يكون اصغر من 255 حرف',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store country
        $add = Country::findOrFail($request->id);
        $add->title = $request->title;
        $add->save();

        addReport(auth()->user()->id, 'بتعديل بيانات البلد', $request->ip());
        Session::flash('success', 'تم التعديل بنجاح');
        return back();
    }

    public function delete(Request $request)
    {

        Country::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف بلد', $request->ip());
        Session::flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Country::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من البلاد', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
