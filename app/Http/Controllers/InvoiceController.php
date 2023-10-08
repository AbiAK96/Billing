<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\CustomerDetails;
use App\Models\Product;
use App\Models\Tax;
use PDF;

class InvoiceController extends Controller
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    public function index(Request $request)
    {
        try {
            if (isset($request->id)) {
                $invoice = $this->invoiceRepository->find($request->id);
                return view('pages/invoice/invoice-view', ['invoice' => $invoice]);
            }

            if (isset($request->new)) {
                $customers = CustomerDetails::where('organization_id', auth()->user()->organization_id)->get();
                $products = Product::where('organization_id', auth()->user()->organization_id)->get();
                $taxes = Tax::where('organization_id', auth()->user()->organization_id)->get();
                return view('pages/invoice/invoice-create', ['customers' => $customers, 'products' => $products, 'taxes' => $taxes]);
            }

            $invoices = $this->invoiceRepository->get();
            $status = Status::get();
            return view('pages/invoice/invoice-list', ['status' => $status, 'invoices' => $invoices]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }

    public function download(Request $request)
    {
        try {
            if (isset($request->id)) {
                $invoice = $this->invoiceRepository->find($request->id);
                $data = [
                    'invoice' => $invoice,
                ];
                $pdf = PDF::loadView('pdf.index', $data);
                $pdf->setPaper('A4');
                return $pdf->download($invoice->invoice_id.'.pdf');
            }
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }

    public function store(Request $request)
    {
        dd($request->all());   
    }
}