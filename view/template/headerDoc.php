<?php
// Clases necesarias de PhpWord y el archivo de conexión
include_once "../vendor/autoload.php";
include_once '../app/config/conexion.php';

// Instancias de PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Iniciar la sesión y manejo de errores
session_start();
// error_reporting(0);

// Redireccionar si no hay una sesión válida
if ($_SESSION["s_usuario"] === null) {
  header("Location: ../index");
}

// Obtener variables de sesión
$rol = $_SESSION["s_rol"];
$user = $_SESSION["s_usuario"];
$fort =  $_SESSION["s_formatos"];

// Establecer la zona horaria y la configuración regional
date_default_timezone_set("America/Bogota");
setlocale(LC_TIME, "es_CO");

// Obtener la fechas
$fcha =  date("Y-m-d");
$dia =  date("d");
$mes =  date("B");
$año =  date("Y");
$fecha =  date("d" . " de " . "B" . " de " . "Y");

// Conectar a la base de datos
$objeto = new Conexion();
$conexion = $objeto->Conectar();


// Consultar datos de demandados
$consulta = "SELECT demandados_procesos.consecutivo, demandados.identificacion_ddo, demandados.nombre_ddo, demandados.representante_ddo, demandados.email_ddo FROM demandados_procesos INNER JOIN demandados ON demandados_procesos.demandado = demandados.identificacion_ddo WHERE demandados_procesos.consecutivo = '$consecutivo'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

// Consultar datos de clientes
$consulta1 = "SELECT clientes_procesos.consecutivo, terceros.identificacion, terceros.pnombre, terceros.snombre, terceros.papellido, terceros.sapellido, procesos.ident_fallecido, procesos.pnom_fallecido, procesos.snom_fallecido, procesos.papellido_fallecido, procesos.sapellido_fallecido, procesos.fecha_defuncion, procesos.pretension, procesos.radicado, terceros.fecha_expedicion, procesos.tipo, procesos.temaProceso, terceros.telefono, terceros.celular, terceros.direccion, terceros.nombre_referencia, terceros.celular_referencia, terceros.telefono_referencia, terceros.nombre_referencia1, terceros.celular_referencia1, terceros.telefono_referencia1,  terceros.correo_electronico, terceros.sede, terceros.eps, procesos.observaciones, terceros.personas_autorizadas, procesos.forma_pago, procesos.juzgado FROM clientes_procesos INNER JOIN terceros ON clientes_procesos.cliente = terceros.identificacion INNER JOIN procesos ON clientes_procesos.consecutivo=procesos.consecutivo WHERE clientes_procesos.consecutivo = '$consecutivo'";
$resultado1 = $conexion->prepare($consulta1);
$resultado1->execute();
$data1 = $resultado1->fetchAll(PDO::FETCH_ASSOC);

$demandados = count($data);
$clientes = count($data1);





?>