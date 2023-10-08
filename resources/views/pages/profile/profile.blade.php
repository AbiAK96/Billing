@extends('../layout/' . $layout)

@section('subhead')
    <title>Update Profile</title>
@endsection

@section('subcontent')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
@elseif(session()->has('error'))
<div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
@endif
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Profile</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('build/assets/images/' . $fakers[0]['photos'][0]) }}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
                        <div class="text-slate-500">{{ Auth::user()->identity_no }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary font-medium" href="{!! route('profile.index') !!}">
                        <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>
                    <a class="flex items-center mt-5" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-changepassword">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                    @include('pages.profile.pupup-changepassword')
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Personal Information</h2>
                </div>
                <div class="p-5">
                    <form method="POST" action="{!! route('profile.update', array(Auth::user()->id)) !!}"> 
                        {{method_field('PUT')}}
                        @csrf
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label for="update-profile-form-6" class="form-label">First Name</label>
                                <input id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" name="first_name" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-7" class="form-label">Address Line 1</label>
                                <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" name="address_line_1" value="{{ Auth::user()->address_line_1 }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-7" class="form-label">Email</label>
                                <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" name="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-9" class="form-label">County</label>
                                <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" name="county" value="{{ Auth::user()->county }}">
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-6">
                            <div class="mt-3 xl:mt-0">
                                <label for="update-profile-form-10" class="form-label">Last Name</label>
                                <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" name="last_name" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-11" class="form-label">Address Line 2</label>
                                <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" name="address_line_2" value="{{ Auth::user()->address_line_2 }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-7" class="form-label">Mobile</label>
                                <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" name="mobile_no" value="{{ Auth::user()->mobile_no }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-13" class="form-label">City</label>
                                <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="city" value="{{ Auth::user()->city }}">
                            </div>
                            <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="country" value="{{ Auth::user()->country }}" hidden>
                            <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="post_code" value="{{ Auth::user()->post_code }}" hidden>
                            <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="identity_no" value="{{ Auth::user()->identity_no }}" hidden>
                            <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="gender" value="{{ Auth::user()->gender }}" hidden>
                            <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" name="status_id" value="{{ Auth::user()->status_id }}" hidden>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
