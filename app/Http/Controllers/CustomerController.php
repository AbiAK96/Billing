<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use App\Models\Status;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    public function index()
    {
        try {
            $customers = $this->customerRepository->get();
            $status = Status::get();
            return view('pages/customer/customer-list', ['status' => $status, 'customers' => $customers]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }
    
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $this->customerRepository->create($input);
            return redirect()->back()->with('message', 'Inserted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            return back()->withError("Error!");
        }
        $paper = $this->customerRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function destroy($id)
    {
        try {
            $customer = $this->customerRepository->find($id);

            if (empty($customer)) {
                return back()->withError("Error!");
            }
            $this->customerRepository->delete($id);
            return redirect()->back()->with('message', 'Deleted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}