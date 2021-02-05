<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    public function getoption(Request $request)
    {
        $id = $request->id;
        $branches = Branch::where('option_id', $id)->get();

        return $branches;
    }
}
