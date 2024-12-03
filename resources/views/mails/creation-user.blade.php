<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body{
            width: 600px;
            margin: 0;
            padding: 0;
            border: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box; 
            box-sizing: border-box;
        }
        .mail-header {
            background-color: #000000;
            display:flex;
            justify-content:center;
            align-items: center;
            height: 86.65px;
        }

        .logo {
            max-width: 25%;
            
        }
        section div, footer div{
            display: flex;
            justify-content:center;
            align-items: center;
            margin: auto;
            text-align:center;
            padding: 0px 55px;
        }

        main{
            padding: 0px 100px;
        }

        .icons {
            width: 100%;
            text-align: center;
        }

        .icons img {
            display: inline-block;
            
        }

    </style>

</head>

<body>
    <header>
        <div class="mail-header" style="text-align: center; width:100%">
            <img src="{{ \Config::get('values.app_url') }}" class="logo" width="180" style="margin: 0 auto">
        </div>
    </header>
    <main>
        <div style="font-family: 'Roboto', sans-serif; font-size:1.3rem; color: #1c112a;">
            <h3>Señor usuario {{ $user }}</h3>
            <p>
                El presente correo con el motivo de informarle de la creación de manera exitosa de su usuario.
            </p>
            <p>
                User : {{ $email }}
            </p>
            <p>
                Contraseña: 123456789
            </p>
            <p>
                Un saludo
            </p>
            <p>
                <strong>Parking 24</strong>
            </p>
        </div>   
    </main>

    <section style="background-color: #f9f9fd;">
        <div style="font-family: 'Roboto', sans-serif; font-size:0.8rem; color: #605b63; height:79.5px">
            <p>Contenido interno y exclusivo para los pertenecientes al programa Parking24, con fines educativos. Prohibido compartir o distribuir el material fuera de la plataforma Parking24.</p>
        </div>
    </section>
    <footer style="background-color: #0e1b3c;">
        <div style="font-family: 'Roboto', sans-serif; font-size:0.8rem; color: #ffffff; height:79.5px">
            <p>2021 © Parking24. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
