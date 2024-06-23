<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalContacts = Contact::count();

        return view('pages.dashboard.index', compact('totalUsers', 'totalContacts'));
    }
}
