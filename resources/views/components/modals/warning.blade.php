
  
<!-- Central Modal Medium Warning -->
<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-notify modal-warning" role="document">
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
					{{$body}}
				</div>
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<button id="{{$id}}-btn" type="{{$btn_type}}" class="btn btn-warning">{{$btn_title}}</a></button>
				<a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">Kembali</a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!-- Central Modal Medium Warning-->
  
                                          
