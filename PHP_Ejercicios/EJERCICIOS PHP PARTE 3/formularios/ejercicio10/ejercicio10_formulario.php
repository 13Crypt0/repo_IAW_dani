<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formularios
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ejercicio 10</h1>

  <form action="ejercicio10_recogida.php" method="get">
    <p><label>Introduzca su Nombre: <input type="text" name="nombre" size="40" required></label></p>
    <p><label>Introduzca su 1º Apellido: <input type="text" name="apellido_1" size="40" required></label></p>
    <p><label>Introduzca su 2º Apellido: <input type="text" name="apellido_2" size="40" placeholder="Opcional"></label></p>
    <label>Seleccione su rango de edad: </label>
    <select name="edad" required>
        <option>Menos de 20 años</option>
        <option>Entre 20 y 39 años</option>
        <option>Entre 40 y 59 años</option>
        <option>Entre 60 o más años</option>
    </select>
    <p><label>Introduzca su peso: <input type="number" name="peso" min="0" required></label></p>
    <p><label>Seleccione su sexo: 
        <input type="radio" name="sexo" value="Hombre" required> Hombre
        <input type="radio" name="sexo" value="Mujer" required> Mujer
        <input type="radio" name="sexo" value="Otro" required> Otro
    </label></p>
    <p><label>Seleccione su estado civil: 
        <input type="radio" name="estado_civil" value="Soltero/a" required> Soltero/a
        <input type="radio" name="estado_civil" value="Casado/a" required> Casado/a
        <input type="radio" name="estado_civil" value="Viudo/a" required> Viudo/a
        <input type="radio" name="estado_civil" value="Divorciado/a" required> Divorciado/a
        <input type="radio" name="estado_civil" value="Separado/a legalmente" required> Separado/a legalmente
    </label></p>
    <p><label>Aficiones: 
        <input type="checkbox" name="aficiones[]" value="leer"> Leer libros
        <input type="checkbox" name="aficiones[]" value="musica"> Escuchar Música
        <input type="checkbox" name="aficiones[]" value="pelis_series"> Ver películas y series <br>
        <input type="checkbox" name="aficiones[]" value="videojuegos"> Jugar a videojuegos 
        <input type="checkbox" name="aficiones[]" value="deporte"> Practicar deporte
        <input type="checkbox" name="aficiones[]" value="instrumento"> Tocar un instrumento musical <br>
        <input type="checkbox" name="aficiones[]" value="manualidades"> Hacer manualidades
        <input type="checkbox" name="aficiones[]" value="cocinar"> Cocinar
        <input type="checkbox" name="aficiones[]" value="viajar"> Viajar <br>
        <input type="checkbox" name="aficiones[]" value="podcast"> Escuchar Podcast
        <input type="checkbox" name="aficiones[]" value="meditar"> Meditar
        <input type="checkbox" name="aficiones[]" value="gimnasio"> Ir al gimnasio
    </label></p>


    <p>
      <input type="submit" value="Enviar">
      <input type="reset">
    </p>
  </form>
</body>
</html>