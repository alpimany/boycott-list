<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{
    public function show_donate(): Response
    {
        return Inertia::render('Donate/Show');
    }
}
