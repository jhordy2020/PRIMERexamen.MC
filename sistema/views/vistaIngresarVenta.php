<?php  
function mostrarFormularioIngresoVenta($mensaje = '')
{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Venta</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('/css/estiloIngresarDatos.css'); ?>">
        <style>

            /* ocultando la descripcion */
            #datdescripcion, #datproducto{
                display: none;
            }

             #addProducto{
                width: 50px !important;
                background: #a8aca8

            }
            #addProducto:hover{
                background-color: #45a049;
            }

            .pdt_datos{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }
            .pdt_datos label{
                margin: 0 1rem;
            }

            .pdt_datos button{
                margin: 0.2rem
            }

            #dattotal, #datcantidad{
                width: 70%;
                margin-top: 16px;
            }
            .table {
                max-height: 150px;
                overflow-y: auto;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            table, th, td {
                border: 1px solid #ccc;
            }
            th, td {
                padding: 10px;
                text-align: center;
            }
            th {
                background-color: #f6f6f6;
                color: #313131;
            }
            input[readonly] {
                background-color: #f4f4f4;
            }
            .btn-editar, .btn-eliminar {
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                font-size: 12px;
                cursor: pointer;
                color: white;
            }
            .btn-editar {
                background-color: #ffa500; /* Naranja */
                display: none; /* Ocultar el botón por defecto */
            }
            .btn-editar:hover {
                background-color: #ff8c00;
            }
            .btn-eliminar {
                background-color: #ff4d4d; /* Rojo */
            }
            .btn-eliminar:hover {
                background-color: #e60000;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h2>Registrar Venta</h2>
            <?php if (!empty($mensaje)): ?>
                <div class="message">
                    <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo get_urlBase('/controllers/controladorIngresarVenta.php'); ?>" method="POST">
                <label for="dat_producto">Producto ID</label>
                <div class="input-group">
                    <input type="text" name="dat_producto" id="dat_producto" autocomplete="off">
                    <input type="text" id="datproducto" name="datproducto" readonly>
                    <button type="button" class="btn-lupa" id="openModal">

                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="12.08px" height="12.08px" viewBox="0 0 612.08 612.08" style="enable-background:new 0 0 612.08 612.08;"
                        xml:space="preserve" fill="#ffffff">
                    <g>
                        <path d="M237.927,0C106.555,0,0.035,106.52,0.035,237.893c0,131.373,106.52,237.893,237.893,237.893
                            c50.518,0,97.368-15.757,135.879-42.597l0.028-0.028l176.432,176.433c3.274,3.274,8.48,3.358,11.839,0l47.551-47.551
                            c3.274-3.274,3.106-8.703-0.028-11.838L433.223,373.8c26.84-38.539,42.597-85.39,42.597-135.907C475.82,106.52,369.3,0,237.927,0z
                            M237.927,419.811c-100.475,0-181.918-81.443-181.918-181.918S137.453,55.975,237.927,55.975s181.918,81.443,181.918,181.918
                            S338.402,419.811,237.927,419.811z"/>
                    </g>
                    </svg>

                    </button>
                </div>

                <div class="pdt_datos">
                    <label for="datcantidad_1">Cantidad</label>
                    <input type="number" name="datcantidad_1" id="datcantidad_1" autocomplete="off" min="1" step="1">

                    <label for="dat_precio_unitario">Precio Unitario</label>
                    <input type="number" name="dat_precio_unitario" id="dat_precio_unitario" class="dat_precio_unitario"  autocomplete="off" min="0.01" step="0.01">

                    <label for="dat_total_unitario">Total</label>
                    <input type="number" id="dat_total_unitario" name="dat_total_unitario" readonly>

                    
                </div>

                <div class= "pdt_datos">
                    <label for="datcantidad">Cantidad Acumulado</label>
                    <input type="number" name="datcantidad" id="datcantidad" required readonly>

                    <label for="datfecha">Fecha</label>
                    <input type="date" name="datfecha" id="datfecha" required autocomplete="off">


                    <label for="dattotal">Total Acumulado</label>
                    <input type="number" name="dattotal" id="dattotal" required readonly >

                    <input type="text" id="datdescripcion" name="datdescripcion" required readonly>

                    <div class="input-group">
                        <button type="button" class="btn" id="addProducto"> + </button>
                    </div>
                </div>

                <div class="table">
                    <table id="productosTable">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los productos agregados aparecerán aquí -->
                        </tbody>
                    </table>
                </div>
                <br>
                <button type="submit">Registrar Venta</button>
            </form>
        </div>

        <script>
            // Selección de elementos del DOM
            const cantidadInput = document.getElementById('datcantidad_1');
            const precioInput = document.getElementById('dat_precio_unitario');
            const totalInput = document.getElementById('dat_total_unitario');
            const productoInput = document.getElementById('dat_producto');
            const productoAcumuladoInput = document.getElementById('datproducto');
            const cantidadAcumuladoInput = document.getElementById('datcantidad');
            const dattotalInput = document.getElementById('dattotal');
            const descripcionInput = document.getElementById('datdescripcion');
            const productosTableBody = document.getElementById('productosTable').querySelector('tbody');
            const addProductoBtn = document.getElementById('addProducto');
            let totalGeneral = 0; // Acumulador del total general
            let totalCGeneral = 0; // Acumulador de la cantidad general

            // Función para calcular el subtotal automáticamente
            function calcularTotal() {
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const precio = parseFloat(precioInput.value) || 0;
                totalInput.value = (cantidad * precio).toFixed(2);
            }

            // Eventos de entrada para calcular el subtotal
            cantidadInput.addEventListener('input', calcularTotal);
            precioInput.addEventListener('input', calcularTotal);

            // Actualizar el campo de descripción con los datos de la tabla
            function actualizarDescripcion() {
                let descripcion = '';
                let prod = '';
                const rows = productosTableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    const columns = row.querySelectorAll('td');
                    descripcion += `{ Producto: \"${columns[0].innerText}\", Cantidad: ${columns[1].innerText}, Precio: ${columns[2].innerText}, Subtotal: ${columns[3].innerText} }, \n`;
                    prod += `${columns[0].innerText},`;
                });
                descripcionInput.value = descripcion.trim(); // Actualizar el input con la descripción
                productoAcumuladoInput.value = prod.trim();
            }

            // Evento al hacer clic en el botón "Agregar Producto"
            addProductoBtn.addEventListener('click', () => {
                const producto = productoInput.value.trim();
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const precio = parseFloat(precioInput.value) || 0;
                const subtotal = parseFloat(totalInput.value) || 0;

                if (!producto || cantidad <= 0 || precio <= 0) {
                    alert('Por favor, completa todos los campos correctamente antes de agregar un producto.');
                    return;
                }

                // Agregar el producto a la tabla
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${producto}</td>
                    <td>${cantidad}</td>
                    <td>${precio.toFixed(2)}</td>
                    <td>${subtotal.toFixed(2)}</td>
                    <td>
                        <button class="btn-eliminar">Eliminar</button>
                    </td>
                `;

                productosTableBody.appendChild(row);

                // Actualizar el total acumulado
                totalGeneral += subtotal;
                dattotalInput.value = totalGeneral.toFixed(2);
                totalCGeneral += cantidad;
                cantidadAcumuladoInput.value = totalCGeneral;

                // Actualizar la descripción
                actualizarDescripcion();

                // Limpiar los campos para agregar un nuevo producto
                productoInput.value = '';
                cantidadInput.value = '';
                precioInput.value = '';
                totalInput.value = '';

                // Agregar evento al botón "Eliminar"
                const btnEliminar = row.querySelector('.btn-eliminar');
                btnEliminar.addEventListener('click', () => {
                    row.remove(); // Eliminar la fila de la tabla
                    totalGeneral -= subtotal; // Restar el subtotal del total acumulado
                    dattotalInput.value = totalGeneral.toFixed(2);
                    totalCGeneral -= cantidad;
                    cantidadAcumuladoInput.value = totalCGeneral;
                    actualizarDescripcion(); // Actualizar la descripción después de eliminar
                });
            });
        </script>
    </body>
    </html>
    <?php
}
?>