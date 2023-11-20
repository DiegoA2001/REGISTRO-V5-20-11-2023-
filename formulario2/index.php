<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
</head>
<body>
    <form method="post" autocomplete="off">
        <img width="100" height="74" src="https://www.standrews.cl/wp-content/uploads/2022/10/logo-st-andrews.png">
        <h2>REGISTRO CONTROL DE PESO PRODUCTO TERMINADO GRANEL-ENTERO</h2>
        <div class="input-group d-flex justify-content-center">
        <div class="input-container mb-2">
            <a href="agregar_cliente_nuevo.php" class="add-client-link">
            <i class="fa-solid fa-user-plus"></i>
            </a>
        </div>
        <select id="customer" name="customer" class="dynamic-select" required>
            <option value="" disabled selected>SELECCIONA UN CLIENTE EXISTENTE</option>
            <?php
                // Asegúrate de tener la conexión a la base de datos establecida aquí
                include("conexion.php");

                // Realiza la consulta para obtener los clientes
                $consultaClientes = "SELECT * FROM clientes";
                $resultadoClientes = mysqli_query($conex, $consultaClientes);

                // Verifica si hay resultados y muestra las opciones del selector
                if (mysqli_num_rows($resultadoClientes) > 0) {
                    while ($filaCliente = mysqli_fetch_assoc($resultadoClientes)) {
                        echo "<option value='{$filaCliente['customer_id']}'>{$filaCliente['nombre_cliente']}</option>";
                    }
                }
                ?>
            </select>
            <div class="input-group d-flex justify-content-center">
            <div class="input-container mb-2">
            <a href="agregar_monitor_nuevo.php" class="add-client-link">
            <i class="fa-solid fa-user-plus"></i>
            </a>
            </div>
        <select id="monitor" name="monitor" class="dynamic-select" required>
        <option value="" disabled selected>SELECCIONA UN MONITOR EXISTENTE</option>
        <?php
        include("conexion.php");

        // Consulta para obtener los Monitores
        $consultaMonitores = "SELECT * FROM monitores";
        $resultadoMonitores = mysqli_query($conex, $consultaMonitores);

        // Agregar opciones para Monitores
        if (mysqli_num_rows($resultadoMonitores) > 0) {
            while ($filaMonitor = mysqli_fetch_assoc($resultadoMonitores)) {
                echo "<option value='{$filaMonitor['monitor_id']}'>{$filaMonitor['nombre_monitor']}</option>";;
            }
        }
        ?>
        </select>
        </div>
        <div class="input-container mb-2">
        <a href="agregar_supervisor_nuevo.php" class="add-client-link">
            <i class="fa-solid fa-user-plus"></i>
        </a>
        </div>
        <select id="supervisor" name="supervisor" class="dynamic-select" required>
        <option value="" disabled selected>SELECCIONA UN SUPERVISOR EXISTENTE</option>
        <?php
        include("conexion.php");

        // Consulta para obtener los Supervisores
        $consultaSupervisores = "SELECT * FROM supervisores";
        $resultadoSupervisores = mysqli_query($conex, $consultaSupervisores);

        // Agregar opciones para Supervisores
        if (mysqli_num_rows($resultadoSupervisores) > 0) {
            while ($filaSupervisor = mysqli_fetch_assoc($resultadoSupervisores)) {
                echo "<option value='{$filaSupervisor['supervisor_id']}'>{$filaSupervisor['nombre_supervisor']}</option>";
    
            }
        }
        ?>
        </select>
        </div>
        <div class="input-container">
            <input type="date" id="date" name="date" placeholder="FECHA" required>
        </div>
        <div class="input-container">
            <input type="text" id="lote" name="lote" placeholder="LOTE" required>
            <i class="fa-brands fa-font-awesome"></i>
            </div>
            <div class="input-container">
            <input type="text" id="ficha" name="ficha" placeholder="FICHA TÉCNICA" required>
            <i class="fa-solid fa-square-pen"></i>
            </div>
        </div>
        </div>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <div class="titulo">
            <h1>TABLA DE REGISTRO <i class="fa-solid fa-table"></i></h1>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>HORA<i class="fa-solid fa-clock"></i></th>
                    <th>PESO 1</th>
                    <th>PESO 2</th>
                    <th>PESO 3</th>
                    <th>PESO 4</th>
                    <th>PESO 5</th>
                    <th>PESO 6</th>
                    <th>PESO 7</th>
                    <th>PESO 8</th>
                    <th>PESO 9</th>
                    <th>PESO 10</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="time" id="hora" placeholder="Hora"></td>
                    <td><input type="text" id="peso1" name="peso1"></td>
                    <td><input type="text" id="peso2" name="peso2"></td>
                    <td><input type="text" id="peso3" name="peso3"></td>
                    <td><input type="text" id="peso4" name="peso4"></td>
                    <td><input type="text" id="peso5" name="peso5"></td>
                    <td><input type="text" id="peso6" name="peso6"></td>
                    <td><input type="text" id="peso7" name="peso7"></td>
                    <td><input type="text" id="peso8" name="peso8"></td>
                    <td><input type="text" id="peso9" name="peso9"></td>
                    <td><input type="text" id="peso10" name="peso10"></td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>OBSERVACIONES<i class="fa-solid fa-eye"></i>  :</th>
                    <td><textarea id="observaciones" name="observaciones" rows="4" placeholder="Escribe tu observación"></textarea></td>
                </tr>
            </thead>
        </table>
        <input type="submit" name="send" id="sendButton" value="Registrar Datos">
        <h1>RESULTADOS DE LA BASE DE DATOS</h1>
        <div class="text-center mb-2">
        <div class="search-export-container">
        <div class="input-container mb-2">
            <input type="text" class="buscar" id="searchInput" placeholder="Buscar">
            <button id="buscarButton" type="button" class="search-icon"><i class="fa-solid fa-search"></i></button>
        </div>
        <div class="export-buttons">
            <button id="exportExcelButton" onclick="exportTable()">Generar Excel</button>
        </div>
        <div class="export-buttons">
            <a href="fpdf/ReportePDF.php" target="_blank" class="btn btn-success generate-pdf">Generar PDF</a>
        </div>
        </div>
        <table class="responsive-table resultados" border="1">
        <thead>
            <tr>
                <th>FECHA</th>
                <th>CLIENTE</th>
                <th>MONITOR</th>
                <th>SUPERVISOR</th>
                <th>LOTE</th>
                <th>FICHA</th>
                <th>FOLIO</th>
                <th>HORA</th>
                <th>PESO 1</th>
                <th>PESO 2</th>
                <th>PESO 3</th>
                <th>PESO 4</th>
                <th>PESO 5</th>
                <th>PESO 6</th>
                <th>PESO 7</th>
                <th>PESO 8</th>
                <th>PESO 9</th>
                <th>PESO 10</th>
                <th>OBSERVACIONES</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
</form>
<?php
include("send.php");
?>
    <script>
    // Función para validar y convertir a mayúsculas
    function validateAndUpperCase(inputElement) {
        inputElement.value = inputElement.value.toUpperCase(); // Convierte a mayúsculas
        // Utiliza una expresión regular para permitir solo letras en mayúscula
        var regex = /^[A-Z0-9\s]+$/;
        if (!regex.test(inputElement.value)) {
            alert("Solo se permiten letras en mayúscula.");
            inputElement.value = ""; // Borra el valor si no cumple con la regla
        }
    }

    // Agrega oyente de eventos para el nuevo campo
    var customerInput = document.getElementById("customer");
    customerInput.addEventListener("input", function () {
    validateAndUpperCase(newCustomerInput);
    });

    // Obtener los elementos de los campos de monitor y supervisor
    var monitorInput = document.getElementById("monitor");
    var supervisorInput = document.getElementById("supervisor");

    // Agregar oyentes de eventos para validar y convertir a mayúsculas los campos de monitor y supervisor
    monitorInput.addEventListener("input", function () {
    validateAndUpperCase(monitorInput);
    });
    supervisorInput.addEventListener("input", function () {
    validateAndUpperCase(supervisorInput);
    });
    // Obtener el elemento de la casilla de "Ficha Técnica"
    var fichaInput = document.getElementById("ficha");

    // Agregar un oyente de eventos para el evento de entrada (input)
    fichaInput.addEventListener("input", function () {
    validateAndUpperCase(fichaInput);
    });

    // Función para validar el formulario
    function validateForm() {
        // Obtener los valores de los campos obligatorios
        var date = document.getElementById("date").value;
        var customer = document.getElementById("customer").value;
        var monitor = document.getElementById("monitor").value; // Nuevo campo de monitor
        var supervisor = document.getElementById("supervisor").value; // Nuevo campo de supervisor
        var lote = document.getElementById("lote").value;
        // Verificar si alguno de los campos está vacío
        if (date === "" || customer === "" || monitor === "" || supervisor === "" || lote === "") {
            alert("Por favor, complete todos los campos obligatorios.");
            return false; // Evitar el envío del formulario si falta algún dato
        }
        // Si todos los campos obligatorios están completos, se permite el envío
        return true;
    }
    // Agrega oyentes de eventos a los campos de cliente y lote
    var customerInput = document.getElementById("customer");
    var loteInput = document.getElementById("lote");
    customerInput.addEventListener("input", function () {
        validateAndUpperCase(customerInput);
    });
    loteInput.addEventListener("input", function () {
        validateAndUpperCase(loteInput);
    });
    document.getElementById("sendButton").addEventListener("click", function (event) {
        // Verificar si el botón presionado es el de "Registrar Datos"
        if (event.target.name === "send" && event.target.getAttribute("data-action") === "insert") {
            if (!validateForm()) {
                event.preventDefault(); // Evitar el envío del formulario si la validación falla
            }
        }
    });
    
    // Función para validar el formulario al hacer clic en el botón "Registrar Datos"
    function validateForm(event) {
    // Obtener el botón que fue clickeado
    var clickedButton = event.target;
    // Verificar si el botón presionado es el de "Registrar Datos"
    if (clickedButton.id === "sendButton" && clickedButton.getAttribute("data-action") === "insert") {
        // Obtener los valores de los campos obligatorios
        var date = document.getElementById("date").value;
        var customer = document.getElementById("customer").value;
        var lote = document.getElementById("lote").value;
        // Verificar si alguno de los campos está vacío
        if (date === "" || customer === "" || lote === "") {
            alert("Por favor, complete todos los campos obligatorios.");
            event.preventDefault(); // Evitar el envío del formulario si falta algún dato
            return false;
        }
    }
    // Si no es el botón de "Registrar Datos", permitir el envío
    return true;
    }

    // Evento de clic para el botón de búsqueda
    document.getElementById("buscarButton").addEventListener("click", function (event) {
        // Prevenir el envío del formulario
        event.preventDefault();

        // Obtener el valor de búsqueda
        const searchTerm = document.querySelector(".buscar").value;

        // Realizar la solicitud AJAX para buscar los datos en el servidor
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "buscar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reemplazar el contenido de la tabla con los resultados de la búsqueda
                const resultadoTable = document.querySelector("table.resultados");
                resultadoTable.innerHTML = xhr.responseText;
            }
        };
        xhr.send("buscar=" + searchTerm);
    });

    // Evento de clic para los botones "Editar"
    const editButtons = document.querySelectorAll(".edit-button");
    editButtons.forEach((editButton) => {
    editButton.addEventListener("click", function () {
        // Obtener el folio asociado a esta fila
        const folio = editButton.getAttribute("data-folio");
        // Redirigir a la página de edición con el folio como parámetro
        window.location.href = `editar.php?folio=${folio}`;
    });
    });

    // Evento de clic para los botones "Eliminar"
    const deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener("click", function () {
        // Obtener el folio asociado a esta fila
        const folio = deleteButton.getAttribute("data-folio");
        // Preguntar al usuario si realmente desea eliminar el registro
        if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
            // Redirigir a la página de eliminación con el folio como parámetro
            window.location.href = `eliminar.php?folio=${folio}`;
        }
    });
    });

    // Función para manejar clics en los botones "Editar" en los resultados de búsqueda
    function handleEditButtonClick(event) {
    const folio = event.target.getAttribute("data-folio");
    // Redirigir a la página de edición con el folio como parámetro
    window.location.href = `editar.php?folio=${folio}`;
    }

    // Función para manejar clics en los botones "Eliminar" en los resultados de búsqueda
    function handleDeleteButtonClick(event) {
    const folio = event.target.getAttribute("data-folio");
    // Preguntar al usuario si realmente desea eliminar el registro
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        // Redirigir a la página de eliminación con el folio como parámetro
        window.location.href = `eliminar.php?folio=${folio}`;
    }
    }

    // Agregar manejadores de eventos a los botones de editar y eliminar
    document.addEventListener("click", function (event) {
    if (event.target.classList.contains("edit-button")) {
        handleEditButtonClick(event);
    } else if (event.target.classList.contains("delete-button")) {
        handleDeleteButtonClick(event);
    }
    });

    // Función para exportar a Excel
    function exportToExcel() {
    const table = document.querySelector(".resultados");

    // Crear un libro de Excel
    const wb = XLSX.utils.book_new();
    
    // Crear una copia de la tabla excluyendo la última columna
    const tableCopy = table.cloneNode(true);
    tableCopy.querySelectorAll('tr').forEach(function(row) {
    row.deleteCell(-1); // Elimina la última celda de cada fila
    });

    // Crear una nueva hoja de trabajo a partir de la tabla copiada
    const ws = XLSX.utils.table_to_sheet(tableCopy, {
    raw: function(cellValue, cellAddress) {
        // Verificar si la celda es de tipo fecha (asumiendo que las fechas están en la primera columna)
        if (cellAddress.r > 0 && cellAddress.c === 0) {
            // Formatear la fecha como "YYYY-MM-DD" (puedes ajustar el formato según tus necesidades)
            return cellValue;
        }
        // Devolver otros valores sin cambios
        return cellValue;
    },
    });

    // Agregar la hoja de trabajo al libro
    XLSX.utils.book_append_sheet(wb, ws, "Resultados");

     // Modificar el estilo de la hoja de trabajo (esto puede variar dependiendo de la versión de la librería XLSX.js que estés usando)
     ws['!rows'] = [{ hpx: 30 }]; // Establecer el alto de fila en píxeles

    // Guardar el libro como archivo Excel
    XLSX.writeFile(wb, 'resultados.xlsx');
    }

    // Asociar la función de validación al evento de clic en el botón "Registrar Datos"
    document.getElementById("sendButton").addEventListener("click", validateForm);

    // Asociar la función de exportar a Excel al evento de clic en el botón "Exportar a Excel"
    document.getElementById("exportButton").addEventListener("click", exportToExcel);
    </script>
</body>
</html>