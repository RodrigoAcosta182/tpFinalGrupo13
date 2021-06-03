<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>





    <div class="w3-dropdown-click">
        <button class="w3-bar-item w3-button w3-teal" onclick="myFunction()">
            Dropdown <i class="fa fa-caret-down"></i>
        </button>
        <div id="demo" class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="#" class="w3-bar-item w3-button">Link 1</a>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("demo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>

    </div>

</body>
</html>
