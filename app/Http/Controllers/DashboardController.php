<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Island;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalContacts = Contact::count();
        $totalIsland = Island::count();

        $islands = Island::all();

        return view('pages.dashboard.index', compact('totalUsers', 'totalContacts', 'totalIsland', 'islands'));
    }
}
