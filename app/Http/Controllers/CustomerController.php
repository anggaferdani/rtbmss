<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $customers = DB::table('master_customer');
        if (!empty($search)) {
            $customers->where('Customer_Name', 'like', '%' . $search . '%');
        }
        $customers = $customers->paginate(10);
        return view('pages.customer.index', compact(
            'customers',
        ));
    }
}
