
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/tpFinalGrupo13/public/css/formStyle.css">

<div class="w3-container" style="margin-left: 35%; width: 50%">
    <div class="w3-card-4" style="width:50%;">
        <header class="w3-container w3-teal">
            <h1 class="w3-center">Modificar service</h1>
        </header>

        <div>
            <form action="/action_page.php">

                <label> Tipo de servicio</label><br>
                <select name="marca" id="">
                    <option value="externo">Taller externo </option>
                    <option value="interno">Taller interno</option>
                </select>

                <label for="fname">Importe</label><br><br>
                <input type="number" id="fname" name="firstname" placeholder="Tu patente.."><br><br>

                <label for="lname">Fecha desde</label><br><br>
                <input type="date" id="lname" name="dni" placeholder="Año de fabricacion.."><br><br>

                <label for="lname">Fecha hasta</label><br><br>
                <input type="date" id="lname" name="dni" placeholder="Año de fabricacion.."><br><br>

                <label> Vehiculo</label><br>
                <select name="vehiculo" id="">
                    <option value=""></option>
                </select>

                <br>
                <input type="submit" value="Guardar">
                <button  class="button button4">Volver</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>