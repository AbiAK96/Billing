@extends('../layout/' . $layout)

@section('subhead')
    <title>Job List</title>
@endsection

@section('subcontent')
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
        @endif
    <h2 class="intro-y text-lg font-medium mt-10">Job List</h2>
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </thead>
            <tbody>
                    <tr class="intro-x">
                        <td>
                            <a class="font-medium whitespace-nowrap">Create today delivery details. </a>
                        </td>

                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('delivery.cron') }}" class="flex items-center mr-3" title="Create Delivery">
                                        <i data-lucide="folder-plus" class="w-4 h-4 mr-2"></i> Create
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-medium whitespace-nowrap">Mark as "Not Delivered" for undelivered deliveries. </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('delivery.mark') }}" class="flex items-center mr-3" title="Mark Undelivered">
                                        <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Mark
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
