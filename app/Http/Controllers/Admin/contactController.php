<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Mail\replayMail;
use Mail;

class contactController extends Controller
{
    //all msgs
    public function index()
    {
        $data   = Contact::OrderBy('id', 'desc')->get();
        $roles  = Role::latest()->get();
        return view('dashboard.contact.index', compact('data', 'roles'));
    }

    //show msg
    public function show($id)
    {
        $data   = Contact::findOrFail($id);
        if ($data->seen == '0') {
            $data->seen = '1';
            $data->save();
        }
        $roles  = Role::latest()->get();
        return view('dashboard.contact.show', compact('data', 'roles'));
    }

    //send msg
    public function send(Request $request)
    {
        $data   = Contact::find($request->id);
        if (!isset($data)) return 'err';
        $email      = $data->email;
        $message    = $request->message;

        Mail::to($email)->send(new replayMail($message));
        return 'success';
    }

    public function delete(Request $request)
    {
        Contact::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف أتصل بنا', $request->ip());
        Session::flash('success', 'تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Contact::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من أتصل بنا', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
