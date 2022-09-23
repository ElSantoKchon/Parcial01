<html>
    <center><button onclick="location.href='index.php'" style="margin-bottom: -40px; margin-top: 10px;">INICIO</button></center>
</html>
<?php
session_start();
if (isset($_SESSION['pedidos'])) {
    if(isset($_POST['cedula'])){
        $_SESSION['cedula'] = $_POST['cedula'];
    }
    $keys = array_keys($_SESSION['pedidos']);
    $cont = 0;
    foreach ($_SESSION['pedidos'] as $pedido) {
        if (isset($_POST["Eliminar" . $pedido[0]])) {
            unset($_SESSION['pedidos'][$keys[$cont]]);
        }
        $cont++;
    }
    foreach ($_SESSION['pedidos'] as $pedido) {
        
        if ($pedido[4] == $_SESSION['cedula']) {
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
            </table>';
        }
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
        border: 2px solid black;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
    }
</style>
