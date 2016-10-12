	// funciones utilizadas por las vistas	
	var visto = null;
	function mostrar(num) {
		obj = document.getElementById(num);
		obj.style.display = (obj==visto) ? 'none' : 'block';
		if (visto != null)
			visto.style.display = 'none';
		visto = (obj==visto) ? null : obj;
	}

	function mostrar2(num) {
		obj = document.getElementById(num);
		obj.style.display = (obj.style.display == 'block') ? 'none' : 'block';
	}

	function corregirNavBar() {
	    if(window.innerWidth > 499){
	    	document.getElementById(6).style.display = "block";
	    }
	    else{
	    	if (visto == null) {			    
	    		document.getElementById(6).style.display = "none";
	    	}
	    }
	}
	// mensaje
	// funcion ajax
	// reemplazar divAusarAjax por id donde se va hacer el uso de comportamiento de ajax
	// reemplazar url.php por el controlador o codigo php que retorne un contenido comunmente utilizando echo o vista
	// este ejemplo es visible para que podamos modificarlo de una vez
	function ajax(){
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("divAusarAjax").innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET","url.php",true);
		xmlhttp.send();
	}

	$(function() {
		$( "#datepicker" ).datepicker({ 
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		}).val();
	});
	$(function() {
		$( "#datepicker2" ).datepicker({ 
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		}).val();
	});

	$(function() {
		$( "#datepicker3" ).datepicker({ 
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		}).val();
	});
