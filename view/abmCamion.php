
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/tpFinalGrupo13/public/css/formStyle.css">

<div class="w3-container" style="margin-left: 35%; width: 50%">
    <div class="w3-card-4" style="width:50%;">
        <header class="w3-container w3-teal">
            <h1 class="w3-center">Camion</h1>
        </header>

        <div>
            <form action="/action_page.php">

                <label> Marca</label><br>
                <select name="marca" id="">
                    <option value="iveco">Iveco</option>
                    <option value="scania">Scania</option>
                    <option value="mercedes">Mercedes Benz</option>
                </select>

                <label> Modelo</label><br>
                <select name="modelo" id="">
                    <option value="1">Daily</option>
                    <option value="2">Eurostar</option>
                    <option value="3">G310</option>
                    <option value="4">G460</option>
                    <option value="5">Actros 1846</option>
                    <option value="6">Axor</option>
                </select>

                <label for="fname">Patente</label>
                <input type="text" id="fname" name="firstname" placeholder="Tu patente..">

                <label for="lname">Nro chasis</label>
                <input type="text" id="lname" name="lastname" placeholder="Nro chasis..">

                <label for="lname">Nro motor</label>
                <input type="email" id="lname" name="dni" placeholder="Nro motor..">

                <label for="lname">Año de fabricacion</label><br><br>
                <input type="date" id="lname" name="dni" placeholder="Año de fabricacion.."><br><br>

                <label> Tipo</label><br>
                <select name="acoplado" id="">
                    <option value=""></option>
                    <option value="1">Con acoplado</option>
                    <option value="2">Sin acoplado</option>
                </select>

                <br> <br><input type="checkbox" id="active" name="active" value="active" checked>
                <label for="active">Activo</label><br>
                <br>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</div>

</body>
</html>