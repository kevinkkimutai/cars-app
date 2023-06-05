<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return response()->json($cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can return a view here to display the form for creating a new car
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'founded' => 'required|string',
            'description' => 'required|string',
        ]);

        $car = Car::create($validatedData);

        if($car) {
            return response()->json(['message' => 'Car Added successfully', 'car' => $car]);
        }else {

            return response()->json(['message' => 'Something went wrong please try again']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);

        return response()->json($car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);

        // You can return a view here to display the form for editing the car
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $validatedData = $request->validate([
             'name' => 'required|string',
             'founded' => 'required|string',
             'description' => 'required|string',
         ]);

         $car = Car::find($id);

         if ($car) {
             $car->update($validatedData);
             return response()->json(['message' => 'Car updated successfully', 'car' => $car]);
         } else {
             return response()->json(['message' => 'Car not found'], Response::HTTP_NOT_FOUND);
         }
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);

        if ($car) {
            $carName = $car->name; // Get the name of the deleted car
            $car->delete();

            return response()->json(['message' => 'Car '.$carName.' deleted successfully'])
    ->header('Content-Type', 'application/json; charset=utf-8');

        } else {
            return response()->json(['message' => 'Car not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
