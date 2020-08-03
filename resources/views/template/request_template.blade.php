<?="
<?php

namespace App\Http\Requests;

use App\Models\\" . ucfirst(Str::camel(Str::singular($tablename))) . ";
use Illuminate\Foundation\Http\FormRequest;

class ". ucfirst(Str::camel(Str::singular($tablename))) ."Requests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return " . ucfirst(Str::camel(Str::singular($tablename))) . "::\$rules;
    }
}
"
?>

