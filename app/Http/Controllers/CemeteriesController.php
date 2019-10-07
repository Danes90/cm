<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCemeteryRequest;
use App\Http\Requests\StoreCemeteryRequest;
use Illuminate\Http\Request;
use App\Cemetery;
use Symfony\Component\HttpKernel\HttpCache\Store;

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

    /**
     * Update Cemetery
     * @param StoreCemeteryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreCemeteryRequest $request){

        $cemetery = Cemetery::whereId($request->id)->first();

        $cemetery->title = $request->title;
        $cemetery->address = $request->address;

        $cemetery->save();

        return response()->json([
            "cemetery" => $cemetery
        ], 200);

    }

    /**
     * Delete Cemetery
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){

        $cemetery = Cemetery::whereId($id)->first();

        $cemetery->delete();

        return response()->json([
            "cemetery" => $cemetery
        ], 200);

    }


}
