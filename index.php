<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="pruebas.css">
    <title>Petrona Burger</title>
</head>

<body style="background-color: rgb(110, 110, 110);">

    <form action="" method="post">
        <div class="complete">
            <h1 style="margin-left: 22%">Petrona Burger</h1>
            <h2 style="margin-left: 26%">Nuestro menú:</h2>
            <section class="wrap">

                <div class="wrap-title-section">
                    <h2>Hamburguesas</h2>
                </div>
                <div class="wrap column-2 carta">
                    <div class="plato-carta">
                        <div class="img-plato-carta">
                            <img src="IMG/ham.png" alt="">
                        </div>
                        <div class="title-plato-carta">
                            <h4>Hamburguesa Master Chief</h4>
                            <p>La mejor hamburguesa que probarás en tu vida</p>
                        </div>
                        <div class="precio-plato-carta">
                            <span>$ 10.000</span>
                        </div>
                    </div>
                    <div class="cantidad">
                        <br>
                        <br>
                        <input type="number" name="ham" style="height: 60px; width: 100px;">
                    </div>
                </div>

                <div class="wrap-title-section">
                    <h2>Bebidas</h2>
                </div>

                <div class="wrap column-2 carta">
                    <div class="plato-carta">
                        <div class="img-plato-carta">
                            <img src="IMG/coca.png" alt="">
                        </div>
                        <div class="title-plato-carta">
                            <h4>CocaCola en lata</h4>
                            <p>Sabor refrescante, contiene 235ml</p>
                        </div>
                        <div class="precio-plato-carta">
                            <span>$ 5.000</span>
                        </div>
                    </div>
                    <div class="cantidad">
                        <br>
                        <input type="number" name="bebida" style="height: 60px; width: 100px;">
                    </div>
                </div>
                <br>
                <div class="wrap-title-section">
                    <h2>Acompañantes</h2>
                </div>
                <div class="wrap column-2 carta">
                    <div class="plato-carta">
                        <div class="img-plato-carta">
                            <img src="IMG/acom.png" alt="">
                        </div>
                        <div class="title-plato-carta">
                            <h4>Papas fritas</h4>
                            <p>Las mejores papas fritas que probarás</p>
                        </div>
                        <div class="precio-plato-carta">
                            <span>$ 5.000</span>
                        </div>
                    </div>
                    <div class="cantidad">
                        <br>
                        <input type="number" name="acom" style="height: 60px; width: 100px;">
                    </div>
                </div>
                <div>
                    <h5>Ingrese la cédula del cliente: </h5>
                    <input type="number" name="cedula" style="height: 40px; width: 150px;">
                    <button name="enviar" style="width:150px; height: 40px; margin-left: 10px;">Realizar pedido</button>
    </form>
    <form action="listar.php" method="post">
        <button name="listar" style="width:150px; height: 40px; margin-left: 6px; margin-top: 15px;">Listar pedidos</button>
    </form>
    <form action="listarOrden.php" method="post">
        <button name="listarorden" style="width:150px; height: 40px; margin-left: 6px; margin-top: 15px;">Listar de mayor a menor</button>
    </form>
    </div>
    </div>
    </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['enviar'])) {

    if (isset($_SESSION['id'])) {
        $_SESSION['id']++;
    } else {
        $_SESSION['id'] = 1;
    }
    $id = "_" . (string)$_SESSION['id'];
    if ($_POST['cedula'] == "") {
?>
        <script>
            alert("Se debe digitar una cedula!");
        </script>
<?php
    } else {
        if ($_POST['bebida'] == "") {
            $_POST['bebida'] = 0;
        }
        if ($_POST['bebida'] == "") {
            $_POST['bebida'] = 0;
        }
        if ($_POST['acom'] == "") {
            $_POST['acom'] = 0;
        }
        $total = ($_POST['ham'] * 10000) + ($_POST['bebida'] * 5000) + ($_POST['acom'] * 5000);
        $_SESSION['pedidos'][] = array($id, $_POST['ham'], $_POST['bebida'], $_POST['acom'], $_POST['cedula'], $total);
    }
}
?>
