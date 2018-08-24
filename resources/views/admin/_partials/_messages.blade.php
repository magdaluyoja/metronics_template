@if(Session::has("success"))
	<div id="alert_success" class="alert alert-success margin-bottom-30">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Successful: </strong>{{ Session::get("success") }}
	</div>
@endif

@if(count($errors) > 0)
	<div id="alert_failed" class="alert alert-danger margin-bottom-30">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Error/s:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>
@endif
<div class="modal fade" tabindex="-1" id="modal-confirm-msg" role="dialog" aria-labelledby="modal-confirm-msg-title" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-confirm-msg-title">Confirm Action</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info alert-dismissible">
	                <i class="icon fa fa-info"></i>
	                <span  id="modal-confirm-body"></span>
	            </div>	
				<input type="hidden" name="hdn-id" id="hdn-id">
				<input type="hidden" name="hdn-object" id="hdn-object">
				<input type="hidden" name="hdn-method" id="hdn-method">
                <button type="button" class="btn btn-success waves-effect float-right clear" id="btn-confirm-go-action" onclick="$M().goAction();">Yes</button>
                <button type="button" class="btn btn-warning waves-effect float-right clear" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>