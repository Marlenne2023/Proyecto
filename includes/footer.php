</div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer>
     <p> **En cumplimiento del principio de calidad de los datos personales, expresado en los lineamientos de la
      Institución, el usuario se <br>compromete a facilitar datos verdaderos, exactos, completos y actualizados, de
      forma que respondan con veracidad a la situación de este.</p>
   
   </footer>
</div>
<!-- ./wrapper -->

</div>
</div>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

<!-- REQUIRED SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>

<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

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

</body>
</html>
