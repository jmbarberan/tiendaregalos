<?php 
session_start();
if(!isset($_SESSION['carrito'])){
  header('Location: ./index.php');
}
$arreglo = $_SESSION['carrito'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda MyM &mdash;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Asegurese de rellenar con información válida</a> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detalles de Facturación</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">País <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Seleccione el país</option>    
                  <option value="2">Ecuador</option>        
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" required="">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" required="">
                </div>
              </div>

              

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Direccion del domicilio" required="">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartamento, suite, etc. (optional)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Ciudad<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Código postal <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address" required="">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Celular<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Enviar a una dirección diferente?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Dirección 2 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Apartamento, suite,etc. (optional)" required="">
                    </div>    
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Añade tus comentarios (opcional)</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Su Orden</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Productos</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php 
                      $total= 0;
                      for ($i=0;$i<count($arreglo);$i++){ 
                        $total = $total+ ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
                      
                      ?>
                      <tr>
                        <td><?php echo $arreglo[$i]['Nombre']; ?> </td>
                        <td>$<?php echo $arreglo[$i]['Precio']; ?> </td>
                      </tr>
                     
                      <?php 
                         }
                      ?>
                       <tr>
                        <td>Orden Total </td>
                        <td>$<?php echo number_format($total, 2, '.', ''); ?> </td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia Bancaria</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        
<p class="mb-0">Usted puede realizar el pago a través de una transferencia bancaria o depósito por el valor total del pedido, a las siguientes cuentas:

Banco: Produbanco, Cuenta de Ahorros

Beneficiario: Martha Moreno Serrano

Cédula: 0916668387

Número de Cuenta: 06172684000

Mail: bazarydetallesMyM@gmail.com

****************

Banco: Pacifico, Cuenta de Ahorros

Beneficiario: Odalia Moreno Serrano

Cédula: 0931536312

Número de Cuenta: 1054217792

Mail: bazarydetallesMyM@gmail.com

****************

Una vez cancelado el pedido por favor enviarnos el comprobante de su pago al correo: bazarydetallesMyM@gmail.com - Es muy importante que en el campo REMITENTE u ORDENANTE se indique N. de pedido - Nombre y Apellidos (Por ejemplo:123456 - Pepe Martinez).

Hay un plazo de 3 días laborables para realizar la transferencia después de la realización del pedido, posterior a estos días se dará de baja a su orden. No se considerará efectivo el pedido hasta que confirmemos el correspondiente pago y por tanto, los plazos de entrega comienzan a contar a partir de esta fecha.

* Recuerde que en algunas ocasiones los pagos mediante transferencia bancaria pueden demorar en hacerse efectivo hasta 1 día.

* Si el mensaje de su pedido no aparece en su bandeja de entrada recuerde revisar los correos no deseados..</p>
                      </div>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Realizar Pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>