<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModelGenerator extends Controller
{
    public static function modelGenerate($data)
    {
        $content = view('template.model_template', ['tablename' => $data['tablename'], 'columns' => $data['columns']]);
        $path = app_path().'/Models/';
        $modelFile = $path . ucfirst(Str::camel(Str::singular($data['tablename']))) . '.php';
        if (file_put_contents($modelFile, $content) !== false) {
            return ['success' => "Model created (" . basename($modelFile) . ")"];
        }
    }
}
