<script src="{{asset('js/datepicker/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datepicker/moment.min.js')}}"></script>
<link href="{{asset('js/datepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
<script src="{{asset('js/datepicker/bootstrap-datetimepicker.min.js')}}"></script>



<script type="text/javascript">
    $('#depart_date').datetimepicker({
      format:'DD/MM/YYYY'
    });
    $('#depart_time').datetimepicker({
      format:'HH:mm:ss A'
    });
    $('#arrival').datetimepicker({
      format:'HH:mm:ss A'
    });
</script>
