$(document).ready(sumaTotal());

function cambiarTotal(id){

    var cantidad= document.getElementById("cantidad"+id).value;
    var precioFinal = document.getElementById("precioFinal"+id).value;
    var total = document.getElementById("total"+id).value;

    var entero= parseInt(cantidad,10);
    var flotante = parseFloat(precioFinal,10);
    var total_f = parseFloat(total,10);
    
    total_f = entero*flotante;
    document.getElementById("total"+id).innerHTML = total_f;
    sumaTotal();
}

function sumaTotal(){
    let arreglo = document.getElementsByClassName("totalFinal");
    var acumulador = 0;
    for (var i=0;i<arreglo.length;i++){
       acumulador += parseFloat(arreglo[i].textContent,10);
        
    }
    document.getElementById("totalTotalFinal").innerHTML = "$"+acumulador;
    document.getElementById("totalTotalFinal").value = acumulador;

    document.getElementById("totalTotalFinal2").innerHTML = "$"+acumulador;
    document.getElementById("totalTotalFinal2").value = acumulador;

    console.log(document.getElementById("totalTotalFinal2").innerHTML);
    console.log(document.getElementById("totalTotalFinal2").value);
}
