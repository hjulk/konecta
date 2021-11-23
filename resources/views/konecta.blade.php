<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Konecta</title>
        <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
        <link rel="stylesheet" href="{{asset("DataTables/DataTables/css/jquery.dataTables.min.css")}}">
        <link rel="stylesheet" href="{{asset("DataTables/DataTables/css/dataTables.bootstrap4.min.css")}}">
        <link rel="stylesheet" href="{{asset("DataTables/Responsive/css/responsive.bootstrap4.min.css")}}">
        <link rel="stylesheet" href="{{asset("DataTables/Buttons/css/buttons.dataTables.min.css")}}">
        <link rel="stylesheet" href="{{asset("DataTables/AutoFill/css/autofill.dataTables.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/toastr.min.css")}}">
        <link rel="stylesheet" href="{{asset("fontawesome-free/css/all.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/konecta.css")}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

        <section>
            <div class="container">
                <div class="container-fluid">
                    <br>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><i class="fas fa-store-alt nav-icon" id="enlace"></i> Productos Konecta</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Crear Producto</strong></h3>
                            </div>
                            {!! Form::open(['url' => 'crearProducto', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-crear_producto']) !!}
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Nombre Producto</label>
                                            {!! Form::text('nombre_producto',null,['class'=>'form-control','id'=>'nombre_producto','placeholder'=>'Nombre Producto','required']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Referencia</label>
                                            {!! Form::text('referencia',null,['class'=>'form-control','id'=>'referencia','placeholder'=>'Referencia','required']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Categoría</label>
                                            {!! Form::text('categoria',null,['class'=>'form-control','id'=>'categoria','placeholder'=>'Categoría Producto','required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1">Precio</label>
                                            {!! Form::text('precio',null,['class'=>'form-control','id'=>'precio','placeholder'=>'Precio','onkeypress="return numero(event)"','required']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1">Peso Kg</label>
                                            {!! Form::text('peso',null,['class'=>'form-control','id'=>'peso','placeholder'=>'Peso','onkeypress="return numero(event)"','required']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1">Stock</label>
                                            {!! Form::text('stock',null,['class'=>'form-control','id'=>'stock','placeholder'=>'Stock','onkeypress="return numero(event)"','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Producto</button>
                            </div>
                            {!!  Form::close() !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="productos" class="display table dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre Producto</th>
                                            <th>Referencia</th>
                                            <th>Categoría</th>
                                            <th>Precio</th>
                                            <th>Peso</th>
                                            <th>Stock</th>
                                            <th>Fecha Creación</th>
                                            <th>Fecha Ultima Venta</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Productos as $value)
                                            <tr>
                                                <td>{{$value['id']}}</td>
                                                <td>{{$value['nombre_producto']}}</td>
                                                <td>{{$value['referencia']}}</td>
                                                <td>{{$value['categoria']}}</td>
                                                <td>{{$value['precio_publico']}}</td>
                                                <td>{{$value['peso_producto']}}</td>
                                                <td>{{$value['stock']}}</td>
                                                <td>{{$value['fecha_creacion']}}</td>
                                                <td>{{$value['fecha_ultima_venta']}}</td>
                                                <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-productoUpd" onclick="obtener_datos_producto('{{$value['id']}}');"><i class="fas fa-edit"></i></a>&nbsp;
                                                    {!! $value['venta'] !!}&nbsp;
                                                    <a href="#" class="btn btn-danger" title="Borrar" onclick="borrar_producto('{{$value['id']}}');"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                                <input type="hidden" value="{{$value['nombre_producto']}}" id="nombre_producto{{$value['id']}}">
                                                <input type="hidden" value="{{$value['referencia']}}" id="referencia{{$value['id']}}">
                                                <input type="hidden" value="{{$value['categoria']}}" id="categoria{{$value['id']}}">
                                                <input type="hidden" value="{{$value['precio']}}" id="precio{{$value['id']}}">
                                                <input type="hidden" value="{{$value['stock']}}" id="stock{{$value['id']}}">
                                                <input type="hidden" value="{{$value['peso']}}" id="peso{{$value['id']}}">
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('konectaModals')
    </body>

    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/jquery-migrate.min.js")}}"></script>
    <script src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/adminlte.js")}}"></script>
    <script src="{{asset("DataTables/DataTables/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("DataTables/DataTables/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("DataTables/Responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("DataTables/Responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("DataTables/JsZip/jszip.min.js")}}"></script>
    <script src="{{asset("DataTables/pdfmake/pdfmake.min.js")}}"></script>
    <script src="{{asset("DataTables/pdfmake/vfs_fonts.js")}}"></script>
    <script src="{{asset("DataTables/AutoFill/js/dataTables.autoFill.min.js")}}"></script>
    <script src="{{asset("js/toastr.min.js")}}"></script>
    <script src="{{asset("js/konecta.js")}}"></script>
    <script src="{{asset("js/jquery.validate.min.js")}}"></script>
    <script src="{{asset("js/additional-methods.min.js")}}"></script>
    <script>
        @if (session("mensaje"))
            $("#modalExitoso").modal("show");
            document.getElementById("exitoAlert").innerHTML = "{{ session("mensaje") }}";
        @endif

        @if (session("precaucion"))
            $("#modalError").modal("show");
            document.getElementById("errorAlert").innerHTML = "{{ session("precaucion") }}";
        @endif

        @if (count($errors) > 0)
            $("#modalError").modal("show");
            @foreach($errors -> all() as $error)
                document.getElementById("errorAlert").innerHTML = "{{ $error }}";
            @endforeach
        @endif
    </script>
</html>
