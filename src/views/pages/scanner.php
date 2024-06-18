<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <link rel="stylesheet" href="<?=$base;?>/css/estilo.css">
    <script type="text/javascript" src="<?=$base;?>/css/instascan.min.js"></script>
  </head>
  <body>
    <video id="preview"></video>

    <br><br><hr>

    <form action="registrarPontos.php" method="post"></form>

    </ul>

    <script src="<?=$base;?>/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        let valor;
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        mostrar(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      // bip OK
      const bip = new Audio();
        bip.src = "<?=$base;?>/media/bip.mp3";

      function mostrar(valor){
        console.log(valor);
        
        $.ajax({
          url: "<?=$base;?>/registrarPontos",
          method: "POST",
          data: {nome: valor, pontos: "10"},
        }).done(function (resultado) {
          console.log(resultado);
        })
        
        bip.play();
        
      }
      
    </script>
  </body>
</html>