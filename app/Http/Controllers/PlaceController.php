<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    /**
     * Places
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $places = Place::all();

        return response()->json([
            "place" => $places
        ], 200);
    }

    /**
     * Place
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $place = Place::whereId($id)->first();

        return response()->json([
            "place" => $place
        ], 200);
    }

    /**
     * Place
     * @param CreatePlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function new(CreatePlaceRequest $request)
    {
        $place = Place::create($request->only(["cemetery"]));

        return response()->json([
            "place" => $place
        ], 200);
    }

    /**
     * Update Place
     * @param StorePlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePlaceRequest $request)
    {

        $place = Place::whereId($request->id)->first();

        $place->title = $request->title;
        $place->cemetery_id = $request->cemetery_id;
        $place->comment = $request->comment;
        $place->price = $request->price;
        $place->lease_date = $request->lease_date;
        $place->seats = $request->seats;

        $place->save();

        return response()->json([
            "place" => $place
        ], 200);

    }

    /**
     * Delete Place
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $place = Place::whereId($id)->first();

        $place->delete();

        return response()->json([
            "place" => $place
        ], 200);

    }
}



