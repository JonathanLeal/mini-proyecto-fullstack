<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProductos">
                        Nuevo
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-8 offset-0 offset-lg-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabla-productos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>PRECIO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- INICIO DEL MODAL PRODUCTOS-->
    <div class="modal fade" id="modalProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Informacion del producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_productos">
                <div class="form-control">
                    <label for="nombre_pro">Producto</label>
                    <input type="text" id="nombre_pro" placeholder="nombre del producto" class="form-control">
                </div>
                <div class="form-control">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" placeholder="cantidad del producto" class="form-control">
                </div>
                <div class="form-control">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" placeholder="precio del producto" class="form-control" step=".01">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Registrar</button>
            </div>
          </div>
        </div>
      </div>
    <!-- FIN DEL MODAL PRODUCTOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        fetchData();
        function fetchData() {
        axios.get('http://127.0.0.1:8000/api/productos/list')
            .then(response => {
            const products = response.data;
            console.log(products);
            displayData(products);
            })
            .catch(error => {
            console.log(error);
            });
        }

        function displayData(products) {
        const tableBody = document.querySelector('#table-body');
        tableBody.innerHTML = '';

        for (let i = 0; i < products.length; i++) {
        const product = products[i];
        const row = `
            <tr>
            <td>${product.id_productos}</td>
            <td>${product.nombre_pro}</td>
            <td>${product.cantidad}</td>
            <td>${product.precio}</td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
        }
        }
        //para usar las alertas de sweet alert
        function show_alerts(mensaje, icono, foco) {
            if (foco !== "") {
                $('#'+foco).trigger('focus');
            }
            Swal.fire({
                title:mensaje,
                icon:icono,
                customClass: {confirmButton: "btn btn-primary", popup: "animated xoomIn"},
                buttonsStylling: false
        });
    }
    </script>
</body>
</html>