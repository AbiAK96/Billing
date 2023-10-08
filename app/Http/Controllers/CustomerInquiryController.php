<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerInquiryRepository;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\CustomerDetails;

class CustomerInquiryController extends Controller
{
    private $customerInquiryRepository;

    public function __construct(CustomerInquiryRepository $customerInquiryRepo)
    {
        $this->customerInquiryRepository = $customerInquiryRepo;
    }

    public function index(Request $request)
    {
        try {
            $customerinquiries = $this->customerInquiryRepository->get();
            $status = Status::get();
            $customers = CustomerDetails::where('organization_id',auth()->user()->organization_id)->get();
            return view('pages/customerinquiry/customerinquiry-list', ['status' => $status, 'customerinquiries' => $customerinquiries, 'customers' => $customers]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }
    
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $this->customerInquiryRepository->create($input);
            return redirect()->back()->with('message', 'Inserted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $customerinquiry = $this->customerInquiryRepository->find($id);

        if (empty($customerinquiry)) {
            return back()->withError("Error!");
        }
        $customerinquiry = $this->customerInquiryRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function destroy($id)
    {
        try {
            $customerinquiry = $this->customerInquiryRepository->find($id);

            if (empty($customerinquiry)) {
                return back()->withError("Error!");
            }
            $this->customerInquiryRepository->delete($id);
            return redirect()->back()->with('message', 'Deleted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}