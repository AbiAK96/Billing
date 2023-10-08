    <!-- BEGIN: Delete Confirmation Modal -->
	<div id="modal-default-deleteproduct{{ $product->id }}" class="modal" tabindex="-1" aria-hidden="true">
		<form method="POST" action="{!! route('product.delete', array($product->id)) !!}">
			@csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
	</form>
    </div>
    <!-- END: Delete Confirmation Modal -->