<!-- jQuery 2.2.3 -->
{{Html::script("plugins/jQuery/jquery-2.2.3.min.js")}}
<!-- jQuery UI 1.11.4 -->
{{Html::script("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js")}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
  $('i.fa-close.close-msg').click(function(){
  	$('#flashMessage').remove();
  })
  $('.btnDelete').click(function(){
  	if(confirm('Are you sure you want delete?')){
  		window.location.href=$(this).attr('data-url');
  	}
  });
</script>
<!-- Bootstrap 3.3.6 -->
{{Html::script("bootstrap/js/bootstrap.min.js")}}
<!-- Morris.js charts -->
{{Html::script("https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js")}}
{{Html::script("plugins/morris/morris.min.js")}}
<!-- Sparkline -->
{{Html::script("plugins/sparkline/jquery.sparkline.min.js")}}
<!-- jvectormap -->
{{Html::script("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}
{{Html::script("plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}
<!-- jQuery Knob Chart -->
{{Html::script("plugins/knob/jquery.knob.js")}}
<!-- daterangepicker -->
{{Html::script("https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js")}}
{{Html::script("plugins/daterangepicker/daterangepicker.js")}}
<!-- datepicker -->
{{Html::script("plugins/datepicker/bootstrap-datepicker.js")}}
<!-- Bootstrap WYSIHTML5 -->
{{Html::script("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}
<!-- Slimscroll -->
{{Html::script("plugins/slimScroll/jquery.slimscroll.min.js")}}
<!-- FastClick -->
{{Html::script("plugins/fastclick/fastclick.js")}}
<!-- AdminLTE App -->
{{Html::script("dist/js/app.min.js")}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{Html::script("dist/js/pages/dashboard.js")}}
<!-- AdminLTE for demo purposes -->
{{Html::script("dist/js/demo.js")}}