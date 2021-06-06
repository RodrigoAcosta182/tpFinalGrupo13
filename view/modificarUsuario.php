
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/tpFinalGrupo13/public/css/formStyle.css">

<div class="w3-container" style="margin-left: 35%; width: 50%">
    <div class="w3-card-4" style="width:50%;">
        <header class="w3-container w3-teal">
            <h1 class="w3-center">Usuario</h1>
        </header>

        <div>
            <form action="/action_page.php">
                <label for="fname">Nombre</label>
                <input type="text" id="fname" name="firstname" placeholder="Tu nombre..">

                <label for="lname">Apellido</label>
                <input type="text" id="lname" name="lastname" placeholder="Tu apellido..">

                <label for="lname">Email</label>
                <input type="email" id="lname" name="email" placeholder="Tu email..">

                <label for="lname">Contraseña</label>
                <input type="password" id="lname" name="psw" placeholder="Tu contraseña..">
                <br>
                <label>Roles</label> <br><br>
                <input type="checkbox" id="vehicle1" name="admin">
                <label> Administrador</label><br>
                <input type="checkbox" id="vehicle2" name="super">
                <label> Supervisor</label><br>
                <input type="checkbox" id="vehicle3" name="encargado">
                <label> Encargado de taller</label><br>
                <input type="checkbox" id="vehicle3" name="chofer">
                <label> Chofer</label><br>
                <input type="checkbox" id="vehicle3" name="mecanico">
                <label> Mecanico</label><br><br>

                <label> Licencias</label><br>
                <select name="licencias" id="">
                    <option value="">Class 1</option>
                    <option value="">Class 2</option>
                    <option value="">Class 3</option>
                    <option value="">Class 4.1</option>
                    <option value="">Class 4.2</option>
                    <option value="">Class 4.3</option>
                    <option value="">Class 5.1</option>
                    <option value="">Class 5.2</option>
                    <option value="">Class 6.1</option>
                    <option value="">Class 6.2</option>
                    <option value="">Class 7</option>
                    <option value="">Class 8</option>
                    <option value="">Class 9</option>
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