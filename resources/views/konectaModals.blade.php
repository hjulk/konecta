<div class="modal fade" id="modalExitoso" tabindex="-1" Productoe="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" Productoe="document">
        <div class="modal-content" id="modalInicio">
            <div class="container" id="imageModal">
                <br><br>
                <center>
                    <picture>
                        <source srcset="{{asset("images/check.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/check.png")}}" type="image/png"/>
                        <img src="{{asset("images/check.webp")}}" id="imgAlerts">
                    </picture>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="exitoAlert"></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location.reload()">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalError" tabindex="-1" Productoe="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" Productoe="document">
        <div class="modal-content" id="modalInicio">
            <div class="container" id="imageModal">
                <br><br>
                <center>
                    <picture>
                        <source srcset="{{asset("images/uncheck.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/uncheck.png")}}" type="image/png"/>
                        <img src="{{asset("images/uncheck.webp")}}" id="imgAlerts">
                    </picture>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="errorAlert"></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="location.reload()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalErrorVenta" tabindex="-1" Productoe="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" Productoe="document">
        <div class="modal-content" id="modalInicio">
            <div class="container" id="imageModal">
                <br><br>
                <center>
                    <picture>
                        <source srcset="{{asset("images/uncheck.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/uncheck.png")}}" type="image/png"/>
                        <img src="{{asset("images/uncheck.webp")}}" id="imgAlerts">
                    </picture>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="errorAlert">
                            Este producto no tiene stock disponible para la venta.
                        </p>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="location.reload()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal-productoUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Producto</h4>
            </div>
            {!! Form::open(['url' => 'actualizarProducto', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-actualizar_producto']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_producto" id="idProducto_upd">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre Producto</label>
                            {!! Form::text('nombre_producto_upd',null,['class'=>'form-control','id'=>'upd_nombre_producto','placeholder'=>'Nombre Producto','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Referencia</label>
                            {!! Form::text('referencia_upd',null,['class'=>'form-control','id'=>'upd_referencia','placeholder'=>'Referencia','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Categoría</label>
                            {!! Form::text('categoria_upd',null,['class'=>'form-control','id'=>'upd_categoria','placeholder'=>'Categoría Producto','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Precio</label>
                            {!! Form::text('precio_upd',null,['class'=>'form-control','id'=>'upd_precio','placeholder'=>'Precio','onkeypress="return numero(event)"','required']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Peso Kg</label>
                            {!! Form::text('peso_upd',null,['class'=>'form-control','id'=>'upd_peso','placeholder'=>'Peso','onkeypress="return numero(event)"','required']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Stock</label>
                            {!! Form::text('stock_upd',null,['class'=>'form-control','id'=>'upd_stock','placeholder'=>'Stock','onkeypress="return numero(event)"','required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Producto</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal-productoBuy" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Venta Producto</h4>
            </div>
            {!! Form::open(['url' => 'ventaProducto', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-actualizar_producto']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_producto_venta" id="idProducto_venta">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre Producto</label>
                            {!! Form::text('nombre_producto_venta',null,['class'=>'form-control','id'=>'venta_nombre_producto','placeholder'=>'Nombre Producto','required','readonly']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Referencia</label>
                            {!! Form::text('referencia_venta',null,['class'=>'form-control','id'=>'venta_referencia','placeholder'=>'Referencia','required','readonly']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Categoría</label>
                            {!! Form::text('categoria_venta',null,['class'=>'form-control','id'=>'venta_categoria','placeholder'=>'Categoría Producto','required','readonly']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Precio</label>
                            {!! Form::text('precio_venta',null,['class'=>'form-control','id'=>'venta_precio','placeholder'=>'Precio','onkeypress="return numero(event)"','required','readonly']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Peso Kg</label>
                            {!! Form::text('peso_venta',null,['class'=>'form-control','id'=>'venta_peso','placeholder'=>'Peso','onkeypress="return numero(event)"','required','readonly']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Cantidad</label>
                            {!! Form::number('cantidad',null,['class'=>'form-control','id'=>'cantidad','placeholder'=>'Stock','onkeypress="return numero(event)"','required','min' => '1']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Vender Producto</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>