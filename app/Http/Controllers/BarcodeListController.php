<?php

namespace App\Http\Controllers;

use App\BarcodeList;
use Illuminate\Http\Request;

class BarcodeListController extends Controller
{
    public function index() {
        return BarcodeList::all();
    }

    public function create(Request $request) {
        return BarcodeList::create($request->only('name', 'content'));
    }

    public function destroy(BarcodeList $list) {
        $list->delete();
        return [
            'success' => true
        ];
    }
}
