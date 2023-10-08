<div id="large-slide-over-size-viewpermission{{$user->id}}" class="modal modal-slide-over" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<a data-tw-dismiss="modal" href="javascript:;">
				<i data-lucide="x" class="w-8 h-8 text-slate-400"></i>
			</a>
			<div class="modal-header p-5">
				<h3 class="font-medium text-base mr-auto">User Permission Details</h2>
			</div>
			<div class="modal-body">
				<form method="POST" action="{!! route('permission.assign') !!}"> 
					@csrf
				<table class="table table-report -mt-2" aria-hidden="true">
					<thead class="table-dark">
						<tr>
							<th class="text-center whitespace-nowrap">#</th>
							<th class="text-left whitespace-nowrap">PERMISSIONS LIST</th>
						</tr>
					</thead>
					<tbody>
		                <tbody>
							@foreach ($permissions as $permission)
								<tr class="intro-x">
									<td class="text-center">
										<input type="checkbox" name="selected_ids[]" value="{{ $permission->id }}" @foreach ($user->permissions as $userPermission) @if ($userPermission->name == $permission->name) checked @endif @endforeach> 
										<input type="text" name="user_id" value="{{ $user->id }}" hidden>
									</td>
									<td class="text-left">{{ $permission->lable }}</td>
								</tr>
							@endforeach
						</tbody>
					</tbody>
				</table>
				<div class="modal-footer">
					<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
					<button type="submit" class="btn btn-primary w-20">Update</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>