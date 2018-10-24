<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?php
include("nusoap.php");

$cliente = new nusoap_client("http://desosb.senasica.gob.mx:80/UcmRepGestorDS/UcmRepGestorAdministracionContentManagement_DS_NOTX?WSDL",false);

$datoCredencialU = "saoc.dti";
$datoCredencialP = "saocdti1";
$id_tramite= "DGIAAP_2017_004005";



//$parametros = array('datoCredencialU'=>$datoCredencialU, 'datoCredencialP'=>$datoCredencialP, 'dDocName'=>$id_tramite);


$parametros	= "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:adm='http://administracioncontentmanagementnotx.ds.services.gcd.rep.ucm.senasica.gob.mx/'>
   <soapenv:Header/>
   <soapenv:Body>
      <adm:descargaDocumentoPorId_DS>
         <datoCredencialU>saoc.dti</datoCredencialU>
         <datoCredencialP>saocdti1</datoCredencialP>
         <docName>DGIAAP_2017_004005</docName>
         <interpretacion></interpretacion>
         <metodoDeRevision></metodoDeRevision>
      </adm:descargaDocumentoPorId_DS>
   </soapenv:Body>
</soapenv:Envelope>
";

$respuesta = $cliente->call("descargaDocumentoPorId_DS",$parametros);

var_dump($respuesta);

/*require_once('nusoap.php');
$servicio="http://desosb.senasica.gob.mx/UcmRepGestorDS/UcmRepGestorAdministracionContentManagement_DS_NOTX?WSDL"; //url del servicio
//$parametros=array(); //parametros de la llamada
$parametros['idioma']="es";
$parametros['usuario']="saoc.dti";
$parametros['clave']="saocdti1";
$client = new SoapClient($servicio, $parametros);
$result = $client->getNoticias($parametros);//llamamos al métdo que nos interesa con los parámetros
*/
/*$result = obj2array($result);
$noticias=$result['resultado']['noticias'];
$n=count($noticias);



//procesamos el resultado como con cualquier otro array
for($i=0; $i<$n; $i++){
    $noticia=$noticias[$i];
    $id=$noticia['id'];
    //aquí iría el resto de tu código donde procesas los datos recibidos
}

function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}
*/


/*$mi_pdf = 'pdf.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="'.$mi_pdf.'"');
readfile($mi_pdf);*/
?>

</body>
</html>
