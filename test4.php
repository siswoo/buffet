<!DOCTYPE html>
<html>
<head>
</head>

<body>
  <p id="parrafo">
    Hola, soy un párrafo. También puedo ser <strong>impreso</strong>
    <br> Olvidé decir que también puedo contener imágenes :)
    <br>
    <img src="https://d1q6f0aelx0por.cloudfront.net/product-logos/81630ec2-d253-4eb2-b36c-eb54072cb8d6-golang.png">
  </p>
  <button id="btnImprimirParrafo">Imprimir párrafo</button>

  <!--<script src="script.js"></script>-->
</body>

</html>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">

document.querySelector("#btnImprimirParrafo").addEventListener("click", function() {
  var parrafo = document.querySelector("#parrafo");
  imprimirElemento(parrafo);
});

function imprimirElemento(elemento) {
  var ventana = window.open('', 'PRINT', 'height=400,width=600');
  ventana.document.write('<html><head><title>' + document.title + '</title>');
  /*ventana.document.write('<link rel="stylesheet" href="imprimir.css">'); //Cargamos otra hoja, no la normal*/
  ventana.document.write('</head><body >');
  ventana.document.write(elemento.innerHTML);
  ventana.document.write('</body></html>');
  ventana.document.close();
  ventana.focus();
  ventana.onload = function() {
    ventana.print();
    ventana.close();
  };
  return true;
}
</script>