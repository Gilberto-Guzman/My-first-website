<?php
    session_start();
    if(!isset($_SESSION['codusu'])){
        header('location: index.php');
    }
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Tienda de Abarrotes</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include ("layouts/_main-header.php"); ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Mis pedidos</h3>
            <div class="body-pedidos" id="space-list">
            </div>
            <h3>Datos de pago</h3>
            <div class="p-line"><div>Monto total:</div>$ <span id="montototal"></span></div>
            <div class="p-line"><div>Banco:</div>BBVA</div>
            <div class="p-line"><div>Numero de Cuenta:</div>0000-0000-0000-0000</div>
            <div class="p-line"><div>Representante:</div>Encargado de Ventas</div>
            <p><b>NOTA:</b> Para confirmar la compra debe realizar el deposito por el monto total, 
            y enviar el comprobante al siguiente correo EncargadodeVentas@gmail.com o 
            al numero de Whatsapp 000-000-000</p>
        </div>
    </div>

	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_procesados.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
                    let monto=0;
					//Muestra los productos de la base de datos
					for (var i = 0; i < data.datos.length; i++) {
						html+=	
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/products/'+data.datos[i].rutimapro+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nompro+'</h3>'+
								'<p><b>Precio:</b> $'+data.datos[i].prepro+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estadotext+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telusuped+'</p>'+
							'</div>'+
						'</div>';
                        if(data.datos[i].estado=="2"){
                            monto+=parseFloat(data.datos[i].prepro);
                        }
					}
					document.getElementById("montototal").innerHTML=monto;
                    document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
    </script>
</body>
</html>