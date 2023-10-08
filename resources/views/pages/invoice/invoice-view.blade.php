@extends('../layout/' . $layout)

@section('subhead')
    <title>Invoice</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Invoice</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{!! route('invoice.index') !!}" class="btn btn-primary shadow-md mr-2">Back</a>
        </div>
    </div>
    <!-- BEGIN: Invoice -->
    <div class="intro-y box overflow-hidden mt-5">
        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
            <div class="font-semibold text-primary text-3xl">INVOICE - {{ $invoice->invoice_id }}</div>
            <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-xl text-primary font-medium">{{ $invoice->organization->organization_name }}</div>
                <div class="mt-1">{{ $invoice->organization->mobile_no }}</div>
                <div class="mt-1">{{ $invoice->organization->address_line_1.' '.$invoice->organization->address_line_2.' '.$invoice->organization->county.' '.$invoice->organization->post_code }}</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
            <div>
                <div class="text-base text-slate-500">Client Details</div>
                <div class="text-lg font-medium text-primary mt-2">{{ $invoice->customer->first_name.' '.$invoice->customer->last_name }}</div>
                <div class="mt-1">{{ $invoice->customer->email }}</div>
                <div class="mt-1">{{ $invoice->customer->address_line_1.' '.$invoice->customer->address_line_2.' '.$invoice->customer->county.' '.$invoice->customer->post_code }}</div>
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-base text-slate-500">Receipt</div>
                <div class="text-lg text-primary font-medium mt-2">#{{ $invoice->invoice_id }}</div>
                <div class="mt-1">{{ $invoice->invoice_date }}</div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">PRODUCT DETAILS</th>
                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">PRICE</th>
                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">QTY</th>
                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->billingItems as $item)
                        <tr>
                            <td class="border-b dark:border-darkmode-400">
                                <div class="font-medium whitespace-nowrap">{{ $item->product->product_name }} - {{$item->product->product_code}}</div>
                                <div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">{{ $item->product->description }}</div>
                            </td>
                            <td class="text-right border-b dark:border-darkmode-400 w-32">{{ env('CURRENCY').' '.number_format((float)$item->unit_price, 2, '.', '') }}</td>
                            <td class="text-right border-b dark:border-darkmode-400 w-32">{{ $item->quantity }}</td>
                            <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">{{ env('CURRENCY').' '.number_format((float)$item->total_price, 2, '.', '') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
     
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="font-medium whitespace-nowrap">Net Amount</div>
                            </td>
                            <td class="text-right font-medium">{{ env('CURRENCY').' '.number_format((float)$invoice->net_price, 2, '.', '') }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-medium whitespace-nowrap">Tax {{ $invoice->billingTax->sum('percentage') }}%</div>
                            </td>
                            <td class="text-right font-medium">{{ env('CURRENCY').' '.number_format((float)$invoice->tax_price, 2, '.', '') }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-medium whitespace-nowrap text-danger">Discout Amount
                            </td>
                            <td class="text-right font-medium text-danger">({{ env('CURRENCY').' '.number_format((float)$invoice->discount_price, 2, '.', '') }})</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-medium whitespace-nowrap">Gross Amount</div>
                            </td>
                            <td class="text-right font-medium">{{ env('CURRENCY').' '.number_format((float)$invoice->gross_price, 2, '.', '') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
            <div class="text-center sm:text-left mt-10 sm:mt-0">
                <div class="text-base text-slate-500">Payment Details</div>
                <div class="text-lg text-primary font-medium mt-2"> {{ $invoice->payment_method }} </div>
                <div class="mt-1">Payment Reference - {{ $invoice->payment_reference }}</div>
            </div>
            <div class="text-center sm:text-right sm:ml-auto">
                <div class="text-base text-slate-500">Total Amount</div>
                <div class="text-xl text-primary font-medium mt-2">{{ env('CURRENCY').' '.number_format((float)$invoice->gross_price, 2, '.', '') }}</div>
                <div class="mt-1">Taxes included</div>
            </div>
        </div>
    </div>
    <!-- END: Invoice -->
@endsection
