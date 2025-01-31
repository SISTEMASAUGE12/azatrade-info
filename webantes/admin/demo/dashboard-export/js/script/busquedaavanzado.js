$(function(){
    $('#busca').on('click', function (T){ 
		
		var dato1 = $("#selecanios")[0].value.length;
      if(dato1 === 0){
        $("select#selecanios").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Año",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato2 = $("#selecmes")[0].value.length;
      if(dato2 === 0){
        $("select#selecmes").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Mes",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var regua = $("#depa")[0].value.length;
		var regub = $("#pais")[0].value.length;
		var reguc = $("#aduana")[0].value.length;
		
      if(regua === 0 && regub===0 && reguc===0){
		  swal({
      title: 'Campo Vacio!',
      text: "Debe seleccionar un campo adiconal mas como: Departamento, Pais o Aduanas",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	
		
	var tuchek = $("#md_checkbox_1").is(":checked");
	//if(!tuchek){ //si esta sin marcar
	if(tuchek){ // si esta marcado
		var chepar = $("#numpar")[0].value.length;
      if(chepar === 0){
        $("input#numpar").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese Numero de Partida",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	}
	

      $('#busca').attr('disabled', 'disabled');//desabilita boton de envio
      $('#busca').val("Procesando envio espere...");//cambia texto de boton}
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('selecanios', $('#selecanios').prop('value'));
	  paqueteDeDatosRegi.append('selecmes', $('#selecmes').prop('value'));
      paqueteDeDatosRegi.append('depa', $('#depa').prop('value'));
		paqueteDeDatosRegi.append('pais', $('#pais').prop('value'));
		paqueteDeDatosRegi.append('aduana', $('#aduana').prop('value'));
		paqueteDeDatosRegi.append('ruce', $('#ruce').prop('value'));
		paqueteDeDatosRegi.append('descri1', $('#descri1').prop('value'));
		if(tuchek){
		paqueteDeDatosRegi.append('marcacheck', $('#md_checkbox_1').prop('value'));
		}
		paqueteDeDatosRegi.append('numpar', $('#numpar').prop('value'));
      var destino = "buscaresultado.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alert').html(data); desplaza(); Limpiar(); $('#busca').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });

  });
  function Limpiar(){
    $("#depavalue").val(""); $("#selecyear").val(""); $("#dato").val(""); $('#busca').prop('disabled', false);
	}

function justNumbers(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function mostrarOcultar(id){
var elemento = document.getElementById(id);
if(!elemento) {
return true;
}
if (elemento.style.display == "none") {
elemento.style.display = "block"
$("#numpar").val("");
} else {
elemento.style.display = "none"
//document.getElementById("md_checkbox_1").checked = false;
};
return true;
}

function desplaza(){
	$('html, body').animate({
           'scrollTop':   $('#alert').offset().top
         }, 1000); //ancla hacia el DIV
}