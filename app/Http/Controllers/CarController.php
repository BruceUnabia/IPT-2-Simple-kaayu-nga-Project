<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Car;
use App\Models\CarPurchase;
use App\Models\User;
use App\Notifications\MailNotif;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'model' => 'required|string',
        'make' => 'required|string',
        'year' => 'required|integer',
        'description' => 'required|string',
    ]);

    $carData = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/car_images');
        $image->move($destinationPath, $imageName);
        $carData['image'] = "/car_images/" . $imageName;
    }

    $car = Car::create($carData);
    $user = auth()->user()->name;

    $log_entry = $user . " added a car \"" . $car->make . "\" with the ID #" . $car->id;
    event(new UserLog($log_entry));

    return redirect()->route('cars.index')->with('success', 'Car added successfully.');
}


    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'model' => 'required|string',
        'make' => 'required|string',
        'year' => 'required|integer',
        'description' => 'required|string',
    ]);

    $carData = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/car_images');
        $image->move($destinationPath, $imageName);
        $carData['image'] = "/car_images/" . $imageName;
    } else {
        $carData['image'] = $car->image;
    }

    $oldMake = $car->make;
    $oldModel = $car->model;
    $oldYear = $car->year;
    // $oldDescription = $car->description;

    $car->update($carData);


    $newMake = $car->make;
    $newModel = $car->model;
    $newYear = $car->year;
    // $newDescription = $car->description;

    $user = auth()->user()->name;

    $log_entry = $user . " updated the car from:
    Make: \"" . $oldMake . "\" to \"" . $newMake . "\",
    Model: \"" . $oldModel . "\" to \"" . $newModel . "\",
    Year: \"" . $oldYear . "\" to \"" . $newYear . "\",

    with the ID #" . $car->id;

    event(new UserLog($log_entry));

        return redirect()->route('cars.index')->with('success', 'Updated successfully.');
    }


    public function destroy(Car $car)
    {
        $car->delete();
        $user = auth()->user()->name;

        $log_entry = $user . " removed a car \"" . $car->model . "\" with the ID #" . $car->id;
        event(new UserLog($log_entry));

        return redirect()->route('cars.index')->with('error', 'leted successfully.');
    }

    public function buy(Request $request, Car $car)
    {
        $user = $request->user();

        if ($car->stocks <= 0) {
            return redirect()->route('cars.index')->with('error', 'Sorry, this car is out of stock.');
        }

        $car->decrement('stocks');

        $purchase = new CarPurchase();
        $purchase->user_id = $user->id;
        $purchase->car_id = $car->id;
        $purchase->purchase_date = now();
        $purchase->save();

        $mailNotif = [
            'body' => 'Purchase Confirmation',
            'enrollmentText' => 'Thank you for your purchase',
            'thankyou' => 'Thank you!',
            'car' => $car->make . ' ' . $car->model . ' (' . $car->year . ')',
            'purchaseDate' => now()->format('m/d/Y H:i:s'),
        ];

        $user->notify(new MailNotif($mailNotif));

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Purchase successful and receipt sent to your email.');
    }
}
