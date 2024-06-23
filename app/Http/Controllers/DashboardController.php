<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use App\Models\Report;
use App\Models\DashboardMetric;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContacts = Contact::count();
        $lastActivity = DashboardMetric::latest('last_activity')->first();

        return view('dashboard.index', compact('totalContacts', 'totalGroups', 'totalReports', 'lastActivity'));
    }
}
