<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function has_no_permission () {
        if (session()->has('has_no_permission')) {
            $img = rand(1,6);
            return view('admin.errors.has_no_permission', compact('img'));
        }

        return redirect('admin/');
    }
}
