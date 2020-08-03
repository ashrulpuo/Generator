<?=
"<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class " . ucfirst(Str::camel(Str::singular($tablename))) . " extends Model
{
    use SoftDeletes;

    public \$table = '" . $tablename . "';

    public \$fillable = [
"?>
<?php 
    foreach ($columns as $i => $column) { 
        if($column != 'id' || $column != 'created_at' || $column != 'updated_at') {
                echo "\n\t\t'" . $column . "',";
        }
    } 
?>
<?="
    ];

    public static \$rules = [
        
"?><?php 
        foreach ($columns as $nullable) { 
        if($nullable != "id")
        {
            echo "\t\t'" . $nullable . "' => 'required',\n";
        } else {
            
        }
    } ?>
<?="
    ];

}
"?>