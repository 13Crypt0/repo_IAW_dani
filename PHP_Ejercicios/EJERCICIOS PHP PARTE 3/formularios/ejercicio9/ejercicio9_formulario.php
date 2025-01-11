<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formularios
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ejercicio 9</h1>

  <form action="ejercicio9_recogida.php" method="get">
    <p><label>Introduce tu correo electronico: <input type="email" name="correo_1" size= "40" required></label></p>
    <p><label>Confirma tu correo electronico: <input type="email" name="correo_2" size= "40" required></label></p>
    <label>¿Desea recibir correos electronicos?</label>
    <select name="menu" required>
        <option value="0">-</option>
        <option value="1">Si</option>
        <option value="2">No</option>
    </select>
    <p>
      <input type="submit" value="Enviar">
      <input type="reset">
    </p>
  </form>
</body>
</html>