<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ModelGenerator;
use App\Http\Controllers\RequestController;
use DB;

class GeneratorController extends Controller
{
    public function getTables()
    {
        $tables_in_db = DB::select('SHOW TABLES');
        $db = "Tables_in_salasilah" . env('DB_DATABASE');
        $tables = [];
        foreach ($tables_in_db as $table) {
            $tables[] = $table->{$db};
        }
        return view('generator', ['tables' => $tables]);
    }

    public function submitValue(Request $request)
    {
        $input = $request->all();
        $data = self::tableAndColumns($input);
        $content = view('template.controller_template', ['tablename' => $data['tablename'], 'columns' => $data['columns']]);
        $path = app_path().'/Http/Controllers/';
        $controllerFile = $path . ucfirst(Str::camel(Str::singular($data['tablename']))) . 'Controller.php';

        if (file_put_contents($controllerFile, $content) !== false) {
            $messageModel = ModelGenerator::modelGenerate($data);
            $messageRequest = RequestController::generateRequest($data);
            if(!empty($messageModel) && !empty($messageRequest)){
                return redirect()->route('getTables')->with('success', "File created (" . basename($controllerFile) . ")");
            }
        } else {
            return redirect()->route('getTables')->with('failed', "Cannot create file (" . basename($controllerFile) . ")");
        }
    }

    public static function tableAndColumns($input)
    {
        $tablename = $input['table'];
        $columns = DB::getSchemaBuilder()->getColumnListing($tablename);

        return ['tablename' => $tablename,'columns' => $columns];
    }
}
