<?php

namespace App\Http\Controllers;
use App\Models\Bajet;
use Illuminate\Http\Request;

/**
 * Class BajetController
 * @package App\Http\Controllers\API
 */
class Bajet extends Controller
{
   
    /**
     * @param Request $request
     * @return Response
     * @OA\Get(
     *     path="/api/bajet",
     *     tags={"Bajet"},
     *     summary="Get list of Bajet",
     *     description="Get Bajet",
     *     @OA\Response(response=200, description="Bajet Module"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function index(Request $request)
    {
        
    }
