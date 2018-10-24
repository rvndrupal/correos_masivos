<?php
 $ddocname = $_GET["dd"];
 //$ddocname = 'SAC_2017_004021';
 echo $ddocname;
 //$soapUrl = "http://desosb.senasica.gob.mx:80/UcmRepGestorDS/UcmRepGestorAdministracionContentManagement_DS_NOTX?WSDL"; // asmx URL of WSDL
  $soapUrl = "http://osb.senasica.gob.mx:80/UcmRepGestorDS/UcmRepGestorAdministracionContentManagement_DS_NOTX?WSDL"; // asmx URL of WSDL
        $soapUser = "saoc.dti";  //  username
        $soapPassword = "saocdti1"; // password
		$id_tramite= "$ddocname";

        // xml post structure

        $xml_post_string = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:adm='http://administracioncontentmanagementnotx.ds.services.gcd.rep.ucm.senasica.gob.mx/'>
   <soapenv:Header/>
   <soapenv:Body>
      <adm:descargaDocumentoPorId_DS>
         <datoCredencialU>saoc.dti</datoCredencialU>
         <datoCredencialP>saocdti1</datoCredencialP>
         <docName>$id_tramite</docName>
         <interpretacion></interpretacion>
         <metodoDeRevision></metodoDeRevision>
      </adm:descargaDocumentoPorId_DS>
   </soapenv:Body>
</soapenv:Envelope>
";   // data from the form, e.g. some ID number

           $headers = array(
  			"Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "SOAPAction: http://connecting.website.com/WSDL_Service/GetPrice", 
                        "Content-length: ".strlen($xml_post_string),
                    ); //SOAPAction: your op URL

            $url = $soapUrl;

            // PHP cURL  for https connection with auth
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 90);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch); 
            curl_close($ch);

		$p = xml_parser_create();
		xml_parse_into_struct($p, $response, $vals, $index);
		xml_parser_free($p);
//print_r($vals);

	$content= $vals[4]['value'];
	  header('Content-Type: application / pdf');
      //header('Content-Type: image/jpeg');
	  //header('Content-Type: pdf');

header('Content-Length:'.strlen( $content ));
header('Content-disposition: inline; filename="' . $vals[6]['value'] . '"');
//header("Content-Disposition: attachment; filename = $nombre"); 
  //header('Content-disposition: attachment; filename="' . $vals[6]['value'] . '"');
header('Cache-Control: public, must-revalidate, max-age=0');
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	//header("Content-Description: File Transfer");
    header("Content-transfer-encoding: binary");
	
    

echo base64_decode($content);
	?>
