<div id="modal-default-createtax" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('tax.store') !!}">
			@csrf
		<div class="modal-content">
			<!-- BEGIN: Modal Header -->
			<div class="modal-header">
				<h2 class="font-medium text-base mr-auto">Create Tax</h2>
			</div>
			<!-- END: Modal Header -->
			<!-- BEGIN: Modal Body -->
			<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Tax Code</label>
					<input id="inquiry_subject" name="tax_code" type="text" class="form-control" placeholder="Tax Code">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Tax Name</label>
					<input id="inquiry_subject" name="tax_name" type="text" class="form-control" placeholder="Tax Name">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Percentage</label>
					<input id="inquiry_subject" name="percentage" type="text" class="form-control" placeholder="Percentage">
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