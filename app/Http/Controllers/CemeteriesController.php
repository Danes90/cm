<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCemeteryRequest;
use Illuminate\Http\Request;
use App\Cemetery;

class CemeteriesController extends Controller
{
    /**
     * Cemeteries
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $cemeteries = Cemetery::all();

        return response()->json([
            "cemeteries" => $cemeteries
        ], 200);
    }

    /**
     * Cemetery
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $cemetery = Cemetery::whereId($id)->first();

        return response()->json([
            "cemetery" => $cemetery
        ], 200);
    }

    /**
     * New Cemetery
     * @param CreateCemeteryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function new(CreateCemeteryRequest $request)
    {
        $cemetery = Cemetery::create($request->only(["title", "address"]));

        return response()->json([
            "cemetery" => $cemetery
        ], 200);
    }

}
