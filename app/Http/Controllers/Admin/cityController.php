<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class cityController extends Controller
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
        $data       = City::with(['Country', 'Neighborhoods'])->OrderBy('title', 'asc')->get();
        $roles      = Role::latest()->get();
        $countries  = Country::orderBy('title', 'asc')->get();
        return view('dashboard.city.index', compact('data', 'countries', 'roles'));
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
            'title'                     => 'required|min:2|max:255',
            'country_id'                => 'required|exists:countries,id',
        ];

        // Validator messages
        $messages = [
            'title.required'            => 'الاسم مطلوب',
            'title.min'                 => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'                 => 'الاسم لابد ان يكون اصغر من 255 حرف',
            'country_id.required'       => 'الدولة مطلوب',
            'country_id.exists'         => 'الدولة غير صحيحة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store City
        $add = new City;
        $add->title      = $request->title;
        $add->country_id = $request->country_id;
        $add->save();

        addReport(auth()->user()->id, 'باضافة مدينة جديدة', $request->ip());
        Session::flash('success', 'تم الأضافة بنجاح');
        return back();
    }

    public function update(Request $request)
    {

        // Validation rules
        $rules = [
            'title'                     => 'required|min:2|max:255',
            'country_id'                => 'required|exists:countries,id',
        ];

        // Validator messages
        $messages = [
            'title.required'            => 'الاسم مطلوب',
            'title.min'                 => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'                 => 'الاسم لابد ان يكون اصغر من 255 حرف',
            'country_id.required'       => 'الدولة مطلوب',
            'country_id.exists'         => 'الدولة غير صحيحة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store City
        $add = City::findOrFail($request->id);
        $add->title      = $request->title;
        $add->country_id = $request->country_id;
        $add->save();

        addReport(auth()->user()->id, 'بتعديل بيانات المدينة', $request->ip());
        Session::flash('success', 'تم التعديل بنجاح');
        return back();
    }

    public function delete(Request $request)
    {

        City::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف مدينة', $request->ip());
        Session::flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (City::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من المدن', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
