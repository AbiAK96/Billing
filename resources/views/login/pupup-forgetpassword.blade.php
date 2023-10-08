<div id="modal-default-forgetpassword" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('profile.forgetpassword') !!}">
			@csrf
			<div class="modal-content">
				<!-- BEGIN: Modal Header -->
				<div class="modal-header">
					<h2 class="font-medium text-base mr-auto">Forget Password</h2>
				</div>
				<!-- END: Modal Header -->
				<!-- BEGIN: Modal Body -->
				<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
					<div class="col-span-12 sm:col-span-6">
						<label for="modal-form-1" class="form-label">Email</label>
						<input id="email" name="email" type="text" class="form-control" placeholder="Enter your email">
					</div>
				</div>
				<!-- END: Modal Body -->
				<!-- BEGIN: Modal Footer -->
				<div class="modal-footer">
					<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
					<button type="submit" class="btn btn-primary w-20">Send</button>
				</div>
				<!-- END: Modal Footer -->
			</div>
		</form>
	</div>
</div>