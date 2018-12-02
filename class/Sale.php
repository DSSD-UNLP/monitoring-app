<?php



class Sale{

    public static function getTotalSales(){
        $response = Cases::getArchivedCases();
        $cases = $response['data'];
        $ventas = [];
        foreach ($cases as $key => $case) {
            $data = Cases::getDataArchivedCase($case->id);
            $variables = $data['data'];

            //Son las variables que están en la base de datos de Bonita
            $articulo = $variables->articulo;
            $precioUnit = $variables->precio;
            $cantidad = $variables->cantidad;
            $montoTotal = $precioUnit * $cantidad;

            if ($ventas[$articulo]){
                $ventas[$articulo]['montoTotal'] = $ventas[$articulo]['montoTotal'] + $montoTotal;
                $ventas[$articulo]['cantidad'] = $ventas[$articulo]['cantidad'] + 1;
                $ventas[$articulo]['promedio'] = ($ventas[$articulo]['montoTotal']) / ($ventas[$articulo]['cantidad']);
            }
            else {
                $ventas[$articulo] = array( 
                    'articulo'      => $articulo,
                    'montoTotal'    => $montoTotal,
                    'cantidad'      => $cantidad,
                    'promedio'      => $precioUnit
                );
            }
        }
        return  $ventas;
    }

}