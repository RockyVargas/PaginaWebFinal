document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('search_btn').addEventListener('click', function(event) {
        // Prevenir el comportamiento predeterminado del formulario
        event.preventDefault();

        var search = document.getElementById('search');
        var productos = document.getElementsByClassName('producto');
        var producto; // Declarar la variable producto aquí

        if (search && productos) {
            var searchValue = search.value.toLowerCase();

            for (var i = 0; i < productos.length; i++) {
                producto = productos[i]; // Asignar el valor a la variable producto
                var nombre = producto.getAttribute('data-name').toLowerCase();

                if (nombre.indexOf(searchValue) !== -1) {
                    producto.style.display = '';
                } else {
                    producto.style.display = 'none';
                }
            }
        } else {
            console.log('No se pudo encontrar el elemento de búsqueda o los productos');
        }
    });
});
