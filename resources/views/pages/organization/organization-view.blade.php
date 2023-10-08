@extends('../layout/' . $layout)

@section('subhead')
    <title>Organization</title>
@endsection

@section('subcontent')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
@elseif(session()->has('error'))
<div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
@endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Organization</h2>
    </div>
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Organization Information</h2>
                </div>
                <div class="p-5">
                    <form method="POST" action="{!! route('organization.update', array($organization->id)) !!}" enctype="multipart/form-data"> 
                        {{method_field('PUT')}}
                        @csrf
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
              
                                <div class="col-span-12 2xl:col-span-6">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Organization Name</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="organization_name" value="{{ $organization->organization_name }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3" class="form-label">Address Line 2</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="address_line_2" value="{{ $organization->address_line_2 }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3" class="form-label">City</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="city" value="{{ $organization->city }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3" class="form-label">Country</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="country" value="{{ $organization->country }}">
                                    </div>
                                </div>
                                <div class="col-span-12 2xl:col-span-6">
                                    <div class="mt-3 2xl:mt-0">
                                        <label for="update-profile-form-3" class="form-label">Address Line 1</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="address_line_1" value="{{ $organization->address_line_1 }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">County</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="county" value="{{ $organization->county }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">Post Code</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="post_code" value="{{ $organization->post_code }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">mobile_no </label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="mobile_no" value="{{ $organization->mobile_no }}">
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <label for="update-profile-form-5" class="form-label">Email</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="email" value="{{ $organization->email }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    @if ($organization->logo != null)
                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('logo/' . $organization->logo) }}">
                                    @else
                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('build/assets/images/' . $fakers[0]['photos'][0]) }}">
                                    @endif
                                    <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </div>
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change Logo</button>
                                    <input type="file" name="logo" class="w-full h-full top-0 left-0 absolute opacity-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!-- END: Display Information -->
@endsection
