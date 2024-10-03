<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $viewData = [
            'title' => 'Home',
            'activePage' => 'home',
        ];
        return view('landing-page.home', $viewData);
    }

    public function accomodation(){
        $viewData = [
            'title' => 'Accomodation',
            'activePage' => 'accomodation',
        ];
        return view('landing-page.accomodation', $viewData);
    }

    public function commitee(){
        $viewData = [
            'title' => 'Commitee',
            'activePage' => 'commitee',
        ];
        return view('landing-page.commitee', $viewData);
    }

    public function generalInfo(){
        $viewData = [
            'title' => 'General Info',
            'activePage' => 'general-info',
        ];
        return view('landing-page.general-info', $viewData);
    }

    public function speakers(){
        $viewData = [
            'title' => 'Speakers',
            'activePage' => 'speakers',
        ];
        return view('landing-page.speakers', $viewData);
    }

    public function travel(){
        $viewData = [
            'title' => 'Travel',
            'activePage' => 'travel',
        ];
        return view('landing-page.travel', $viewData);
    }
}
