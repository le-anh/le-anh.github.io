<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesFrontendIndexController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'slideShows' => SlideShowController::SlideShowActive(),
            'missions' => MissionController::MissionActive(),
            'productTypeSpecifications' => ProductTypeSpecificationController::ProductTypeSpecificationActive(),
            'services' => ServiceController::ServiceActive(),
            'image_actives' => ImageActiveController::ImageActive()
        ]);
    }
}
