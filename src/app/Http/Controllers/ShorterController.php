<?php

namespace Acrossoffwest\Shorter\Http\Controllers;

use Acrossoffwest\Shorter\Models\Shorter;
use App\Http\Controllers\Controller;

class ShorterController extends Controller
{
    public function index()
    {
        return view('shorter::shorter.index');
    }

    public function redirect($short_url)
    {
        $shorter = Shorter::findByShortUrl($short_url);

        return redirect($shorter->url);
    }
}