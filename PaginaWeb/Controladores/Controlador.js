const Carrito = require('./carrito');
const Pago = require('./pago');

let carrito = new Carrito();
let pago = new Pago();

// Agregar un producto al carrito
carrito.agregarProducto({nombre: 'Producto 1', precio: 100});

// Listar productos en el carrito
console.log(carrito.listarProductos());

// Procesar el pago
console.log(pago.procesarPago());