<?php
require 'header2.php';
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '\config\database.php';
require __DIR__ . '\vendor\autoload.php';

$users = DB::table('messages')
->select('recip','messages')
->get();

echo <<<_TABLE
<table class="table" align='center'>
<thead>
    <tr>
        <th>Usuario</th>
        <th>Mensaje</th>
    </tr>
</thead>

<tbody>
_TABLE;

foreach($users as $fila){
echo <<<_ROW
        <tr>
            <th>$fila->recip</th>
            <th>$fila->messages</th>
        </tr>
_ROW;
}
