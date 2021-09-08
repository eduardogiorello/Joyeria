function alerta(){
		
			Swal.fire({
				 title: '<strong>¡ Buen trabajo !</strong>',
				  icon: 'success',
 
				confirmButtonText: `Cerrar`,

			}).then((result) => {
				
				if (result.isConfirmed) {
					
					window.location.href="index.php";
				}
			})
		}

