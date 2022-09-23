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

    foreach ($_SESSION['pedidos'] as $pedido) {
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
<spam style="position: absolute; left: 43%; margin-top: 20px; margin-left: -80px;">
    <form action="listarC.php" method="post">
        <h5 style="margin-bottom:5px;">Ingrese la cédula del cliente: </h5>
        <input type="number" name="cedula" style="width: 150px; display: inline-block;">
        <button name="listarc" style="width:150px; display: inline-block;">Listar por cliente</button>
    </form>
</spam>
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
