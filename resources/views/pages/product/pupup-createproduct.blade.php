<div id="modal-default-createproduct" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="{!! route('product.store') !!}">
			@csrf
		<div class="modal-content">
			<!-- BEGIN: Modal Header -->
			<div class="modal-header">
				<h2 class="font-medium text-base mr-auto">Create Product</h2>
			</div>
			<!-- END: Modal Header -->
			<!-- BEGIN: Modal Body -->
			<div class="modal-body grid grid-cols-24 gap-4 gap-y-3">
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-1" class="form-label">Product Name</label>
					<input id="product_name" name="product_name" type="text" class="form-control" placeholder="Product Name">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-2" class="form-label">Product Code</label>
					<input id="product_code" name="product_code" type="text" class="form-control" placeholder="Product Code">
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-5" class="form-label">Description</label>
					<textarea id="validation-form-6" class="form-control" name="description" placeholder="Description" required></textarea>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<label for="modal-form-3" class="form-label">Unit Price</label>
					<input id="address_line_1" name="unit_price" type="text" class="form-control" placeholder="Unit Price">
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