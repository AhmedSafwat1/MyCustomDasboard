<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class neighborhoodController extends Controller
{
    // ============= Neighborhood ==============

    /**
     * All Neighborhood
     *
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *          view => dashboard/users/neighborhood.blade.php
     */
    public function index()
    {
        $data       = Neighborhood::with(['Country', 'City'])->OrderBy('title', 'asc')->get();
        $roles      = Role::latest()->get();
        $cities     = City::with(['Country', 'Neighborhoods'])->orderBy('country_id', 'asc')->get();
        return view('dashboard.neighborhood.index', compact('data', 'cities', 'roles'));
    }

    /**
     * Add new neighborhood
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        // Validation rules
        $rules = [
            'title'                     => 'required|min:2|max:255',
            'city_id'                   => 'required|exists:cities,id',
        ];

        // Validator messages
        $messages = [
            'title.required'            => 'الاسم مطلوب',
            'title.min'                 => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'                 => 'الاسم لابد ان يكون اصغر من 255 حرف',
            'city_id.required'          => 'المدينة مطلوب',
            'city_id.exists'            => 'المدينة غير صحيحة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $city = City::find($request->city_id);

        //store Neighborhood
        $add = new Neighborhood;
        $add->title         = $request->title;
        $add->city_id       = $request->city_id;
        $add->country_id    = $city->country_id;
        $add->save();

        addReport(auth()->user()->id, 'باضافة حي جديدة', $request->ip());
        Session::flash('success', 'تم الأضافة بنجاح');
        return back();
    }

    public function update(Request $request)
    {

        // Validation rules
        $rules = [
            'title'                     => 'required|min:2|max:255',
            'city_id'                   => 'required|exists:cities,id',
        ];

        // Validator messages
        $messages = [
            'title.required'            => 'الاسم مطلوب',
            'title.min'                 => 'الاسم لابد ان يكون اكبر من حرفين',
            'title.max'                 => 'الاسم لابد ان يكون اصغر من 255 حرف',
            'city_id.required'          => 'المدينة مطلوب',
            'city_id.exists'            => 'المدينة غير صحيحة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $city = City::find($request->city_id);

        //store Neighborhood
        $add = Neighborhood::findOrFail($request->id);
        $add->title         = $request->title;
        $add->city_id       = $request->city_id;
        $add->country_id    = $city->country_id;
        $add->save();

        addReport(auth()->user()->id, 'بتعديل بيانات الحي', $request->ip());
        Session::flash('success', 'تم التعديل بنجاح');
        return back();
    }

    public function delete(Request $request)
    {

        Neighborhood::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف حي', $request->ip());
        Session::flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Neighborhood::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الأحياء', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
