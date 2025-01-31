$(function(){
    $('#busca').on('click', function (T){ 
		
		var dato1 = $("#selecyear")[0].value.length;
      if(dato1 === 0){
        $("input#selecyear").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Año",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato2 = $("#dato")[0].value.length;
      if(dato2 === 0){
        $("input#dato").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese Producto de Busqueda",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#busca').attr('disabled', 'disabled');//desabilita boton de envio
      $('#busca').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('depavalue', $('#depavalue').prop('value'));
	  paqueteDeDatosRegi.append('selecyear', $('#selecyear').prop('value'));
      paqueteDeDatosRegi.append('dato', $('#dato').prop('value'));
      var destino = "productobusca.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alert').html(data); Limpiar(); $('#busca').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });

  });
  function Limpiar(){
    $("#depavalue").val(""); $("#selecyear").val(""); $("#dato").val(""); $('#busca').prop('disabled', false);
	}