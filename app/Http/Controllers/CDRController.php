<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CDRController extends Controller
{
    public function index(Request $request, $customerId) {
        $customerId = DB::table('master_customer')->where('Customer_id', $customerId)->first();
        $search = $request->input('search');

        $cdrs = DB::table('cdr')->where('Customer_ID', $customerId->Customer_id)->select('ANI')->groupBy('ANI');

        if (!empty($search)) {
            $cdrs->where('ANI', 'like', '%' . $search . '%');
        }

        $cdrs = $cdrs->paginate(10);
        return view('pages.cdr.index', compact(
            'customerId',
            'cdrs',
        ));
    }

    public function detail(Request $request, $customerId, $ani) {
        $customerId = $customerId;
        $ani = $ani;

        $date = $request->input('date');
        $search = $request->input('search');

        $cdrs = DB::table('cdr')
        ->where('Customer_ID', $customerId)
        ->where('ANI', $ani);

        if (!empty($date)) {
            $cdrs->whereRaw("MONTH(Start_Time) = ?", [$date]);
        }

        if (!empty($search)) {
            $cdrs->where('DNIS', 'like', '%' . $search . '%');
        }

        $cdrs = $cdrs->get();

        return view('pages.cdr.detail', compact(
            'customerId',
            'ani',
            'cdrs',
        ));
    }
}
