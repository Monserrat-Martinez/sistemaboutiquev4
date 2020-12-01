<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/sistemaboutiquev4/api');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

$app->post('/login/{user}', function (Request $request, Response $response, array $args) {

    $data= json_decode($request->getBody()->getContents(), false);

    $user = DB::table('login')
    ->where('user', $args['user'])
    ->first();

    $msg = new stdClass();
    if ($user->pass == $data->password){
        $msg->aceptado = true;
        if($data->usuario == 'admin@gmail.com'){
            $msg->mensaje= true;
        }
        else{
            $msg->mensaje= false;
        }
    }
    else{
        $msg->aceptado = false;
    }

    $response->getBody()->write(json_encode($msg));
    return $response;
});

$app->post('/purchases', function (Request $request, Response $response, array $args) {
    
    $data= json_decode($request->getBody()->getContents(), false);

    DB::table('purchases')
    ->insert(['nombre' => $data->nombre, 'apellidos' => $data->apellidos,
        'direccion' => $data->direccion, 'email' => $data->email,
        'ciudad' => $data->ciudad]
    );
    

    $mensaje= new stdClass();
    
    if ($data->nombre == ""){
        $mensaje->ins = true;
    }
    else{
        $mensaje->ins = false;
    }

    $response->getBody()->write(json_encode($mensaje));
    return $response;
});

$app->post('/message', function (Request $request, Response $response, array $args) {
    
    $data= json_decode($request->getBody()->getContents(), false);

    DB::table('messages')
    ->insert(['recip' => $data->recip, 'messages' => $data->texto]
    );
    

    $mens= new stdClass();
    
    if ($data->recip == ""){
        $mens->men = true;
    }
    else{
        $mens->men = false;
    }

    $response->getBody()->write(json_encode($mens));
    return $response;
});

$app->post('/sign', function (Request $request, Response $response, array $args) {

    $data= json_decode($request->getBody()->getContents(), false);

    DB::table('login')
    ->insert(['user' => $data->user, 'pass' => $data->pass]
    );
    

    $login= new stdClass();
    
    if ($data->user == ""){
        $login->log = true;
    }
    else{
        $login->log = false;
    }

    $response->getBody()->write(json_encode($login));
    return $response;
});
// Run application
$app->run();