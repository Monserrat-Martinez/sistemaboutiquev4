<?php
require 'header2.php';
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '\config\database.php';
require __DIR__ . '\vendor\autoload.php';

$users = DB::table('login')
->select('user')
->get();

echo <<<_TABLE
<table class="table" align='center'>
<thead>
    <tr>
        <th>USUARIOS REGISTRADOS</th>
    </tr>
</thead>
<tbody>
_TABLE;

foreach($users as $fila){
echo <<<_ROW
    <tr>
        <th>$fila->user</th>
    </tr>
_ROW;
}

echo "</tbody></table>
<a class='button' href='header2.php'></a>";