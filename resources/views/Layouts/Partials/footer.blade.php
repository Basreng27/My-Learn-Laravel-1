<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ plugins() }}/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ plugins() }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ plugins() }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ dist() }}/js/adminlte.js"></script>

<!-- PAGE -->
<!-- jQuery Mapael -->
<script src="{{ plugins() }}/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ plugins() }}/raphael/raphael.min.js"></script>
<script src="{{ plugins() }}/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ plugins() }}/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ plugins() }}/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ dist() }}/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ dist() }}/js/pages/dashboard2.js"></script>

{{-- Jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{ styleCustom() }}/js/ajax.js">
<link rel="stylesheet" href="{{ styleCustom() }}/js/custom.js">

@stack('plugin-scripts')
{{-- penggunaanya --}}
{{-- @push('plugin-scripts')
@endpush --}}

@stack('custom-scripts')
{{-- penggunaanya --}}
{{-- @push('custom-scripts')
@endpush --}}
