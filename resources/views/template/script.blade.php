<!-- JavaScript -->

<!-- Bootstrap JS -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- Vector map JavaScript -->
<script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
<script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
{{-- <script src="../assets/js/index.js"></script> --}}
<!-- App JS -->
<script src="../assets/js/app.js"></script>
{{-- <script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script> --}}

<!--Data Tables js-->
<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        //Default data table
        $('#example').DataTable({
            language: {
            url: 'indo.json'
        }
        });
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>