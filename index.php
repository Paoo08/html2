<?php
session_start();
include "conexion.php";

$administrador = 0;
$user = 0;  // Inicializar la variable antes de la condición
    if (isset($_SESSION['correo'])) {

        // Obtener información del usuario
        $correo = $_SESSION['correo'];
        $queryUser = "SELECT * FROM administrador WHERE correo = '$correo'";
        $queryUser2 = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultUser = mysqli_query($con, $queryUser);
        $resultUser2 = mysqli_query($con, $queryUser2);

        if ($resultUser && mysqli_num_rows($resultUser) > 0) {
            $usuario = mysqli_fetch_assoc($resultUser);
            
            if ($usuario['Type'] = 'admin') {
                $administrador = 1;  
            }
            
        }elseif($resultUser2 && mysqli_num_rows($resultUser2) > 0){
            $usuario = mysqli_fetch_assoc($resultUser2);
            if ($usuario['Type'] = 'user'){
                $user = 1; 
                
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                           integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                           crossorigin="anonymous" referrerpolicy="no-refferer">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@700&display=swap" rel="stylesheet">
    <!-- <link href="/fontawesome/css/all.css"> -->
    <title>Document</title>
</head>
<body style="background-color:  #F8FCFD">
    <header>
            <div class="conte">
            <nav>
                <input type="checkbox" id="click">
                <label for="click" class="btn">
                    <i class="fa-solid fa-bars"></i>
                </label>
                <a href="#" class="ventanita">
                    <img src="#" alt="" class="logo">
                </a>
                <ul>
                <?php
                    if ($user === 1) {
                        echo '<li class="carrito-icon" src="imagenes/carrito.jpeg"><a href="CarritoV.php"><i class="fas fa-shopping-cart"></i></a></li>';
                    }
                ?>
                <li><a href="index.php"> Inicio</a></li>
                <li><a href="Producto.php"> Producto</a></li>
                <?php
                if ($user === 1) {
                        echo '<li><a href="CompraV.php"> Historial</a></li>';
                    }
                ?>
                <?php
                    if($administrador === 1){
                     echo '<li><a href="RegProductoV.php"> Registro</a></li>';
                     echo '<li><a href="Modificar.php"> Modificar</a></li>';
                     echo '<li><a href="Eliminar.php"> Eliminar</a></li>';
                    }
                ?>
                <!-- <li><a href="RegProductoV.php"> Reg. Producto</a></li> -->
                <?php
                if($user === 1 || $administrador == 1){
                    echo '<li><a href="Salir.php"> Salir</a></li>';        
                }else{
                    echo '<li><a href="LoginV.php"> Log in</a></li>';
                    echo '<li><a href="RegistroV.php"> Registro</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    </header>
    
    <br><br>
    <p class="kali">KALISTA</p>
    <div class="contenido">
        <div class="secciones">
            <div class="seccion1">
                <p class="inicio">MISION:</p>
                <p class="text">Proporcionar a los clientes flores de calidad en el tiempo oportuno, fechas y 
                ocasiones especiales. Dar detalles pequeños, grandes, o medianos para diferentes
                situaciones, ocasiones o circunstancias, se garantiza reserva total si el cliente lo pide.</p> 
            </div>
            <div class="seccion1">
                <p class="inicio">VISION:</p>
                <p class="text">Ver cada detalle transformado en un lenguaje diferente, ya sea este el lenguaje de las flores 
                y así alcanzar una gran reputación comercial tanto por su seriedad, calidad y excelente servicio.</p>
            </div>
            <div class="seccion1">
                <p class="inicio">ACERCA DE: </p>
                <p class="text">Es una nueva empresa dedicada a los arreglos florales, para poder dar pequeños o grandes detalles que 
                que se llegan a necesitar en diferentes ocasiones, teniendo una muy buena calidad y excelente servicio</p>
            </div>
        </div>
        <div class="mapa">
            <div class="seccion4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1679.1407184474845!2d-103.38918446086153!3d20.702530761659883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae4e98d5453d%3A0xc4fdd3929a2ecbd1!2sCentro%20de%20Ense%C3%B1anza%20T%C3%A9cnica%20Industrial%20(Plantel%20Colomos)!5e0!3m2!1ses-419!2smx!4v1694013808248!5m2!1ses-419!2smx" 
                    width="600" height="450" margin="auto" style="border:0 ;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"  ></iframe>
            </div>
        </div>
    </div>
    <footer>
        <h4>Paola Guadalupe Perez Ramirez 
            4ºP
            Base de Datos y Desarrollo Web
        </h4>
    </footer>
</body>
</html>