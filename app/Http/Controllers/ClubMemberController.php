<?php

namespace App\Http\Controllers;

use App\Imports\ClubMembersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClubMemberController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('clubmember-import');
    }


     /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new ClubMembersImport, $request->file('file')->store('temp'));
        return back();
    }

}
