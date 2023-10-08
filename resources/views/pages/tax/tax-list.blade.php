@extends('../layout/' . $layout)

@section('subhead')
    <title>Tax List</title>
@endsection

@section('subcontent')
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
            @endif
    <h2 class="intro-y text-lg font-medium mt-10">Tax List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a class="btn btn-primary shadow-md mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-createtax">Add New Tax</a>
            @include('pages.tax.pupup-createtax')                              
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of {{$taxes->count()}} entries</div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">TAX CODE</th>
                        <th class="text-center whitespace-nowrap">TAX NAME</th>
                        <th class="text-center whitespace-nowrap">PERCENTAGE</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr class="intro-x">
                            <td>
                                <a class="font-medium whitespace-nowrap">{{ $tax->tax_code }}</a>
                            </td>
                            <td class="text-center">{{ $tax->tax_name}}</td>
                            <td class="text-center">{{ $tax->percentage}} %</td>
                            <td class="w-40">
                                @if ($tax->status_id == 1)
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
                                    <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-updatetax{{ $tax->id }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-default-deletetax{{ $tax->id }}">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @include('pages.tax.pupup-deletetax')
                        @include('pages.tax.pupup-updatetax')
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    {{ $taxes->links('pages.pagination') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
