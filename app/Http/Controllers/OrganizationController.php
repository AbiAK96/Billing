<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\OrganizationRepository;
use Illuminate\Http\Request;
use App\Models\Status;
use PDF;

class OrganizationController extends Controller
{
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepo)
    {
        $this->organizationRepository = $organizationRepo;
    }

    public function index()
    {
         try {
            $organization = $this->organizationRepository->get();
            $status = Status::get();
            return view('pages/organization/organization-view', ['status' => $status, 'organization' => $organization]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }

    public function update($id, Request $request)
    {
        try {
            $customerinquiry = $this->organizationRepository->find($id);

        if (empty($customerinquiry)) {
            return back()->withError("Error!");
        }
        $customerinquiry = $this->organizationRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}