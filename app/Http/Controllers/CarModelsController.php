<?php


namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carModels = CarModel::all();
        return response()->json($carModels);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'odel_name' => 'required|string',
        ]);

        $car = Car::find($validatedData['car_id']);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $carModel = $car->carModels()->create($validatedData);

        if ($carModel) {
            return response()->json(['message' => 'Car Added successfully'], 201);
        } else {
            return response()->json(['message' => 'Something went wrong please try again'], 400);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carModel = CarModel::findOrFail($id);
        return response()->json($carModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'car_id' => 'exists:cars,id',
            'model_name' => 'string',
        ]);

        $carModel = CarModel::findOrFail($id);
        $carModel->update($validatedData);
        return response()->json($carModel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carModel = CarModel::findOrFail($id);
        $carModel->delete();

        return response()->json(['message' => 'Car model deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
