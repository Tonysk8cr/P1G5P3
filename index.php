<?php
$controladorIndex = "ControladorIndex";
$metodoIndex = "Index";
$rutaIndex = __DIR__."/Controlador/{$controladorIndex}.php";
require_once $rutaIndex;
$indexCont = new $controladorIndex();

//rutas reales
$controller = isset($_GET['controller']) ? "Controlador".ucfirst($_GET['controller']) : "ControladorIndex";
$action = isset($_GET['action']) ? ucfirst($_GET['action']) : "Index";

//Ruta del server
$controllerFile = __DIR__."/Controlador/{$controller}.php";

//Verificacion
if(file_exists($controllerFile))
    require_once $controllerFile;

//Verificar el nombre de la clase del archivo
if(class_exists($controller)){
    $controlador = new $controller();
    if (method_exists($controlador, $action))
        $controlador->$action();
    else
        $indexCont->$metodoIndex();
}
else
    $indexCont->$metodoIndex();