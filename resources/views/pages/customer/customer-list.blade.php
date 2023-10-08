@extends('../layout/' . $layout)

@section('subhead')
    <title>Customer List</title>
@endsection

@section('subcontent')
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Customer List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a class="btn btn-primary shadow-md mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-createcustomer">Add New Customer</a>
            @include('pages.customer.pupup-createcustomer')                                
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of {{$customers->count()}} entries</div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">CUSTOMER NAME</th>
                        <th class="text-center whitespace-nowrap">ADDRESS</th>
                        <th class="text-center whitespace-nowrap">MOBILE NO</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $customer->first_name.' '.$customer->last_name }}</a>
                            </td>
                            <td class="text-center">{{ $customer->address_line_1.' '.$customer->address_line_2}}</td>
                            <td class="text-center">{{ $customer->mobile_no }}</td>
                            <td class="w-40">
                                @if ($customer->status_id == 1)
                                <div class="flex items-center justify-center text-success">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Actve
                                </div>
                                @else
                                <div class="flex items-center justify-center text-danger">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive
                                </div>
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-updatecustomer{{ $customer->id }}" title="Edit">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        </a>
                                        <a class="flex items-center text-danger mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-deletecustomer{{ $customer->id }}" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                        </a>
                                </div>
                            </td>
                        </tr>
                        @include('pages.customer.pupup-deletecustomer')
                        @include('pages.customer.pupup-updatecustomer')
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    {{ $customers->links('pages.pagination') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
