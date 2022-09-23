<html>
    <center><button onclick="location.href='index.php'" style="margin-bottom: -40px; margin-top: 10px;">INICIO</button></center>
</html>
<?php
session_start();
if (isset($_SESSION['pedidos'])) {
    $keys = array_keys($_SESSION['pedidos']);
    $cont = 0;
    foreach ($_SESSION['pedidos'] as $pedido) {
        if (isset($_POST["Eliminar" . $pedido[0]])) {
            unset($_SESSION['pedidos'][$keys[$cont]]);
        }
        $cont++;
    }

    $ped = array();
    $arr = array();
    $keytemp = "";
    $temp = $_SESSION['pedidos'];
    $limite = count($temp);
    for ($i = 0; $i < $limite; $i++) {
        $cont = 0;
        $keys = array_keys($temp);
        $mayor = $temp[$keys[0]][5];
        foreach ($temp as $pedido) {
            if ($pedido[5] >= $mayor) {
                $mayor = $pedido[5];
                $ped = $pedido;
                $keytemp = $keys[$cont];
            }
            $cont++;
        }
        array_push($arr, $ped);
        unset($temp[$keytemp]);
    }

    foreach ($arr as $pedido) {
        echo '<form action="" method="post">
        <table>
            <tr>
            <th>Numero de pedido</th>
            <th>Hamburguesas</th>
            <th>Bebidas</th>
            <th>Acompañantes</th>
            <th>Cedula</th>
            <th>Valor total</th>
            </tr>
            <tr>
            <td>' . $pedido[0] . '</td>
            <td>' . $pedido[1] . '</td>
            <td>' . $pedido[2] . '</td>
            <td>' . $pedido[3] . '</td>
            <td>' . $pedido[4] . '</td>
            <td>' . $pedido[5] . '</td>
            <td style="text-align: center;"><button name="Eliminar' . $pedido[0] . '">Eliminar</button></td>
            </tr>
            </table> </form>';
    }
}
?>
<style>
    table {
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
    }

    td,
    th {
        border: 1px solid black;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
    }
</style>
