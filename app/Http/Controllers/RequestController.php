<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    public static function generateRequest($data)
    {
        $content = view('template.request_template', ['tablename' => $data['tablename'], 'columns' => $data['columns']]);
        $path = app_path().'/Http/Requests/';
        $modelFile = $path . ucfirst(Str::camel(Str::singular($data['tablename']))). "Requests" . '.php';
        if (file_put_contents($modelFile, $content) !== false) {
            return ['success' => "Request created (" . basename($modelFile) . ")"];
        }
    }
}
