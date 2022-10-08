<!-- Vendor js -->
<script src="{{ asset('assets') }}/js/vendor.min.js"></script>

<script src="{{ asset('assets') }}/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="{{ asset('assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
<script src="{{ asset('assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="{{ asset('assets') }}/libs/select2/js/select2.min.js"></script>
<script src="{{ asset('assets') }}/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
<script src="{{ asset('assets') }}/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
<script src="{{ asset('assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- third party js -->
<script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>

<!-- plugin js -->
<script src="{{ asset('assets') }}/libs/moment/min/moment.min.js"></script>
<script src="{{ asset('assets') }}/libs/fullcalendar/main.min.js"></script>
<script src="{{ asset('assets') }}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{ asset('assets') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('assets') }}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- Calendar init -->
<script src="{{ asset('assets') }}/js/pages/calendar.init.js"></script>

@if(Request::segment(1) == 'dashboard'):
<!-- Dashboard 2 init -->
<script src="{{ asset('assets') }}/js/pages/dashboard-2.init.js"></script>
@endif
<script src="{{ asset('assets') }}/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="{{ asset('assets') }}/js/app.min.js"></script>