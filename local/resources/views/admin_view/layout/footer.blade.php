<div class="footer">
                            
    <div>
        <strong>Edgars Catering Services</strong>  &copy; 2022
    </div>
</div>
</div>

<div id="right-sidebar" class="animated">
<div class="sidebar-container">

   

    <div class="tab-content">


        <div id="tab-1" class="tab-pane active">

            <div class="sidebar-title">
                <h3> <i class="fa fa-key"></i> Change Password</h3>
                
            </div>

            <div>

                <div class="sidebar-message">
                    <a href="#">
                       
                        <div class="media-body">

                            <button>Change Password</button>
                            <br>
                          
                        </div>
                    </a>
                </div>

             
                
               
            </div>

        </div>

        


    </div>
</div>
</div>
</div>

<!-- Mainly scripts -->
<script src="{{url('local/public/admin_assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/popper.min.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/bootstrap.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{url('local/public/admin_assets/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{url('local/public/admin_assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/demo/peity-demo.js')}}"></script>

<!-- jQuery UI -->
<script src="{{url('local/public/admin_assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- GITTER -->
<script src="{{url('local/public/admin_assets/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{url('local/public/admin_assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{url('local/public/admin_assets/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{url('local/public/admin_assets/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Toastr -->
<script src="{{url('local/public/admin_assets/js/plugins/toastr/toastr.min.js')}}"></script>

<!-- datatable -->
<script src="{{url('local/public/admin_assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{url('local/public/admin_assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>


 <!-- Custom and plugin javascript -->
 <script src="{{url('local/public/admin_assets/js/inspinia.js')}}"></script>
 <script src="{{url('local/public/admin_assets/js/plugins/pace/pace.min.js')}}"></script>


<script>
$(document).ready(function() {



});
</script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // { extend: 'copy'},
                    // {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
            
                ]

            });

            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('', 'Welcome Admin');

            }, 1300);

        });

    </script>
</body>
</html>
<!--  -->