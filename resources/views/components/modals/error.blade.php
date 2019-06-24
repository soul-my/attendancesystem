  <!-- Central Modal Medium Danger -->
  <div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
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
                  <i class="fa fa-ban fa-4x mb-3 animated rotateIn"></i>

                  @foreach($errors->all() as $error)
                    <p><strong>{{$error}}</strong></p>
                  @endforeach

              </div>
          </div>
  
          <!--Footer-->
          <div class="modal-footer justify-content-center">
              <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>
  <!-- Central Modal Medium Danger-->

