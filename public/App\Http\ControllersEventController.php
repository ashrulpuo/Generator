<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

/**
 * Class EventController
 * @package App\Http\Controllers\API
 */
class Event extends Controller
{
   
    /**
     * @param Request $request
     * @return Response
     * @OA\Get(
     *     path="/api/event",
     *     tags={"Event"},
     *     summary="Get list of Event",
     *     description="Get Event",
     *     @OA\Response(response=200, description="Event Module"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function index(Request $request)
    {
        
    }
