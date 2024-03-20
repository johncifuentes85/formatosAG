<?php
require_once "template/headerDoc.php";

// Establecer variables consecutivo y el nombre del formato
$consecutivo = "2022-9999";
$dp_formatos = "1. ADMISION DEMANDA ADMIN";

$section = $phpWord->addSection(["paperSize" => "Legal"]);

$header = $section->addHeader();

$header->addWatermark("../img/img.jpg", [
  "width" => 50,
]);
$header->addText('ACEVEDO GALLEGO', array('name' => 'Arial Narrow', 'size' => 15, 'bold' => true), array('align' => 'right', 'spaceAfter' => 5));
$header->addText('Asesorías Jurídicas', array('name' => 'Arial Narrow', 'size' => 15, 'bold' => true), array('align' => 'right', 'spaceAfter' => 5));
$header->addText($consecutivo . '-' . $user . '-' . $fcha, array('name' => 'Arial Narrow', 'size' => 8), array('align' => 'right', 'spaceAfter' => 5));

$footer = $section->addFooter();
$footer->addText('Sede Administrativa - Carrera 46 N° 45 - 9 - PBX: 322 4212 - E-mail: logistica@acevedogallegoabogados.com ', array('name' => 'Arial Narrow', 'size' => 10), array('align' => 'center', 'spaceAfter' => 5));
$footer->addText('Medellín - Antioquia', array('name' => 'Arial Narrow', 'size' => 10), array('align' => 'center', 'spaceAfter' => 5));

if ($dp_formatos === '1. ADMISION DEMANDA ADMIN') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD ESTUDIO DE ADMISIBILIDAD DEL MEDIO DE CONTROL", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado judicial en el proceso de la referencia, por medio del presente escrito, solicito respetuosamente al Despacho, se proceda con el estudio de admisibilidad del medio de control presentado, de conformidad con los requisitos exigidos en el artículo 162 del CPCA, en consideración a que ya ha corrido un tiempo prudente desde su radicación y/o subsanación, sin que a la fecha medie actuación alguna.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Entendemos sinceramente la situación de sobre carga laboral que sufren actualmente todos los Jueces de la República, pero es también entendible la angustia y preocupación constante de mi cliente quien continuamente indaga sobre el avance de su proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText();
  $section->addText("Agradeciéndoles la atención prestada a esta solicitud.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '2. SUBSANA DDA Y REQUERIMIENTOS ADMIN') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));


  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SUBSANA REQUISITOS", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", obrando en calidad de apoderado judicial en el proceso de la referencia, dando cumplimiento a lo REQUERIDO por su despacho mediante auto que antecede y encontrándome dentro del término legal consagrado en el artículo 170 del CPACA, me permito subsanar y/o cumplir el requerimiento solicitado de la siguiente manera:", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("1.	“(                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText("R/: (                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText("2.	“(                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText("R/: (                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText("3.	“(                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText("R/: (                )”,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Ahora bien, cumplidos los requerimientos dentro del término procesal oportuno, solicito respetuosamente al Despacho proceda con el procedimiento legal pertinente.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el numeral 8º del artículo 162 del CPACA adicionado por el artículo 35 de la ley 2080 de 2021, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el numeral 8º del artículo 162 del CPACA adicionado por el artículo 35 de la ley 2080 de 2021, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el numeral 8º del artículo 162 del CPACA adicionado por el artículo 35 de la ley 2080 de 2021, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data1[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el numeral 8º del artículo 162 del CPACA adicionado por el artículo 35 de la ley 2080 de 2021, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el numeral 8º del artículo 162 del CPACA adicionado por el artículo 35 de la ley 2080 de 2021, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '3. NOT. ENT. PÚBLICAS MC ANJE') {
  for ($i = 0; $i <= $demandados - 1; $i++) {
    // Adding Text element to the Section having font styled by default...          
    $section->addText("NOTIFICACIÓN PERSONAL", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 5));
    $section->addText("AGENCIA NACIONAL PARA LA DEFENSA JURÍDICA DEL ESTADO", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));
    $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 230));
    $section->addText("HACE SABER:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true,), array('align' => 'center', 'spaceAfter' => 5));
 
    $section->addText();
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    $textrun->addText("Al(la) Doctor(a) CAMILO GÓMEZ ALZATE en calidad de Representante Legal de la ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText('AGENCIA NACIONAL DE LA DEFENSA JURÍDICA DEL ESTADO', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText(", y/o quien haga sus veces al momento de la notificación, que conforme el artículo 199 del CPACA modificado por el artículo ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText('48 de la ley 2080 ', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText("de 2021 dispone que:", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun = $section->addTextRun();

    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText('“El auto admisorio de la demanda y el mandamiento ejecutivo contra las entidades públicas y las personas privadas que ejerzan funciones públicas, se deben notificar personalmente a sus representantes legales o a quienes estos hayan delegado la facultad de recibir notificaciones, o directamente a las personas naturales, según el caso, y al Ministerio Público; mediante mensaje dirigido al buzón electrónico para notificaciones judiciales a que se refiere el artículo 197 de este código.', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText('(…)', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText('El traslado o los términos que conceda el auto notificado solo se empezarán a contabilizar a los dos (2) días hábiles siguientes al del envío del mensaje y el término respectivo empezará a correr a partir del día siguiente.”.', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));

    $section->addText();
    $section->addText("La disposición anterior, fue modificada de conformidad con lo dispuesto en el artículo 8° del Ley 2213 de 2022, el cual establece:", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText('“Artículo 8. Notificaciones personales.', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText('(…)', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));   
    $celda->addText('La notificación personal se entenderá realizada una vez transcurridos dos días hábiles siguientes al envío del mensaje y los términos empezarán a correr a partir del día siguiente al de la notificación.', array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));

    $section->addText();
    // Add text run
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    if ($clientes == "1") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "2") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . " Y " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "3") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . " Y " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "4") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . " Y " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "5") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . " Y " . $data1[4]['pnombre'] . " " . $data1[4]['snombre'] . " " . $data1[4]['papellido'] . " " . $data1[4]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    }

    if ($demandados == "1") {
      $textrun->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "2") {
      $textrun->addText($data[0]['nombre_ddo'] . " Y " . $data[1]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "3") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . " Y " . $data[2]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "4") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . " Y " . $data[3]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "5") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . ", " . $data[3]['nombre_ddo'] . " Y " . $data[4]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    }

    $textrun->addText(", que cursa en este despacho bajo el radicado único nacional No. " . $data1[0]['radicado'] . ", para que en el término de TREINTA (30) días, ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText('contados a partir del día en que se entienda surtida la notificación conforme a las normas transcritas', array('underline' => 'single', 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText(", proceda a darle respuesta a través de apoderado judicial en los términos del artículo 172 del CPACA.", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun = $section->addTextRun();

    $section->addText("Se fija la presente notificación personal al correo electrónico autorizado: Notificaciones Judiciales notificacionesjudiciales@defensajuridica.gov.co", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText();

    $section->addImage('../img/firma.jpg', array('width' => 80,));
    $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

    if ($i < $demandados - 1) {
      $section->addPageBreak();
    }
  }
} else if ($dp_formatos === '4. NOT. ENT. PUBLICAS MC PROCURADOR') {
  for ($i = 0; $i <= $demandados - 1; $i++) {
    $section->addText("NOTIFICACIÓN PERSONAL", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 5));
    $section->addText("MINISTERIO PÚBLICO – PROCURADOR Nº____JUDICIAL DELEGADO ANTE EL  ", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));
    $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 230));
    $section->addText("HACE SABER:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true,), array('align' => 'center', 'spaceAfter' => 5));

    $section->addText();

    // Add text run
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    $textrun->addText("Al(la) Doctor(a) ____________________________ en calidad de", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    $textrun->addText(" PROCURADOR JUDICIAL DELEGADO ", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'both', 'spaceAfter' => 5));
    $textrun->addText("ante este Despacho, como representante del ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    $textrun->addText("MINISTERIO PÚBLICO", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'both', 'spaceAfter' => 5));
    $textrun->addText(", y/o quien haga sus veces al momento de la notificación, que conforme el artículo 199 del CPACA modificado por el artículo 48 de la ley 2080 de 2021 dispone que:", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda->addText("", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 80));
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText("“El auto admisorio de la demanda y el mandamiento ejecutivo contra las entidades públicas y las personas privadas que ejerzan funciones públicas, se deben notificar personalmente a sus representantes legales o a quienes estos hayan delegado la facultad de recibir notificaciones, o directamente a las personas naturales, según el caso, y al Ministerio Público; mediante mensaje dirigido al buzón electrónico para notificaciones judiciales a que se refiere el artículo 197 de este código.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText("(…)", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText("El traslado o los términos que conceda el auto notificado solo se empezarán a contabilizar a los dos (2) días hábiles siguientes al del envío del mensaje y el término respectivo empezará a correr a partir del día siguiente.”.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));

    $section->addText();
    $section->addText("La disposición anterior, fue modificada de conformidad con lo dispuesto en el artículo 8° de la Ley 2213 de 2022, el cual establece: ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda->addText("", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText("Artículo 8. Notificaciones personales.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));
    $celda->addText("(…)", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));
    $celda->addText("La notificación personal se entenderá realizada una vez transcurridos dos días hábiles siguientes al envío del mensaje y los términos empezarán a correr a partir del día siguiente al de la notificación.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();

    // Add text run
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    if ($clientes == "1") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "2") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . " Y " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "3") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . " Y " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "4") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . " Y " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "5") {
      $textrun->addText("En consecuencia, se remite copia de expediente digital de la demanda instaurada con sus anexos y del auto por medio del cual se ADMITE LA DEMANDA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . " Y " . $data1[4]['pnombre'] . " " . $data1[4]['snombre'] . " " . $data1[4]['papellido'] . " " . $data1[4]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    }

    if ($demandados == "1") {
      $textrun->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "2") {
      $textrun->addText($data[0]['nombre_ddo'] . " Y " . $data[1]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "3") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . " Y " . $data[2]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "4") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . " Y " . $data[3]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "5") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . ", " . $data[3]['nombre_ddo'] . " Y " . $data[4]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    }

    $textrun->addText(", que cursa en este despacho bajo el radicado único nacional No. " . $data1[0]['radicado'] . ", para que en el término de TREINTA (30) días, ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText('contados a partir del día en que se entienda surtida la notificación conforme a las normas transcritas', array('underline' => 'single', 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText(", proceda a darle respuesta a través de apoderado judicial en los términos del artículo 172 del CPACA. ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun = $section->addTextRun();

    $section->addText("Se fija la presente notificación personal al correo electrónico autorizado: Notificaciones Judiciales procjudadm(numero de procurador)@procuraduria.gov.co", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));


    $section->addText();
    $section->addImage('../img/firma.jpg', array('width' => 80,));
    $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  

    if ($i < $demandados - 1) {
      $section->addPageBreak();
    }
  }
} else if ($dp_formatos === '5. NOT. ENT. PUBLICAS MC') {
  for ($i = 0; $i <= $demandados - 1; $i++) {
    $section->addText("NOTIFICACIÓN PERSONAL", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 5));
    $section->addText();
    $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 230));
    $section->addText("HACE SABER:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true,), array('align' => 'center', 'spaceAfter' => 5));

    $section->addText();
    $section->addText("Al(la) Doctor(a) " . $data[$i]['representante_ddo'] . " en calidad de Representante Legal de " . $data[$i]['nombre_ddo'] . ", y/o quien haga sus veces al momento de la notificación, que conforme el artículo 199 del CPACA modificado por el artículo 48 de la ley 2080 de 2021 dispone que:", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda->addText("", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 80));
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText("“El auto admisorio de la demanda y el mandamiento ejecutivo contra las entidades públicas y las personas privadas que ejerzan funciones públicas, se deben notificar personalmente a sus representantes legales o a quienes estos hayan delegado la facultad de recibir notificaciones, o directamente a las personas naturales, según el caso, y al Ministerio Público; mediante mensaje dirigido al buzón electrónico para notificaciones judiciales a que se refiere el artículo 197 de este código.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText("(…)", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
    $celda->addText("El traslado o los términos que conceda el auto notificado solo se empezarán a contabilizar a los dos (2) días hábiles siguientes al del envío del mensaje y el término respectivo empezará a correr a partir del día siguiente.”.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));

    $section->addText();
    $section->addText("La disposición anterior, fue modificada de conformidad con lo dispuesto en el artículo 8° de la Ley 2213 de 2022, el cual establece: ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1000); # Agregar celda
    $celda->addText("", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $celda = $tabla->addCell(7500); # Agregar celda
    $celda->addText("Artículo 8. Notificaciones personales.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));
    $celda->addText("(…)", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));
    $celda->addText("La notificación personal se entenderá realizada una vez transcurridos dos días hábiles siguientes al envío del mensaje y los términos empezarán a correr a partir del día siguiente al de la notificación.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();

    // Add text run
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    if ($clientes == "1") {
      $textrun->addText("En consecuencia, se limita a la remisión digital del AUTO ADMISORIO de la demanda, de conformidad con lo reglado en el inciso 2º del numeral 8º del artículo 162 del CPACA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "2") {
      $textrun->addText("En consecuencia, se limita a la remisión digital del AUTO ADMISORIO de la demanda, de conformidad con lo reglado en el inciso 2º del numeral 8º del artículo 162 del CPACA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . " Y " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "3") {
      $textrun->addText("En consecuencia, se limita a la remisión digital del AUTO ADMISORIO de la demanda, de conformidad con lo reglado en el inciso 2º del numeral 8º del artículo 162 del CPACA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . " Y " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "4") {
      $textrun->addText("En consecuencia, se limita a la remisión digital del AUTO ADMISORIO de la demanda, de conformidad con lo reglado en el inciso 2º del numeral 8º del artículo 162 del CPACA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . " Y " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($clientes == "5") {
      $textrun->addText("En consecuencia, se limita a la remisión digital del AUTO ADMISORIO de la demanda, de conformidad con lo reglado en el inciso 2º del numeral 8º del artículo 162 del CPACA, dentro del proceso promovido por " . $data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'] . ", " . $data1[1]['pnombre'] . " " . $data1[1]['snombre'] . " " . $data1[1]['papellido'] . " " . $data1[1]['sapellido'] . ", " . $data1[2]['pnombre'] . " " . $data1[2]['snombre'] . " " . $data1[2]['papellido'] . " " . $data1[2]['sapellido'] . ", " . $data1[3]['pnombre'] . " " . $data1[3]['snombre'] . " " . $data1[3]['papellido'] . " " . $data1[3]['sapellido'] . " Y " . $data1[4]['pnombre'] . " " . $data1[4]['snombre'] . " " . $data1[4]['papellido'] . " " . $data1[4]['sapellido'] . ", en contra de ", array('name' => 'Arial Narrow', 'size' => 12));
    }

    if ($demandados == "1") {
      $textrun->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "2") {
      $textrun->addText($data[0]['nombre_ddo'] . " Y " . $data[1]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "3") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . " Y " . $data[2]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "4") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . " Y " . $data[3]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    } else if ($demandados == "5") {
      $textrun->addText($data[0]['nombre_ddo'] . ", " . $data[1]['nombre_ddo'] . ", " . $data[2]['nombre_ddo'] . ", " . $data[3]['nombre_ddo'] . " Y " . $data[4]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12));
    }

    $textrun->addText(", que cursa en este despacho bajo el radicado único nacional No. " . $data1[0]['radicado'] . ", para que en el término de TREINTA (30) días, ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText('contados a partir del día en que se entienda surtida la notificación conforme a las normas transcritas', array('underline' => 'single', 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText(", proceda a darle respuesta a través de apoderado judicial en los términos del artículo 172 del CPACA. ", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun = $section->addTextRun();

    $section->addText("Se fija la presente notificación personal al correo electrónico autorizado: Notificaciones Judiciales -". $data[$i]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));


    $section->addText();
    $section->addImage('../img/firma.jpg', array('width' => 80,));
    $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

    if ($i < $demandados - 1) {
      $section->addPageBreak();
    }
  }
} else if ($dp_formatos === '6. ENVIO DE NOTIFICACION') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("CONSTANCIA ENVÍO DE NOTIFICACIÓN", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente y atendiendo a lo establecido en el artículo 199 del CPACA modificado por el artículo 48 de la ley 2080 de 2021 concordado con el artículo 8º del Ley 2213 de 2022, me permito adjuntar constancia de envío y mail track, de la notificación personal realizada a la dirección electrónica de la parte pasiva de la Litis, afirmando bajo la gravedad del juramento que corresponden al(los) utilizado(s) por la(los) demandado(s), obtenidos de la página Web y/o de los certificados de cámara de comercio.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("La notificación se remitió junto con copia del de la demanda, sus anexos y auto que admite la misma.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText();
  $section->addText("De acuerdo con lo anterior y por cumplirse con los requisitos de Ley, solicito respetuosamente a la judicatura tenga por notificada a(los) demandado(s) y continúe con el trámite del proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '7. SOLICITUD EMPLAZAMIENTO') {
  for ($m = 0; $m <= $demandados - 1; $m++) {
    // Adding Text element to the Section having font styled by default...
    $section->addText();
    $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
    $section->addText();
    $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
    $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
    $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1800); # Agregar celda
    $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
    $celda = $tabla->addCell(); # Agregar celda
    $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

    // muestra los demandantes
    for ($i = 0; $i <= $clientes - 1; $i++) {
      $r = $i + 1;
      if ($clientes == 1) {
        $tabla = $section->addTable();
        $tabla->addRow(); # Agregar fila
        $celda = $tabla->addCell(1800); # Agregar celda
        $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
        $celda = $tabla->addCell(); # Agregar celda
        $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
      } else {
        $tabla = $section->addTable();
        $tabla->addRow(); # Agregar fila
        $celda = $tabla->addCell(1800); # Agregar celda
        $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
        $celda = $tabla->addCell(); # Agregar celda
        $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
      }
    }

    for ($i = 0; $i <= $demandados - 1; $i++) {
      $r = $i + 1;
      if ($demandados == 1) {
        $tabla = $section->addTable();
        $tabla->addRow(); # Agregar fila
        $celda = $tabla->addCell(1800); # Agregar celda
        $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
        $celda = $tabla->addCell(); # Agregar celda
        $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
      } else {
        $tabla = $section->addTable();
        $tabla->addRow(); # Agregar fila
        $celda = $tabla->addCell(1800); # Agregar celda
        $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
        $celda = $tabla->addCell(); # Agregar celda
        $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
      }
    }

    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1800); # Agregar celda
    $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
    $celda = $tabla->addCell(); # Agregar celda
    $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

    $section->addText();
    $tabla = $section->addTable();
    $tabla->addRow(); # Agregar fila
    $celda = $tabla->addCell(1800); # Agregar celda
    $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
    $celda = $tabla->addCell(); # Agregar celda
    $celda->addText("SOLICITUD DE EMPLAZAMIENTO", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

    $section->addText();
    // Add text run
    $textrun = $section->addTextRun([
      'align' => 'both',
      'spaceAfter' => 0,
    ]);

    $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
    $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado judicial dentro del proceso de la referencia, por medio del presente escrito me dirijo al despacho con el fin de solicitar el EMPLAZAMIENTO del " . $data[$m]['nombre_ddo'] . ", toda vez que, se desconoce el canal digital de notificación de la persona de derecho privado codemandada, ello a la luz de lo dispuesto en el artículo 200 de la ley 1437 de 2011, en armonía con el artículo 293 del CGP.", array('name' => 'Arial Narrow', 'size' => 12));
    $textrun = $section->addTextRun();

    $section->addText("Conforme con lo anterior, requiero de manera respetuosa a la judicatura que de acuerdo con
    lo establecido en el artículo 10 de la ley 2213 de 2022, se incluya al demandado en el registro nacional de personas emplazadas y se nombre curador ad Litem, para así continuar con el trámite del proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

    $section->addText();
    $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText();

    $section->addImage('../img/firma.jpg', array('width' => 80,));
    $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

    $section->addText();
    $section->addText();
    if ($demandados == "1") {
      $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    } else if ($demandados == "2") {
      $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    } else if ($demandados == "3") {
      $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    } else if ($demandados == "4") {
      $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    } else if ($demandados == "5") {
      $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
    }
    if ($m < $demandados - 1) {
      $section->addPageBreak();
    }
  }
} else if ($dp_formatos === '8. SOLICITUD NOMBRAMIENTO CURADOR AD-LITEM') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD NOMBRAMIENTO CURADOR AD-LITEM", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado judicial dentro del proceso de la referencia, por medio del presente escrito me dirijo al despacho, con el fin de solicitar el nombramiento y/o reemplazo de curador ad-litem con la finalidad de que ejerza la representación judicial de la parte emplazada previamente, en los términos del numeral 7° del artículo 48 del CGP en armonía con el artículo 10º de la ley 2213 de 2022. ", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '9. TELEGRAMA PARA CURADOR ADLITEM') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Doctor(a)', array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('(nombre curador)', array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("TELEGRAMA NOTIFICACIÓN NOMBRAMIENTO CURADOR AD-LITEM", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado judicial dentro del proceso de la referencia, por medio del presente escrito me permito notificarlo del nombramiento como curador ad-litem en el proceso relacionado, lo anterior en cumplimiento de lo dispuesto en artículo 49 del C.G.P. el cual establece:", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1000); # Agregar celda
  $celda->addText("", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 80));
  $celda = $tabla->addCell(7500); # Agregar celda
  $celda->addText("ARTÍCULO 49. COMUNICACIÓN DEL NOMBRAMIENTO, ACEPTACIÓN DEL CARGO Y RELEVO DEL AUXILIAR DE LA JUSTICIA. El nombramiento del auxiliar de la justicia se le comunicará por telegrama enviado a la dirección que figure en la lista oficial, o por otro medio más expedito, o de preferencia a través de mensajes de datos. De ello se dejará constancia en el expediente. En la comunicación se indicará el día y la hora de la diligencia a la cual deba concurrir el auxiliar designado. En la misma forma se hará cualquier otra comunicación.", array('name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));
  $celda->addText("El cargo de auxiliar de la justicia es de obligatoria aceptación para quienes estén inscritos en la lista oficial. Siempre que el auxiliar designado no acepte el cargo dentro de los cinco (5) días siguientes a la comunicación de su nombramiento, se excuse de prestar el servicio, no concurra a la diligencia, no cumpla el encargo en el término otorgado, o incurra en causal de exclusión de la lista, será relevado inmediatamente.", array('underline' => 'single', 'name' => 'Arial Narrow', 'size' => 10, 'italic' => true), array('align' => 'both', 'spaceAfter' => 80));

  $section->addText();
  $section->addText("Para brindar celeridad al trámite procesal, en caso de no encontrarse dentro de la causal de excusión, se remite copia de la demanda, sus anexos, auto que admite y auto que designa como curador ad-litem, para que brinde la representación judicial correspondiente, dándose notificado por conducta concluyente. ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 180));

  $section->addText("En caso de encontrar improcedente la notificación por conducta concluyente, le solicito respetuosamente tomar posesión del cargo a través de los canales digitales dispuestos por el despacho judicial o acudiendo de forma presencial en la secretaría del Juzgado correspondiente. ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 180));

  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 180));

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
} else if ($dp_formatos === '10. CONSTANCIA ENVIO DE TELEGRAMA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("CONSTANCIA ENVÍO DE TELEGRAMA DE NOMBRAMIENTO A CURADOR", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente y atendiendo a lo establecido en el Ley 2213 de 2022, me permito adjuntar constancia de envío y mail track, del telegrama enviado al curador ad-litem designado por el juzgado, en cumplimiento de lo dispuesto en el artículo 49 del CGP.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("La notificación se remitió junto con copia del de la demanda, sus anexos y auto que admite la misma.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 150));

  $section->addText("De acuerdo con lo anterior y por cumplirse con los requisitos de Ley, solicito respetuosamente a la judicatura tenga por notificada a(los) demandado(s) y continúe con el trámite del proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 150));

  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText();

  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '11. SOLICITUD FECHA DE AUDIENCIA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 200));

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("ESTUDIO DE ADMISIBILIDAD DE CONTESTACIONES Y FIJACIÓN DE FECHA DE AUDIENCIA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 200));

  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", abogado titulado, identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, solicito respetuosamente al despacho, en primer lugar se revise la admisibilidad de la(s) contestaciones de demanda en los términos del artículo 175 del CPACA, allegadas por medios virtuales y se permita compartir las mismas a nuestro canal digital logistica@acevedogallegoabogados.com, imponiendo la sanción correspondiente en caso de haber sido extemporánea o no haberse presentado.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("De igual forma, de haber sido presentada alguna excepción previa, solicito se disponga correr traslado, de conformidad con lo previsto en el artículo 201A por el término de tres (3) días, para el respectivo pronunciamiento, decretando las pruebas que de ellas se hubieren solicitado. ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Consecuencialmente, solicito se  fije fecha para llevar acabo la AUDIENCIA INICIAL reglada en el artículo 180 de la ley 1437 de 2011, esto es, de SANEAMIENTO, DECISIÓN DE EXCEPCIONES PREVIAS, FIJACIÓN DEL LITIGIO, POSIBILIDAD DE CONCILIACIÓN, MEDIDAS CAUTELARES Y DECRETO DE PRUEBAS. ", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Agradeciéndole la colaboración brindada,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 180));

  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '12. REPROGRAMACION FECHA DE AUDIENCIA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD REPROGRAMACIÓN FECHA DE AUDIENCIA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", abogado titulado, identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, solicito respetuosamente al despacho, sea REPROGRAMADA la audiencia anteriormente fijada, dado que la misma no fue celebrada y a la fecha no media reprogramación al respecto.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Entendemos sinceramente la situación de sobre carga laboral que sufren actualmente todos los Jueces de la República, pero es también entendible la angustia y preocupación contante de mi cliente quien continuamente indaga sobre el avance de su proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Agradeciéndole la colaboración brindada,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '13. SOLICITUD FECHA DE SENTENCIA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD FECHA DE SENTENCIA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", abogado titulado, identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, solicito respetuosamente al despacho, sea programada la fecha para DICTAR SENTENCIA de medio de control instaurado notificando la misma conformo lo reglado en el artículo 203 del CPACA, lo anterior en razón a que, en la AUDIENCIA DE PRUEBAS celebrada con antelación, fue prescindida por el juzgador la AUDIENCIA DE ALEGACIONES Y JUZGAMIENTO, por considerarla innecesaria, y ya se encuentran precluidos los términos legales de diez (10) días para la presentación de alegatos, y de veinte (20) días para dictar sentencia de que trata el inciso 2º del artículo 181 del CPACA. ", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Entendemos sinceramente la situación de sobre carga laboral que sufren actualmente todos los Jueces de la República, pero es también entendible la angustia y preocupación contante de mi cliente quien continuamente indaga sobre el avance de su proceso.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Agradeciéndole la colaboración brindada,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '14. SOLICITUD APLAZAMIENTO DE AUDIENCIA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD APLAZAMIENTO DE AUDIENCIA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", abogado titulado, identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, solicito respetuosamente al despacho, sea APLAZADA la audiencia previamente programada, en consideración a (___________) para el efecto allego prueba sumaria que justifica la solicitud impetrada.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Agradeciéndole la colaboración brindada,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '15. IMPULSO EN TRIBUNAL') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('M.P. Dr(a). MAGISTRADO PONENTE', array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("IMPULSO PROCESAL - SOLICITUD DE CORRER TRASLADO PARA ALEGAR Y FIJAR FECHA PARA EMITIR SENTENCIA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, me dirijo respetuosamente a ustedes por solicitud de mi poderdante, quien actualmente se encuentra atravesando una difícil situación de salud y económica, para que de conformidad con lo dispuesto en el numeral 5º del artículo 247 del CPACA disponga el inicio del término de traslado por diez (10) días para presentar alegaciones y consecuencialmente se dicte sentencia dentro de los veinte (20) días siguientes conforme lo dispone el numeral 7º ibidem.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Entendemos sinceramente la situación de sobre carga laboral que sufren actualmente todos los Jueces de la República, y en especial los Tribunales, pero es también entendible la angustia y preocupación de mi mandante quien ve en este proceso una esperanza para mejorar su calidad de vida.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '16. RECURSO DE UNIFICACIÓN DE JURISPRUDENCIA') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('M.P. Dr(a). MAGISTRADO PONENTE', array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("RECURSO DE UNIFICACIÓN DE JURISPRUDENCIA ", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(" identificado como aparece al pie de mi respectiva firma, en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, y obrando dentro de los diez (10) días siguientes a la ejecutoria de la providencia anteriormente dictada conforme lo estipula el artículo 261 del CPACA, me permito interponer RECURSO EXTRAORDINARIO DE UNIFICACIÓN DE JURISPRUDENCIA contra la sentencia de segunda instancia proferida, en consideración a la oposición abierta contra la postura unificada por el Consejo de Estado en el tema de debate, de conformidad con lo reglado en los artículos 256 y siguientes de la ley 1437 de 2011, el cual, pasa a sustentarse de la siguiente manera:", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText();
  $section->addText("1. LA DESIGNACIÓN DE LAS PARTES.", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));

  $section->addText();
  $section->addText("2. LA INDICACIÓN DE LA PROVIDENCIA IMPUGNADA.", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));

  $section->addText();
  $section->addText("3. LA RELACIÓN CONCRETA, BREVE Y SUCINTA DE LOS HECHOS EN LITIGIO.", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));

  $section->addText();
  $section->addText("4.	LA INDICACIÓN PRECISA DE LA SENTENCIA DE UNIFICACIÓN JURISPRUDENCIAL QUE SE ESTIMA CONTRARIADA Y LAS RAZONES QUE LE SIRVEN DE FUNDAMENTO.", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));

  $section->addText();
  $section->addText("5.	SUSPENSION DE LA SENTENCIA RECURRIDA", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'center', 'spaceAfter' => 50));

  $section->addText();
  $section->addText("En mi condición de apelante único, solicito se suspenda el cumplimiento de la providencia recurrida, para lo cual, requiero se ordene prestar caución en los términos del artículo 264 de la ley 1437 de 2011.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Por lo anteriormente expuesto solicito se ADMITA el recurso interpuesto y sea remitido el expediente al Consejo de Estado para someterlo a reparto en la sección que corresponda.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '17. SOLICITUD AUTO DE CUMPLASE') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD AUTO DE CÚMPLASE, LIQUIDACIÓN DE COSTAS Y EXPEDICIÓN DE COPIAS AUTÉNTICAS", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", abogado titulado, identificado como aparece al pie de mi respectiva firma, obrando en calidad de apoderado dentro del proceso de la referencia, por medio del presente escrito, solicito respetuosamente al despacho, se dicte auto de obedecimiento a lo dispuesto por el superior conforme al artículo 305 del CGP, se disponga la liquidación de costas respectiva y la expedición de copias auténticas.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Lo anterior en consideración a que en el sistema de consulta judicial, registra que el proceso ya fue devuelto por parte del superior, sin que a la fecha medie actuación alguna.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 0));

  $section->addText();
  $section->addText("Agradeciéndole la colaboración brindada,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '18. SOLICITUD COPIAS AUTENTICAS') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD EXPEDICIÓN DE COPIAS AUTÉNTICAS", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", identificado como aparece al pie de mi firma actuando como apoderado de la parte demandante en el proceso de la referencia, por medio del presente solicito respetuosamente al Despacho se ordene y se autorice la expedición a mi costa de copias auténticas de las siguientes piezas procesales con constancia que son primeras copias y que prestan merito ejecutivo.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("1. Poder conferido.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("2. Copia del auto admisorio de la demanda.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("3. Copias de la sentencia de primera y segunda instancia y/o casación.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("4. Copia del auto que ordena cumplir lo resuelto por el superior.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("5. Copia del auto de liquidación de costas.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("5. Del auto que ordena su archivo y el que aprueba la expedición de copias auténticas.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("6. Copia de los demás documentos y autos que se fueron dictados en las instancias, y que sean necesarios para el cobro jurídico ante las demandadas vencidas en juicio.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  $section->addText("7. Constancia secretarial de vigencia de poder conferido y de ser primeras copias con mérito ejecutivo.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText("Hago la anterior petición con el fin de presentar por medio de los mismos cuenta de cobro ante las entidades demandadas; de igual forma autorizo a las estudiantes de derecho ", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText('SOFIA VELEZ MOSCOSO', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", identificada con cédula de ciudadanía N° 1.035.972.588 y", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText('JIMENA MAHECHA NAVARRO', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", identificada con cédula de ciudadanía N° 1.032.248.590 para retirar las copias respectivas.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 150));

  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
} else if ($dp_formatos === '19. SOLICITUD ENTREGA DE TITULO') {
  // Adding Text element to the Section having font styled by default...
  $section->addText();
  $section->addText('Medellín, ' . $fecha, array('name' => 'Arial Narrow', 'size' => 12));
  $section->addText();
  $section->addText('Señores:', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 5));
  $section->addText($data1[0]['juzgado'], array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('spaceAfter' => 5));
  $section->addText('E.D.S', array('name' => 'Arial Narrow', 'size' => 12), array('spaceAfter' => 10), array('spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("REFERENCIA:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['tipo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  // muestra los demandantes
  for ($i = 0; $i <= $clientes - 1; $i++) {
    $r = $i + 1;
    if ($clientes == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[0]['pnombre'] . " " . $data1[0]['snombre'] . " " . $data1[0]['papellido'] . " " . $data1[0]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDANTE" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data1[$i]['pnombre'] . " " . $data1[$i]['snombre'] . " " . $data1[$i]['papellido'] . " " . $data1[$i]['sapellido'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  for ($i = 0; $i <= $demandados - 1; $i++) {
    $r = $i + 1;
    if ($demandados == 1) {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[0]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    } else {
      $tabla = $section->addTable();
      $tabla->addRow(); # Agregar fila
      $celda = $tabla->addCell(1800); # Agregar celda
      $celda->addText("DEMANDADO" . $r . ":", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
      $celda = $tabla->addCell(); # Agregar celda
      $celda->addText($data[$i]['nombre_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
    }
  }

  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("RADICADO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText($data1[0]['radicado'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $tabla = $section->addTable();
  $tabla->addRow(); # Agregar fila
  $celda = $tabla->addCell(1800); # Agregar celda
  $celda->addText("ASUNTO:", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true), array('align' => 'left', 'spaceAfter' => 5));
  $celda = $tabla->addCell(); # Agregar celda
  $celda->addText("SOLICITUD ENTREGA DE TITULO JUDICIAL.", array('name' => 'Arial Narrow', 'size' => 12, 'bold' => true, 'underline' => 'single'), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  // Add text run
  $textrun = $section->addTextRun([
    'align' => 'both',
    'spaceAfter' => 0,
  ]);

  $textrun->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12));
  $textrun->addText(", identificado como aparece al pie de mi firma actuando como apoderado de la parte demandante en el proceso de la referencia, por medio del presente escrito solicito respetuosamente a la judicatura se ordene la entrega del título judicial que se encuentra depositado a órdenes de su despacho.", array('name' => 'Arial Narrow', 'size' => 12));
  $textrun = $section->addTextRun();

  $section->addText("De igual manera, solicito muy comedidamente al despacho se ordene el cobro del título Judicial por ventanilla en el Banco Agrario de Colombia, para el efecto, se allega copia de la cédula de ciudadanía y tarjeta profesional del suscrito.", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));

  $section->addText();
  $section->addText("Atentamente,", array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addImage('../img/firma.jpg', array('width' => 80,));
  $section->addText('________________________________', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('CRISTIAN DARÍO ACEVEDO CADAVID', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('C.C. 1.017.141.093', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));
  $section->addText('T.P. 196.061 del C.S. de la J.', array('bold' => true, 'name' => 'Arial Narrow', 'size' => 12), array('align' => 'left', 'spaceAfter' => 5));

  $section->addText();
  $section->addText();
  if ($demandados == "1") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "2") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . " y " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "3") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de " . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . " y " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "4") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . " y " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  } else if ($demandados == "5") {
    $section->addText("En atención a lo dispuesto por el artículo 3° de la Ley 2213 de 2022, el memorial se remite al(los) demandado(s), al correo electrónico establecido para notificaciones judiciales de DEMANDADO CORREO" . $data[0]['nombre_ddo'] . " Correo electrónico: " . $data[0]['email_ddo'] . ", " . $data[1]['nombre_ddo'] . " Correo electrónico: " . $data[1]['email_ddo'] . ", " . $data[2]['nombre_ddo'] . " Correo electrónico: " . $data[2]['email_ddo'] . ", " . $data[3]['nombre_ddo'] . " Correo electrónico: " . $data[3]['email_ddo'] . " y " . $data[4]['nombre_ddo'] . " Correo electrónico: " . $data[4]['email_ddo'], array('name' => 'Arial Narrow', 'size' => 12), array('align' => 'both', 'spaceAfter' => 5));
  }
}  //fin del si

// Guarda una copia en el servidor
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($dp_formatos . '.docx');

$doc = file_get_contents($dp_formatos . '.docx');

// Descarga la copia
header("Content-Disposition: attachment; filename=" . $data1[0]['radicado'] . '-' . $dp_formatos . '-' . $consecutivo . ".docx");
echo file_get_contents($dp_formatos . '.docx');

// Eliminar la copia del servidor
$nombreArchivo = $dp_formatos . '.docx';
unlink($nombreArchivo);


