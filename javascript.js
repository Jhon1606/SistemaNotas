 function filtrar(consulta){
     if(consulta == ""){
        window.location.assign("index.php");
     }else{
        window.location.assign("index.php?consulta=" + consulta);
     }
 }