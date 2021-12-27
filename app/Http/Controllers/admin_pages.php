<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\category;

class admin_pages extends Controller
{
    public function AjaxPage($sModule, $sComponent)
    {
        switch ($sComponent)
        {
            case "Dashboard":
                $sReturn = (new GeneralController)->AdminDashboard();
                break;
            case "Categories":
                $sReturn = (new category)->index($sModule, $sComponent);
                break;
            default:
                return('nopage');
        }
        return ($sReturn);
    }
}
