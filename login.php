<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<body class="bg-white font-family-karla h-screen">

<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col">

        <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
            <img src="img/LOGO.png" alt="" width="150px">
        </div>

        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">Bienvenido</p>
            <form class="flex flex-col pt-3 md:pt-8" method="post">
            <?php
            				if(isset($_POST['ingresar'])){
			   				 require("loginon.php");
                				}
          				?>
                <div class="flex flex-col pt-4">
                    <label for="email" class="text-lg">Correo o DNI</label>
                    <input type="text" id="email" name="mail" placeholder="DNI o correo electrónico" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex flex-col pt-4">
                    <label for="password" class="text-lg">Contraseña</label>
                    <input type="password" id="password" name="pass" placeholder="Contraseña" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <input type="submit" value="Iniciar sesión" name="ingresar" class="bg-green-700 text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
            </form>
            <div class="text-center pt-12 pb-12">
                <p>No tienes una cuenta? <a href="register.php" class="underline font-semibold">Registrate aquí.</a></p>
            </div>
        </div>

    </div>

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden md:block" src="img/banner.jpg">
    </div>
</div>
<!-- Esta es una de las cosas que da pereza de hacer que el frontend de una página web  no cualquier vago lo puede hcer -->

</body>
</html>
</body>
</html>