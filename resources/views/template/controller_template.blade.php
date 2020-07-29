<?=
"<?php

namespace App\Http\Controllers;
use App\Models\\" . ucfirst(Str::camel(Str::singular($tablename))) . ";
use Illuminate\Http\Request;

/**
 * Class " . ucfirst(Str::camel(Str::singular($tablename))) . "Controller
 * @package App\Http\Controllers\API
 */
class " . ucfirst(Str::camel(Str::singular($tablename))) . " extends Controller
{
   
    /**
     * @param Request \$request
     * @return Response
     * @OA\Get(
     *     path=\"/api/" . lcfirst(Str::singular(str_replace('_', '', $tablename))) . "\",
     *     tags={\"" . ucfirst(Str::singular(str_replace('_', '', $tablename))) . "\"},
     *     summary=\"Get list of " . ucfirst(str_replace('_', '', $tablename)) . "\",
     *     description=\"Get " . ucfirst(str_replace('_', '', $tablename)) . "\",
     *     @OA\Response(response=200, description=\"" . ucfirst(Str::singular(str_replace('_', '', $tablename))) . " Module\"),
     *     @OA\Response(response=400, description=\"Bad request\"),
     *     @OA\Response(response=404, description=\"Resource Not Found\"),
     * )
     */
    public function index(Request \$request)
    {
        
    }
"
?>
