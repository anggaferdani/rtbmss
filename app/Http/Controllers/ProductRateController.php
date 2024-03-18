<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRateController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $productRates = DB::table('product_rate');
        if (!empty($search)) {
            $productRates->where('provider_id', 'like', '%' . $search . '%')
                        ->orWhere('location_id', 'like', '%' . $search . '%')
                        ->orWhere('service_id', 'like', '%' . $search . '%')
                        ->orWhere('prefix', 'like', '%' . $search . '%')
                        ->orWhere('call_type_id', 'like', '%' . $search . '%')
                        ->orWhere('cost', 'like', '%' . $search . '%')
                        ->orWhere('block1', 'like', '%' . $search . '%')
                        ->orWhere('block2', 'like', '%' . $search . '%');
        }
        $productRates = $productRates->paginate(10);
        return view('pages.product-rate.index', compact(
            'productRates',
        ));
    }
}
