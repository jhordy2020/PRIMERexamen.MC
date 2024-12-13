

<div class="menu">
    <h3>Menú</h3>
    <ul>
        <li><a id="inicio" class="menu-link" href="?opcion=Inicio">INICIO</a></li>

        <li class="usuario-parent">
            <a class="usuario-btn">USUARIO <i>▼</i></a>
            <ul class="submenu">
                <li><a id="ver" class="menu-link" href="?opcion=Ver">Ver</a></li>
                <li><a id="ingresar" class="menu-link" href="?opcion=Ingresar">Ingresar</a></li>
                <li><a id="modificar" class="menu-link" href="?opcion=Modificar">Modificar</a></li>
                <li><a id="eliminar" class="menu-link" href="?opcion=Eliminar">Eliminar</a></li>
            </ul>
        </li>
        
        <li class="usuario-parent">
            <a class="compras-btn"> VENTAS <i>▼</i></a>
            <ul class="submenu2">
                <li><a id="productos" class="menu-link" href="?opcion=IngresarVentas">Registro</a></li>
                <li><a id="pedidos" class="menu-link" href="?opcion=VerVentas">Detalles</a></li>
            </ul>
        </li>

        <li><a id="salir" class="menu-link" href="?opcion=Salir">SALIR</a></li>
    </ul>
</div>




    
    <script>
      const usuarioBtn = document.querySelector('.usuario-btn');
    const comprasBtn = document.querySelector('.compras-btn');
    const usuarioSubmenu = document.querySelector('.submenu'); // Submenú de Usuario
    const comprasSubmenu = document.querySelector('.submenu2'); // Submenú de Compras
    const icono = usuarioBtn.querySelector('i');
    const icono2 = comprasBtn.querySelector('i');

    // Cargar el estado del submenú desde localStorage
    const submenuState = localStorage.getItem('submenuOpen');
    const submenu2State = localStorage.getItem('submenuOpen2');

    // Si el estado guardado es 'true', abrir los submenús correspondientes
    if (submenuState === 'true') {
        usuarioSubmenu.classList.add('open');
        icono.classList.add('rotated');
    }
    if (submenu2State === 'true') {
        comprasSubmenu.classList.add('open');
        icono2.classList.add('rotated');
    }

    // Evento para alternar el submenú de Usuario
    usuarioBtn.addEventListener('click', function (e) {
        e.preventDefault();
        usuarioSubmenu.classList.toggle('open');
        icono.classList.toggle('rotated');

        // Guardar el estado del submenú de Usuario en localStorage
        const isOpen = usuarioSubmenu.classList.contains('open');
        localStorage.setItem('submenuOpen', isOpen);
    });

    // Evento para alternar el submenú de Compras
    comprasBtn.addEventListener('click', function (e) {
        e.preventDefault();
        comprasSubmenu.classList.toggle('open');
        icono2.classList.toggle('rotated');

        // Guardar el estado del submenú de Compras en localStorage
        const isOpen = comprasSubmenu.classList.contains('open');
        localStorage.setItem('submenuOpen2', isOpen);
    });


    // Seleccionamos todos los enlaces con la clase 'menu-link'
    const menuLinks = document.querySelectorAll('.menu-link');

    // Cargar el estado activo desde localStorage
    const activeLinkId = localStorage.getItem('activeLinkId'); // Obtener el ID guardado
    if (activeLinkId) {
        const activeLink = document.getElementById(activeLinkId);
        if (activeLink) {
            activeLink.classList.add('activo'); // Restaurar la clase activo
        }
    }

    // Agregar evento de clic a cada enlace
    menuLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Remover la clase activo de todos los enlaces
            menuLinks.forEach(link => link.classList.remove('activo'));

            // Agregar la clase activo al enlace clicado
            this.classList.add('activo');

            // Guardar el estado activo en localStorage
            localStorage.setItem('activeLinkId', this.id); // Guardar el ID del enlace clicado
        });
    });

    
    </script>