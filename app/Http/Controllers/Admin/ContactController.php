<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.kontak.index2',compact('contacts'));
    }

    public function destroy($id)
    {
        DB::table('contacts')->where('id',$id)->delete();

        return redirect()->route('admin.kontak.show')
            ->with('danger', 'Data Pengirim Pesan Berhasil dihapus');
    }

    public function changeStatus(Request $request)

    {

        $contact = Contact::find($request->contact_id);

        $contact->status = $request->status;

        $contact->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

}
