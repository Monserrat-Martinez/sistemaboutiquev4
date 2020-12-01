<?php
require_once 'header2.php';
use Illuminate\Database\Capsule\Manager as DB;
require __DIR__ . '\config\database.php';
require __DIR__ . '\vendor\autoload.php';

$pur = DB::table('purchases')
->select('nombre','apellidos','direccion','email','ciudad')
->get();

echo <<<_TABLE
<table class="table" align='center'>
<thead>
    <tr>
        <th>ALUMNO</th>
        <th>APELLIDOS</th>
        <th>DIRECCION</th>
        <th>EMAIL</th>
        <th>CIUDAD</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th></th>
    </tr>
</tfoot>
<tbody>
_TABLE;

foreach($pur as $fila){
echo <<<_ROW
    <tr>
        <th>$fila->nombre</th>
        <th>$fila->apellidos</th>
        <th>$fila->direccion</th>
        <th>$fila->email</th>
        <th>$fila->ciudad</th>
    </tr>
_ROW;
}
echo "</tbody></table>";
?>