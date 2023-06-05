<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CarModelModelsController extends Controller
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
        // You can return a view here to display the form for creating a new carModel
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

        $carModel = CarModel::create($validatedData);

        if($carModel) {
            return response()->json(['message' => 'CarModel Added successfully', 'carModel' => $carModel]);
        }else {

            return response()->json(['message' => 'Something went wrong please try again']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carModel = CarModel::findOrFail($id);

        return response()->json($carModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carModel = CarModel::findOrFail($id);

        // You can return a view here to display the form for editing the carModel
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

         $carModel = CarModel::find($id);

         if ($carModel) {
             $carModel->update($validatedData);
             return response()->json(['message' => 'CarModel updated successfully', 'carModel' => $carModel]);
         } else {
             return response()->json(['message' => 'CarModel not found'], Response::HTTP_NOT_FOUND);
         }
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carModel = CarModel::find($id);

        if ($carModel) {
            $carModelName = $carModel->name; // Get the name of the deleted carModel
            $carModel->delete();

            return response()->json(['message' => 'CarModel '.$carModelName.' deleted successfully'])
    ->header('Content-Type', 'application/json; charset=utf-8');

        } else {
            return response()->json(['message' => 'CarModel not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
