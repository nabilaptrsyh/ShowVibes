<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index() {
        $movies = DB::table('movies')->paginate(7);
        return view('dashboard.admin.admin', [
            'movies' => $movies
        ]);
    }
}
