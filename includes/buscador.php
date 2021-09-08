<?php
function autocompletado(){
include "conexion.php";
$array = array();
$consulta = "SELECT nombre FROM productos WHERE cantidad>0";
$lista = mysqli_query($conexion,$consulta);
if(mysqli_num_rows($lista)>0){
    while($fila = mysqli_fetch_array($lista)){
        array_push($array,$fila['nombre']);
    }
}
?>


<script>

function autocompletado(arreglo){
    const inputProducto = document.querySelector('#buscador');
    let indexFocus=-1;

    inputProducto.addEventListener('input', function(){
        const tipoProducto = this.value.toUpperCase();
        if(!tipoProducto){
            cerrarLista();
            return false;
        }

        cerrarLista();       
        const divList = document.createElement('div');
        divList.setAttribute('id', this.id + '-lista-autocompletar');
        divList.setAttribute('class', 'lista-autocompletar-items');
        this.parentNode.appendChild(divList);
        if (arreglo.length==0) return false;
        arreglo.forEach(item => {
            if(item.substr(0,tipoProducto.length)==tipoProducto){
                const elementLista = document.createElement('div');
                elementLista.innerHTML = `<strong>${item.substr(0,tipoProducto.length)}</strong>${item.substr(tipoProducto.length)}`
                elementLista.addEventListener('click',function(){
                    inputProducto.value=this.innerText;
                    window.location.href="productoDetalle.php?nombre="+inputProducto.value;
                    return false;
                });
                divList.appendChild(elementLista);
            }
        });
    });

    inputProducto.addEventListener('keydown', function(e){
        const divList =document.querySelector('#'+this.id+'-lista-autocompletar');
        let items;
        if(divList){
            items = divList.querySelectorAll('div');
            switch(e.keyCode){
                case 40: //tecla de abajo
                    indexFocus++;
                    if(indexFocus>items.length-1) indexFocus = items.length-1;
                break;

                case 38: //tecla de arriba de
                    indexFocus--;
                    if(indexFocus<0) indexFocus = 0;
                break;

                case 13: //enter
                    e.preventDefault();
                    items[indexFocus].click();
                    indexFocus=-1;
                break;

                default:
                break;
            }

            seleccionar(items,indexFocus);
            return false;
        }
    });

    document.addEventListener('click',function(){
        cerrarLista();
    })
}

function seleccionar(items,indexFocus){
    if(!items || indexFocus==-1) return false;
    items.forEach(x =>{
        x.classList.remove('autocompletar-active');
    });

    items[indexFocus].classList.add('autocompletar-active');
}

function cerrarLista(){
    const items = document.querySelectorAll('.lista-autocompletar-items');
    items.forEach(item =>{
        item.parentNode.removeChild(item);
    });
    indexFocus=-1;
}


autocompletado(<?php echo json_encode($array) ?>);

</script>

<?php

}
?>