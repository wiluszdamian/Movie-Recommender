<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class DemoController extends Controller
{
    /**
     * Handle a demo request.
     */
    public function demo(): RedirectResponse
    {
        toastr()->warning('The option is not yet available.');

        return redirect()->back();
    }
}
