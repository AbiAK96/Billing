<div id="modal-default-createcustomerinquiry" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('customerinquiry.store') !!}">
			@csrf
		<div class="modal-content">
			<!-- BEGIN: Modal Header -->
			<div class="modal-header">
				<h2 class="font-medium text-base mr-auto">Create Customer Inquiry</h2>
			</div>
			<!-- END: Modal Header -->
			<!-- BEGIN: Modal Body -->
			<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Customer</label>
					<select id="modal-form-6" name="customer_id" class="tom-select w-full">
						@foreach($customers as $customer) 
						<option value="{{ $customer->id }}">{{ $customer->first_name.' '.$customer->last_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Inquiry Subject</label>
					<input id="inquiry_subject" name="inquiry_subject" type="text" class="form-control" placeholder="Inquiry Subject">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Inquiry Details</label>
					<textarea id="validation-form-6" class="form-control" name="inquiry_details" placeholder="Inquiry Details" required></textarea>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Status</label>
					<select id="modal-form-6" name="status_id" class="form-select">
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
				<button type="submit" class="btn btn-primary w-20">Create</button>
			</div>
			<!-- END: Modal Footer -->
		</div>
		</form>
	</div>
</div>