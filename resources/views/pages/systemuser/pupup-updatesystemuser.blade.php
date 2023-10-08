<div id="modal-default-updatesystemuser{{$user->id}}" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('systemuser.update', array($user->id)) !!}"> 
			{{method_field('PUT')}}
			@csrf
		<div class="modal-content">
			<!-- BEGIN: Modal Header -->
			<div class="modal-header">
				<h2 class="font-medium text-base mr-auto">Update System User</h2>
			</div>
			<!-- END: Modal Header -->
			<!-- BEGIN: Modal Body -->
			<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-1" class="form-label">First Name</label>
					<input id="first_name" name="first_name" type="text" class="form-control" value="{{ $user->first_name }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Last Name</label>
					<input id="last_name" name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">Identification No</label>
					<input id="email" name="identity_no" type="text" class="form-control" value="{{ $user->indentity_no }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-3" class="form-label">Address Line 1</label>
					<input id="address_line_1" name="address_line_1" type="text" class="form-control" value="{{ $user->address_line_1 }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-3" class="form-label">Address Line 2</label>
					<input id="address_line_2" name="address_line_2" type="text" class="form-control" value="{{ $user->address_line_2 }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-4" class="form-label">County</label>
					<input id="county" name="county" type="text" class="form-control" value="{{ $user->county }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">City</label>
					<input id="city" name="city" type="text" class="form-control" value="{{ $user->city }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Post Code</label>
					<input id="post_code" name="post_code" type="text" class="form-control" value="{{ $user->post_code }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">Country</label>
					<input id="country" name="country" type="text" class="form-control" value="{{ $user->country }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">Mobile No</label>
					<input id="mobile_no" name="mobile_no" type="text" class="form-control" value="{{ $user->mobile_no }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">Email</label>
					<input id="email" name="email" type="text" class="form-control" value="{{ $user->email }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Status</label>
					<select id="modal-form-6" name="status_id" class="form-select">
						<option value="{{ $user->status->id }}">{{ $user->status->status }}</option>
						@foreach($status as $stu) 
						<option value="{{ $stu->id }}">{{ $stu->status }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<!-- END: Modal Body -->
			<!-- BEGIN: Modal Footer -->
			<div class="modal-footer">
				<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
				<button type="submit" class="btn btn-primary w-20">Update</button>
			</div>
			<!-- END: Modal Footer -->
		</div>
		</form>
	</div>
</div>