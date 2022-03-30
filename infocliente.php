<?php
    require_once('./cfg/db.php');
    if(isset($_GET['cliente'])){
        $sql = "select * from viv_cuenta_cliente
                where codcliente = " . $_GET['cliente'];
        if(!Query($sql)){
            echo "Error en la ejecucion de la consulta";
        }else{
            $results = Query($sql);
            $rows = countQuery($sql);
            if($rows > 0){
                $return_arr['cuentas_cliente'] = array();
                foreach($results as $row){
                    array_push($return_arr['cuentas_cliente'], array(
                        'codcliente'=>$row['codcliente'],
                        'ctavivienda'=>$row['ctavivienda'],
                        'numerocontrato'=>$row['numerocontrato'],
                        'poligono'=>$row['poligono'],
                        'lote'=>$row['lote'],
                        'fechactavivienda'=>$row['fechactavivienda'],
                        'fechadiacorte'=>$row['fechadiacorte'],
                        'montoventa'=>$row['montoventa'],
                        'montofinanciado'=>$row['montofinanciado'],
                        'fechacontrato'=>$row['fechacontrato'],
                        'cantidadcuotas'=>$row['cantidadcuotas'],
                        'tasainteresnormal'=>$row['tasainteresnormal'],
                        'tasainterespormora'=>$row['tasainterespormora'],
                        'cuotanormal'=>$row['cuotanormal'],
                        'fechainipagos'=>$row['fechainipagos'],
                        'fechavence'=>$row['fechavence'],
                        'fechaultpago'=>$row['fechaultpago'],
                        'fechaproxpago'=>$row['fechaproxpago'],
                        'saldocapital'=>$row['saldocapital'],
                        'saldointeres'=>$row['saldointeres'],
                        'saldomora'=>$row['saldomora'],
                        'saldointeresmora'=>$row['saldointeresmora'],
                        'valormunicipal'=>$row['valormunicipal'],
                        'ctamigracion'=>$row['ctamigracion']
                    ));
                }
                echo json_encode($return_arr);
            }
        }
    }
?>