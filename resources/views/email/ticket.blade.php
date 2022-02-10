<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incidentes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>

    <?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?>
    <p>Hola! Se ha reportado un nuevo Ticket.</p>
    <ul>
        <li>Nombre de la persona que reporta: {!! $ticket->nombre !!}</li>
        <li>Correo Electronico: {!! $ticket->correo !!}</li>
        <li>Nùmero de Ticket: {!! $ticket->id !!}</li>
        <li style="padding: 0px; marging: 0px">Asunto: {!! $ticket->comentenos_mas_sobre_su_incidencia !!}</li>
        <a href="https://intranet.sanbartolome.edu.co/">Resolver</a>
    </ul>
</body>
</html>