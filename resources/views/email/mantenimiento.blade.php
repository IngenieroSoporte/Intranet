<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mantenimiento Preventivo</title>
</head>
<body>

    <?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?>
    <p>Hola! Se ha agendado un nuevo Mantenimiento.</p>
    <ul>
        <li>Area: {!! $maintenance->area_id!!}</li>
        <li>Tipo de Mantenimiento: {!! $maintenance->tipo!!}</li>
        <li>Programado para la Fecha: {!! $maintenance->fecha !!}</li>
        <li>Descripcion: {!! $maintenance->descripcion !!}</li><br>
        <a href="https://intranet.sanbartolome.edu.co/">Ingresar</a>
    </ul>
    
</body>
</html>