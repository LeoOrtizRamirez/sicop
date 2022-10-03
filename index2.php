<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>SCRAPPING</title>    
</head>
<body>
<div class="container mt-4">
    <form action="data.php" method="GET">
        <div class="row">
            <div class="col-12">
            <h4>Rango de Publicación</h4>
            </div>
            <div class="col-6">
                <input class="form-control" type="date" name="desde_publicacion" id="desde_publicacion"/>
            </div>
            <div class="col-6">
                <input class="form-control" type="date" name="hasta_publicacion" id="hasta_publicacion"/>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
            <h4>Rango de Apertura</h4>
            </div>
            <div class="col-6">
                <input class="form-control" type="date" name="desde_apertura" id="desde_apertura"/>
            </div>
            <div class="col-6">
                <input class="form-control" type="date" name="hasta_apertura" id="hasta_apertura"/>
            </div>
        </div>
    <input class="btn btn-primary" type="submit" value="Consultar">
    </form>
    </div>
</body>
<script>
    document.getElementById('desde_publicacion').valueAsDate = new Date("04/06/2022");
    document.getElementById('desde_apertura').valueAsDate = new Date("04/06/2022");
    document.getElementById('hasta_publicacion').valueAsDate = new Date();
    document.getElementById('hasta_apertura').valueAsDate = new Date("12/02/2022");
</script>
</html>