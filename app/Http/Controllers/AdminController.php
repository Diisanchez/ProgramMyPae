<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Remittance;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome()
    {
        return view('admin.WelcomeAdminView');
    }

    public function getRemittance()
    {
        $remittances = Remittance::get();
        return view('admin.remittance.AdminRemittanceView', ['remittances' => $remittances]);
    }

    public function getInstitution()
    {
        $institutions = Institution::get();
        return view('admin.institution.AdminInstitutionView', ['institutions' => $institutions]);
    }
}
