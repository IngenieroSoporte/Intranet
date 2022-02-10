<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Recursos Humanos</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../assets/css/gothic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Fixed-navbar-starting-with-transparency-1.css">
    <link rel="stylesheet" href="../assets/css/Fixed-navbar-starting-with-transparency.css">
    <link rel="stylesheet" href="../assets/css/Article-Clean.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="../assets/css/footer_2021-1.css">
    <link rel="stylesheet" href="../assets/css/footer_2021.css">
    <link rel="stylesheet" href="../assets/css/footer_icontec_actualizado.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Footer-Mayor-San-Bartolome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Menu.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body style="background: url(&quot;assets/img/fondoiconos.png&quot;);background-size: cover;">
    <div class="container-fluid text-right alineacion-redes" style="padding: 20px;background: #de1616;"></div>
    <div class="container-fluid text-center alineacion-2" style="padding-top: 1px;padding-bottom: 23px;background: url(&quot;assets/img/fondologo.png&quot;) round;"><a href="https://www.sanbartolome.edu.co" style="background-color: rgba(255,0,0,0);"><img src="assets/img/Escudo%20Gotico.png" style="width: 130px;background-color: rgba(255,255,255,0);padding-top: 9px;"></a>
        <hr style="width: 400px;color: rgb(74,69,131);background-size: 11px;filter: blur(0px) grayscale(0%);opacity: 1;background-color: #4a4583;">
        <h5 style="color: rgb(74,69,131);margin: -11px;font-size: 35px;font-family: gothic;margin-top: -5px;padding-top: 2px;padding-bottom: 12px;">COLEGIO MAYOR SAN BARTOLOMÉ</h5>
    </div>
    <div class="container mb-5" style="padding-top: 29px;">
        <nav class="navbar navbar-light navbar-expand-md text-sm-center text-md-center navigation-clean">
            <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="font-family: gothic;color: rgb(27,20,100);">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link border-left" href="https://www.sanbartolome.edu.co" style="color: rgb(27,20,100);">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link  border-left" href="https://www.sanbartolome.edu.co/admisiones/" style="color: rgb(255, 0, 0);">Admisiones</a></li>
                        <li class="nav-item"><a class="nav-link  border-left" href="https://issuu.com/protocolocmsb2020/docs/cuadernillo_1.pptx" style="color: rgb(27,20,100);">Recorrido Histórico</a></li>
                        <li class="nav-item"><a class="nav-link border-left" href="https://www.sanbartolome.edu.co/responsabilidad-social/" style="color: rgb(27,20,100);">Responsabilidad Social</a></li>
                        <li class="nav-item"><a class="nav-link border-left" href="https://www.sanbartolome.edu.co/contactanos/" style="color: rgb(27,20,100);">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>     
<!-- Espacio de Tarjetas con las Vacantes -->


<div class="container">
    <div class="row">
    @foreach ($empleo as $id=>$activo)

        @if ($activo->publicar == 1)

        <div class="col-4">
            

            <div class="container my-5 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://www.sanbartolome.edu.co/wp-content/uploads/2021/05/Escudo-Gotico-1.png" class="mt-3 card-img-top rounded mx-auto d-block" alt="..." style="width: 30%">
                    <div class="card-body">
                      <h5 class="card-title">{{$activo->vacante}}</h5>
                      <p class="card-text">{{$activo->linea_de_investigacion}}</p>
                      <p class="card-text" style="text-align: justify">{!!substr($activo->descripcion, 0,150)!!}</p>
                      <a href="https://intranet.sanbartolome.edu.co/register" class="bg-danger py-2 pl-2 pr-2 rounded" style="text-decoration: none; color:white;">Aplicar Oferta</a>
                    </div>
                  </div>
               </div>
        
    </div>
    @else
    @endif
    @endforeach
</div>
</div>
<div class="container">{{$empleo->links('pagination::bootstrap-4')}}</div>
    
<!-- Fin Espacio de Tarjetas con las Vacantes -->

    <div class="footer-clean" style="background: #1c1364;padding: 0px;padding-top: 0px;">
        <footer style="background: rgb(28,19,100);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 col-xl-2 item"><a href="http://sitio.acodesi.org/" target="_blank"><img src="assets/img/ACODESI.png" style="margin-left: -15px;"></a><a href="https://jesuitas.co/" target="_blank"><img src="assets/img/JESUITAS%20COLOMBIA.png" style="margin-top: 17px;margin-left: -44px;"></a></div>
                    <div class="col-sm-4 col-md-3 col-xl-2 item"><a href="https://www.asia-abba.org/2018/" target="_blank"><img src="assets/img/logo%20ASIA%20ABBA.png" style="margin-left: 26px;"></a><a href="https://www.flacsi.net/" target="_blank"><img src="assets/img/FLACSI.png" style="margin-top: 47px;margin-left: -18px;width: 191px;"></a><a href="https://www.flacsi.net/" target="_blank"></a></div>
                    <div class="col-sm-4 col-md-3 col-xl-2 item"><a href="https://tomasruedavargas.org/" target="_blank"><img src="assets/img/TOMAS%20RUEDA%20VARGAS.png" style="margin-left: 28px;"></a><a href="#"><img src="assets/img/ASOMAYOR.png" style="margin-top: 30px;margin-left: 26px;"></a></div>
                    <div class="col-sm-4 col-md-3 item">
                        <ul>
                            <li style="margin-top: 10px;font-family: gothic;"><a href="#" style="color: rgb(255,255,255);"></a></li>
                            <li></li>
                            <li style="margin-top: 11px;"><a href="#"></a><a href="#"></a></li>
                        </ul>
                        <p style="font-family: gothic;"><strong>Sede Bachillerato:</strong><br><strong>Dirección: Carrera 7 No. 9-96 Plaza de Bolívar.</strong><br><strong>PBX: 9191990</strong></p>
                        <p style="font-family: gothic;"><strong>Sede Preescolar y Primaria:</strong><br><strong>Dirección: Carrera 23 No. 28-55 Sur.</strong><br><strong>PBX: 9191990.</strong><br><strong>Bogotá D.C. - Colombia</strong><br></p>
                    </div>
                    <div class="col-lg-3 item social" style="text-align: center;"><a href="#" style="color: rgb(255,255,255);"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: rgb(255,255,255);"></i></a><a href="#" style="color: rgb(255,255,255);"><i class="icon ion-social-whatsapp-outline"></i></a><a href="#" style="color: rgb(255,255,255);"><i class="icon ion-social-youtube-outline"></i></a>
                        <p class="copyright" style="color: #ffffff;font-family: gothic;"><br><strong>Consulte&nbsp;&nbsp;</strong><a href="http://www.sanbartolome.edu.co/uploads/documentos/2018/politica-datos.pdf">aqui</a><strong>&nbsp;nuestra Politica de Proteccion de Datos Personales</strong><br><br><strong>Diseño y Desarrollo: caprietoj - Colegio Mayor de San Bartolomé © 2021</strong><br><br></p><img src="assets/img/Icontec%20Actualizado%20Footer.png" style="width: 107px;">
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="../assets/js/Fixed-navbar-starting-with-transparency.js"></script>
</body>

</html>