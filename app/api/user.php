<?php
/**
 * Created by PhpStorm.
 * User: Przemek
 * Date: 11.10.2017
 * Time: 21:31
 */

$app->get('/api/user', function (){

    require_once('DBConnector.php');
    $obj = new DBConnector();
    echo $obj->getTable('users');

});

//$app->get('/api/user/{id}', function (\Slim\Http\Request $request){
//    require_once('DBConnector.php');
//    $id = $request->getAttribute('id');
//    $obj2 = new DBConnector();
//    $obj2->getRecordsByID('users', $id);
//});

//
$app->post('/api/user', function (\Slim\Http\Request $request){
  //  require_once('DBConnector.php');
   print_r($request->getParams());
});

//$app->put('/api/user/', function (\Slim\Http\Request $request){
//    require_once('DBConnector.php');
//    $name = $request->getParsedBody()['name'];
//    echo "test put ".$name;
//});