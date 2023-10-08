<div id="modal-default-updatecustomerinquiry{{$customerinquiry->id}}" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('customerinquiry.update', array($customerinquiry->id)) !!}"> 
			{{method_field('PUT')}}
			@csrf
		<div class="modal-content">
			<!-- BEGIN: Modal Header -->
			<div class="modal-header">
				<h2 class="font-medium text-base mr-auto">Update Customer Inquiry</h2>
			</div>
			<!-- END: Modal Header -->
			<!-- BEGIN: Modal Body -->
			<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Customer</label>
					<select id="modal-form-6" name="customer_id" class="tom-select w-full">
						<option value="{{ $customerinquiry->customer->id }}">{{ $customerinquiry->customer->first_name.' '.$customerinquiry->customer->last_name }}</option>
						@foreach($customers as $customer) 
						<option value="{{ $customer->id }}">{{ $customer->first_name.' '.$customer->last_name }}</option>
						@endforeach
					</select>
				</div>

				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Inquiry Subject</label>
					<input id="inquiry_subject" name="inquiry_subject" type="text" class="form-control" value="{{ $customerinquiry->inquiry_subject }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Inquiry Details</label>
					<input id="inquiry_details" name="inquiry_details" type="text" class="form-control" value="{{ $customerinquiry->inquiry_details }}">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-6" class="form-label">Status</label>
					<select id="modal-form-6" name="status_id" class="form-select">
						<option value="{{ $customerinquiry->status->id }}">{{ $customerinquiry->status->status }}</option>
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