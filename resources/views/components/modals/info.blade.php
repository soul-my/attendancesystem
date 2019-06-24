<!-- Central Modal Medium Info -->
<div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">{{$title}}</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <p>{{$body}}</p>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Tutup</a>    
        </div>
    </div>
    <!--/.Content-->
</div>
</div>
<!-- Central Modal Medium Info-->

@section('scripts')
  <script type="text/javascript">
    $(function(){
      $('#centralModalInfo').modal('show');
    });
  </script>                          
@append