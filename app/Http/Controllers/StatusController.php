<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class StatusController extends Controller
{
    public function __construct() {}

    /**
     * Display the status page.
     */
    public function show(Generation $generation): Response
    {
        if (! Gate::allows('view', $generation)) {
            abort(403);
        }

        return Inertia::render('Status', ['status' => $generation]);
    }
}
