<script src="{{ plugins() }}/jquery/jquery.min.js"></script>
<script src="{{ plugins() }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ plugins() }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{ dist() }}/js/adminlte.js"></script>
<script src="{{ plugins() }}/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ plugins() }}/raphael/raphael.min.js"></script>
<script src="{{ plugins() }}/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ plugins() }}/jquery-mapael/maps/usa_states.min.js"></script>
<script src="{{ plugins() }}/chart.js/Chart.min.js"></script>
<script src="{{ dist() }}/js/demo.js"></script>
<script src="{{ dist() }}/js/pages/dashboard2.js"></script>
<script src="{{ plugins() }}/select2/js/select2.full.min.js"></script>
<script src="{{ plugins() }}/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="{{ plugins() }}/moment/moment.min.js"></script>
<script src="{{ plugins() }}/inputmask/jquery.inputmask.min.js"></script>
<script src="{{ plugins() }}/daterangepicker/daterangepicker.js"></script>
<script src="{{ plugins() }}/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ plugins() }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="{{ plugins() }}/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{ plugins() }}/bs-stepper/js/bs-stepper.min.js"></script>
<script src="{{ plugins() }}/dropzone/min/dropzone.min.js"></script>
<script src="{{ plugins() }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ plugins() }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ plugins() }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ plugins() }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ plugins() }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ plugins() }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ plugins() }}/jszip/jszip.min.js"></script>
<script src="{{ plugins() }}/pdfmake/pdfmake.min.js"></script>
<script src="{{ plugins() }}/pdfmake/vfs_fonts.js"></script>
<script src="{{ plugins() }}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ plugins() }}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ plugins() }}/datatables-buttons/js/buttons.colVis.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script> --}}

<script src="{{ styleCustom() }}/js/ajax.js"></script>
<script src="{{ styleCustom() }}/js/custom.js"></script>
<script src="{{ styleCustom() }}/js/helpers/datatables.js"></script>
<script src="{{ styleCustom() }}/js/helpers/common.js"></script>

@stack('plugin-scripts')
{{-- penggunaanya --}}
{{-- @push('plugin-scripts')
@endpush --}}

@stack('custom-scripts')
{{-- penggunaanya --}}
{{-- @push('custom-scripts')
@endpush --}}
