<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPurchase;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $carCount = Car::count();
        $userCount = User::count();
        $successfulCarPurchases = CarPurchase::count();

        return view('dashboard', compact('carCount', 'userCount', 'successfulCarPurchases'));
    }
}
