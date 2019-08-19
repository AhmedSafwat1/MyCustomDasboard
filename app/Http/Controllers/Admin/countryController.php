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
        $data   = Country::with(['Cities'])->OrderBy('title_ar', 'asc')->get();
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
            'title_ar'              => 'required|min:2|max:255',
            'title_en'              => 'required|min:2|max:255',
            'code'               => 'required|min:2|max:10',
        ];

        // Validator messages
        $messages = [
            'title_ar.required'     => 'الاسم بالعربية مطلوب',
            'title_ar.min'          => 'الاسم بالعربية لابد ان يكون اكبر من حرفين',
            'title_ar.max'          => 'الاسم بالعربية لابد ان يكون اصغر من 255 حرف',
            'title_en.required'     => 'الاسم بالأنجليزية مطلوب',
            'title_en.min'          => 'الاسم بالأنجليزية لابد ان يكون اكبر من حرفين',
            'title_en.max'          => 'الاسم بالأنجليزية لابد ان يكون اصغر من 255 حرف',
            'code.required'     => 'كود البلد مطلوب',
            'code.min'          => 'كود البلد لابد ان يكون اكبر من حرفين',
            'code.max'          => 'كود البلد لابد ان يكون اصغر من 10 حروف',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store country
        $add = new Country;
        $add->title_ar = $request->title_ar;
        $add->title_en = $request->title_en;
        $add->code  = $request->code;
        $add->save();

        addReport(auth()->user()->id, 'باضافة بلد جديدة', $request->ip());
        Session::flash('success', 'تم الأضافة بنجاح');
        return back();
    }

    public function update(Request $request)
    {

        // Validation rules
        $rules = [
            'title_ar'              => 'required|min:2|max:255',
            'title_en'              => 'required|min:2|max:255',
            'code'               => 'required|min:2|max:10',
        ];

        // Validator messages
        $messages = [
            'title_ar.required'     => 'الاسم بالعربية مطلوب',
            'title_ar.min'          => 'الاسم بالعربية لابد ان يكون اكبر من حرفين',
            'title_ar.max'          => 'الاسم بالعربية لابد ان يكون اصغر من 255 حرف',
            'title_en.required'     => 'الاسم بالأنجليزية مطلوب',
            'title_en.min'          => 'الاسم بالأنجليزية لابد ان يكون اكبر من حرفين',
            'title_en.max'          => 'الاسم بالأنجليزية لابد ان يكون اصغر من 255 حرف',
            'code.required'     => 'كود البلد مطلوب',
            'code.min'          => 'كود البلد لابد ان يكون اكبر من حرفين',
            'code.max'          => 'كود البلد لابد ان يكون اصغر من 10 حروف',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store country
        $add = Country::findOrFail($request->id);
        $add->title_ar = $request->title_ar;
        $add->title_en = $request->title_en;
        $add->code  = $request->code;
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
