@push("script")
  <script type="text/javascript">
    $(document).ready(function(){
        $.notify({
          // options
          message: '{{$pesan}}' 
        },{
          // settings
          type: '{{$status}}'
        });
    });
  </script>
@endpush