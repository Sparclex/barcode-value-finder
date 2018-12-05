<?php

namespace App\Http\Controllers;

use App\BarcodeList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarcodeListController extends Controller
{
    public function index() {
        return BarcodeList::where('user_id', Auth::user()->id)->get();
    }

    public function create(Request $request) {
        $list = new BarcodeList($request->only('name', 'content'));
        $list->user_id = Auth::user()->id;
        $list->save();
        return $list;
    }

    public function destroy(BarcodeList $list) {
        $list->delete();
        return [
            'success' => true
        ];
    }
}
