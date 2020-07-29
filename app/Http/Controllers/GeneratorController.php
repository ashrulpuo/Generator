<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $tablename = $input['table'];
        $columns = DB::getSchemaBuilder()->getColumnListing($tablename);
        $content = view('template.controller_template', ['tablename' => $tablename, 'columns' => $columns]);
        
        $controllerFile = 'App\Http\Controllers'. ucfirst(Str::camel(Str::singular($tablename))) . 'Controller.php';
        if (file_put_contents($controllerFile, $content) !== false) {
            return redirect()->route('getTables')->with('success', "File created (" . basename($controllerFile) . ")");
        } else {
            return redirect()->route('getTables')->with('failed', "Cannot create file (" . basename($controllerFile) . ")");
        }
    }
}
