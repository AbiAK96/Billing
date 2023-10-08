@extends('../layout/' . $layout)

@section('subhead')
    <title>Invoice List</title>
@endsection

@section('subcontent')
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Invoice List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('invoice.index', ['new' => 'new']) }}">New Invoice</a>
            @include('pages.product.pupup-createproduct')                                
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of {{$invoices->count()}} entries</div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">INVOICE NO</th>
                        <th class="text-center whitespace-nowrap">CUSTOMER NAME</th>
                        <th class="text-center whitespace-nowrap">INVOICE DATE</th>
                        <th class="text-center whitespace-nowrap">TOTAL AMOUNT</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr class="intro-x">
                            <td>
                                <a class="font-medium whitespace-nowrap">{{ $invoice->invoice_id }}</a>
                            </td>
                            <td class="text-center">{{ $invoice->customer->first_name.' '.$invoice->customer->last_name}}</td>
                            <td class="text-center">{{ $invoice->invoice_date}}</td>
                            <td class="text-center">{{ env('CURRENCY').' '.number_format((float)$invoice->gross_price, 2, '.', '') }}</td>
                            <td class="w-40">
                                @if ($invoice->status_id == 1)
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
                                    <a class="flex items-center mr-3" href="{{ route('invoice.index', ['id' => $invoice->id]) }}" title="View">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View
                                    </a>
                                    <a class="flex items-center mr-3" href="{{ route('invoice.download', ['id' => $invoice->id]) }}" title="Download">
                                        <i data-lucide="paperclip" class="w-4 h-4 mr-1"></i> Download
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    {{ $invoices->links('pages.pagination') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
