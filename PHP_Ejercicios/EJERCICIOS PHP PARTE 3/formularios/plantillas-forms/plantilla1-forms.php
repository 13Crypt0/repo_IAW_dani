<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formularios
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Nombre del formulario</h1>

  <form action="plantilla2-forms.php" method="get">
    <p><label>Campo 1: <input type="text" name="campo1re" size="20" maxlength="20"></label></p>

    <p><label>Campo 2: <input type="number" name="campo2" min="5" max="130"></label></p>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset">
    </p>
  </form>
</body>
</html>
