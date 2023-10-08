<div id="modal-default-changepassword" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('profile.password' , array(Auth::user()->id)) !!}">
			@csrf
			{{method_field('PUT')}}
			<div class="modal-content">
				<!-- BEGIN: Modal Header -->
				<div class="modal-header">
					<h2 class="font-medium text-base mr-auto">Change Password</h2>
				</div>
				<!-- END: Modal Header -->
				<!-- BEGIN: Modal Body -->
				<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
					<div class="col-span-12 sm:col-span-6">
						<label for="modal-form-1" class="form-label">Old Password</label>
						<input id="old_password" name="old_password" type="text" class="form-control" placeholder="Old Password">
					</div>
					<div class="col-span-12 sm:col-span-6">
						<label for="modal-form-2" class="form-label">New Password</label>
						<input id="new_password" name="new_password" type="text" class="form-control" placeholder="New Password">
					</div>
				</div>
				<!-- END: Modal Body -->
				<!-- BEGIN: Modal Footer -->
				<div class="modal-footer">
					<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
					<button type="submit" class="btn btn-primary w-20">Change</button>
				</div>
				<!-- END: Modal Footer -->
			</div>
		</form>
	</div>
</div>