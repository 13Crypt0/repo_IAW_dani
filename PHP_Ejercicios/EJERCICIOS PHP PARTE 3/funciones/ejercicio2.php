<?php
    $numero1 = rand (2, 10);
    $numero2 = rand (2, 10);

// Se debe crear el $tabla ya que se define el tipo de variable a devolver (string). Uso de .= para concatenar resultados.

    function creaTabla(int $filas, int $cols): string {
        $contador = 0;
        $tabla = "<table border=\"1\">\n";
        $tabla .= "<tbody>\n";
        for ($i=1; $i<=$filas;$i++) {
            $tabla .= "<tr>\n";  
            for ($c=1;$c<=$cols;$c++) {
                $contador++;  
                $tabla .= "<td>$contador</td>";                
            }
            $tabla .= "</tr>\n";
        }
        $tabla .= "</tbody>\n";
        $tabla .= "</table>\n";

        return $tabla;
    }
    echo creaTabla($numero1, $numero2);
?>