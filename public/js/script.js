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

      const lista = document.getElementById("lista");
      function mostrar(valor){
        console.log(valor);
        
        $.ajax({
          url: "<?=$base;?>/scanner.php",
          method: POST,
          data: {nome: valor},
          dataType: 'json'
        }).done(function (resultado) {
          console.log(resultado);
        })
        
        bip.play();
        
      }