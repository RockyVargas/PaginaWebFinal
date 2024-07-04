// Definir una variable global para la función cambiarPagina
var cambiarPagina;

window.addEventListener('load', function() {
    console.log("El evento 'load' se ha disparado correctamente");

    var paginaActual = 1;
    var productosPorPagina = 8;
    var totalPaginas;

    // Función para mezclar un array
    function mezclar(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // Mientras queden elementos para mezclar...
        while (0 !== currentIndex) {

            // Selecciona un elemento sin mezclar...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // Y lo intercambia con el elemento actual
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }

    function calcularTotalPaginas() {
        var productos = document.getElementsByClassName('producto');
        totalPaginas = Math.ceil(productos.length / productosPorPagina);
    }

    // Definir la función cambiarPagina dentro del evento load
    cambiarPagina = function(direccion) {
        var nuevaPagina = paginaActual + direccion;
        if (nuevaPagina >= 1 && nuevaPagina <= totalPaginas) {
            paginaActual = nuevaPagina;
            mostrarProductos();
        }
    };

    function mostrarProductos() {
        var contenedor = document.getElementsByClassName('cudrito')[0];
        var productos = Array.from(contenedor.getElementsByClassName('producto'));
        var inicio = (paginaActual - 1) * productosPorPagina;
        var fin = inicio + productosPorPagina;

        // Ocultar todos los productos
        for (var i = 0; i < productos.length; i++) {
            if (productos[i].style.display !== 'none') {
                productos[i].style.display = 'none';
            }
        }

        // Mostrar solo los productos de la página actual
        for (var i = inicio; i < fin && i < productos.length; i++) {
            if (productos[i].style.display === 'none') {
                productos[i].style.display = '';
            }
        }
    }

    // Calcular el total de páginas y mostrar la primera página al cargar la página
    calcularTotalPaginas();
    var contenedor = document.getElementsByClassName('cudrito')[0];
    var productos = Array.from(contenedor.getElementsByClassName('producto'));
    productos = mezclar(productos); // Mezcla los productos

    // Limpia el contenedor
    while (contenedor.firstChild) {
        contenedor.removeChild(contenedor.firstChild);
    }

    // Añade los productos mezclados al contenedor
    productos.forEach(function(producto) {
        contenedor.appendChild(producto);
    });

    mostrarProductos();

    // Agregar los eventos onclick a los botones
    document.getElementById('left_btn').onclick = function() { cambiarPagina(-1); };
    document.getElementById('right_btn').onclick = function() { cambiarPagina(1); };
});
