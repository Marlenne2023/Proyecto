<script>
//SCRIPT PARA BORRAR REGISTROS
function borrar(id) {

  Swal.fire({
    title: '¿Estás seguro?', //TITULO MODAL
    text: 'No podrás revertir los cambios.', //MENSAJE
    showConfirmButton: true, //SE MUESTRA EL BOTÓN DE CONFIRMACIÓN
    showCancelButton: true, //SE MUESTRA EL BOTÓN DE CANCELAR
    confirmButtonText: 'Confirmar', //TEXTO BOTÓN CONFIRMAR
    confirmButtonColor: '#3085d6', //COLOR BOTÓN CONFIRMAR
    cancelButtonText: 'Cancelar', //TEXTO BOTÓN CANCELAR 
    cancelButtonColor: '#DC3741', //COLOR BOTÓN CANCELAR
    icon: 'warning', //ANIMACIÓN QUE SE MOSTRARÁ
  }).then((result) => {

    if (result.isConfirmed) {
      window.location = "dependientes.php?txtID=" + id; //REDIRECCIÓN AL INDEX
    }
  })
}
</script>
