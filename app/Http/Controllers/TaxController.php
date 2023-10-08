<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TaxRepository;
use Illuminate\Http\Request;
use App\Models\Status;

class TaxController extends Controller
{
    private $taxRepository;

    public function __construct(TaxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    public function index()
    {
        try {
            $taxes = $this->taxRepository->get();
            $status = Status::get();
            return view('pages/tax/tax-list', ['status' => $status, 'taxes' => $taxes]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }
    
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $this->taxRepository->create($input);
            return redirect()->back()->with('message', 'Inserted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            return back()->withError("Error!");
        }
        $this->taxRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function destroy($id)
    {
        try {
            $tax = $this->taxRepository->find($id);

            if (empty($tax)) {
                return back()->withError("Error!");
            }
            $this->taxRepository->delete($id);
            return redirect()->back()->with('message', 'Deleted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}