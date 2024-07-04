let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

// Función para agregar un producto al carrito
function agregarProducto(id, nombre, precio) {
    // Verificar si el producto ya está en el carrito
    let encontrado = carrito.find(item => item.id === id);

    if (encontrado) {
        encontrado.cantidad++;
    } else {
        carrito.push({ id, nombre, precio, cantidad: 1 });
    }

    localStorage.setItem('carrito', JSON.stringify(carrito));

    mostrarCarrito();
}

// Función para mostrar los productos en el carrito
function mostrarCarrito() {
    const listaCarrito = document.getElementById('lista-carrito');
    listaCarrito.innerHTML = '';

    const total = carrito.reduce((acc, item) => acc + (item.precio * item.cantidad), 0);

    carrito.forEach(item => {
        const li = document.createElement('li');
        li.innerHTML = `${item.nombre} - Cantidad: ${item.cantidad} - Precio: S/ ${item.precio * item.cantidad}`;
        listaCarrito.appendChild(li);
    });

    listaCarrito.innerHTML += `<div class="total">Total: S/ ${total.toFixed(2)}</div>`;
}


// Función para calcular el total del carrito
function calcularTotal() {
    const total = carrito.reduce((acc, item) => acc + (item.precio * item.cantidad), 0);
    document.getElementById('total-carrito').textContent = `S/ ${total.toFixed(2)}`;
}

function comprar() {
    // Puedes pasar los datos del carrito como parámetros de la URL si es necesario
    window.location.href = 'pago.php';
}

// Función para vaciar el carrito
function vaciarCarrito() {
    carrito = [];
    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
}

// Evento para agregar producto al hacer clic en "Agregar al carrito"
document.querySelectorAll('.agregar-carrito').forEach(button => {
    button.addEventListener('click', () => {
        const producto = button.parentElement;
        const id = producto.getAttribute('data-id');
        const nombre = producto.getAttribute('data-nombre');
        const precio = parseFloat(producto.getAttribute('data-precio'));
        agregarProducto(id, nombre, precio);
    });
});

// Evento para vaciar el carrito
document.getElementById('vaciar-carrito').addEventListener('click', vaciarCarrito);

// Mostrar carrito al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    mostrarCarrito();
    document.getElementById('boton-pago').addEventListener('click', function () {
        Swal.fire({
            title: "Procesar Pago?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Tienda",
            denyButtonText: `Tarjeta`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = 'confirmacion.php'; // Redirige a la página de pago
            } else if (result.isDenied) {
                window.location.href = 'pago.php'; // Redirige a la página de pago
            }
        });

    });
});