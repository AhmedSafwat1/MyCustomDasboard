<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class questionController extends Controller
{

    public function index()
    {
        $data       = Question::get();
        $roles      = Role::latest()->get();
        return view('dashboard.question.index', compact('data', 'roles'));
    }

    public function store(Request $request)
    {

        // Validation rules
        $rules = [
            'title_ar'        => 'required',
            'title_en'        => 'required',
            'desc_ar'         => 'required',
            'desc_en'         => 'required',
        ];

        // Validator messages
        $messages = [
            'title_ar.required'     => 'السؤال بالعربية مطلوب',
            'title_en.required'     => 'السؤال بالانجليزية مطلوب',
            'desc_ar.required'      => 'الاجابة بالعربية مطلوب',
            'desc_en.required'      => 'الاجابة بالانجليزية مطلوب',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store question
        $add = new Question;
        $add->title_ar = $request->title_ar;
        $add->title_en = $request->title_en;
        $add->desc_ar  = $request->desc_ar;
        $add->desc_en  = $request->desc_en;
        $add->save();

        addReport(auth()->user()->id, 'باضافة سؤال للعرض جديدة', $request->ip());
        Session::flash('success', 'تم الأضافة بنجاح');
        return back();
    }

    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title_ar'        => 'required',
            'title_en'        => 'required',
            'desc_ar'         => 'required',
            'desc_en'         => 'required',
        ];

        // Validator messages
        $messages = [
            'title_ar.required'     => 'السؤال بالعربية مطلوب',
            'title_en.required'     => 'السؤال بالانجليزية مطلوب',
            'desc_ar.required'      => 'الاجابة بالعربية مطلوب',
            'desc_en.required'      => 'الاجابة بالانجليزية مطلوب',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //store question
        $add = Question::findOrFail($request->id);
        $add->title_ar = $request->title_ar;
        $add->title_en = $request->title_en;
        $add->desc_ar  = $request->desc_ar;
        $add->desc_en  = $request->desc_en;
        $add->save();

        addReport(auth()->user()->id, 'بتعديل بيانات سؤال', $request->ip());
        Session::flash('success', 'تم التعديل بنجاح');
        return back();
    }

    public function delete(Request $request)
    {

        Question::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف سؤال', $request->ip());
        Session::flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Question::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الصور', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}