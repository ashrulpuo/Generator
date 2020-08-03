<?=
"<?php

namespace App\Http\Controllers;
use App\Models\\" . ucfirst(Str::camel(Str::singular($tablename))) . ";
use App\Http\Requests\\" . ucfirst(Str::camel(Str::singular($tablename))) . "Requests;
use Illuminate\Http\Request;

/**
 * Class " . ucfirst(Str::camel(Str::singular($tablename))) . "Controller
 * @package App\Http\Controllers\API
 */
class " . ucfirst(Str::camel(Str::singular($tablename))) . "Controller extends Controller
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
        if (\$request->ajax()) {
            \$data = Bajet::select('*');

            return Datatables::of(\$data)
                ->addIndexColumn()
                ->addColumn('action', function (\$row) {
                    \$btn = '<a href=\"javascript:void(0)\" data-toggle=\"tooltip\"  data-id=\"' . \$row['id'] . '\" data-original-title=\"Edit\" class=\"edit btn btn-primary btn-sm bajetEdit\">Kemaskini</a>';
                    \$btn .= '<a href=\"javascript:void(0)\" data-toggle=\"tooltip\"  data-id=\"' . \$row['id'] . '\" data-original-title=\"delete\" class=\"edit btn btn-danger btn-sm bajetDelete\">Hapus</a>';
                    return \$btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('". $tablename . ".index', ['title' => 'Senarai " . $tablename ."']);
    }

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
    public function store(" . ucfirst(Str::camel(Str::singular($tablename))) . "Requests \$request)
    {
        \$input = \$request->all();
        if (empty(\$request->input('id'))) {
            try {
                if (" . ucfirst(Str::camel(Str::singular($tablename))) . "::create(\$input)) {
                    DB::commit();
                    return response()->json(['success' => 'Bajet berjaya didaftarkan']);
                }
            } catch (Exception \$e) {
                DB::rollback();
                throw \$e;
            }
        } else {
            \$id = ". ucfirst(Str::camel(Str::singular($tablename))) ."::where('id', \$request->input('id'))->get()->first();
            \$id->update(\$input);
            return response()->json(['success' => 'Bajet berjaya dikemaskini']);
        }
    }

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
    public function show(\$id)
    {
        /** @var " . ucFirst(Str::camel(Str::singular($tablename))) . " \$" . Str::camel($tablename) . " */
        \$" . Str::camel($tablename) . " = " . Str::camel(Str::singular($tablename)) . "::findWithoutFail(\$id);

        if (empty(\$" . Str::camel($tablename) . ")) {
            return response()->json(['error' => '" . Str::camel($tablename) . " not found']);
        }

        return response()->json(['error' => '" . Str::camel($tablename) . " retrieved successfully']);
    }

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
    public function destroy(\$id)
    {
        /** @var " . ucfirst(Str::camel($tablename)) . " \$" . Str::camel($tablename) . "  */
        \$" . Str::camel($tablename) . " = " . Str::camel(Str::singular($tablename)) . "::findWithoutFail(\$id);

        if (empty(\$" . Str::camel($tablename) . ")) {
            return response()->json(['error' => '" . Str::camel($tablename) . "not found']);
        }

        \$" . Str::camel($tablename) . "->delete();
        return response()->json(['error' => '" . Str::camel($tablename) . " deleted successfully']);
    }
}
"
?>
