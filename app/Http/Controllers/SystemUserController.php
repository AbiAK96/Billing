<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\User;
use App\Models\ShippingCost;
use Spatie\Permission\Models\Permission;

class SystemUserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function index()
    {
        try {
            $systemusers = $this->userRepository->get();
            $status = Status::get();
            $permissions = Permission::OrderBy('id', 'asc')->get();
            return view('pages/systemuser/systemuser-list', ['status' => $status, 'systemusers' => $systemusers, 'permissions' => $permissions]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }
    
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['role'] = 'user';
            $this->userRepository->create($input);
            return redirect()->back()->with('message', 'Inserted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $paper = $this->userRepository->find($id);

        if (empty($paper)) {
            return back()->withError("Error!");
        }
        $paper = $this->userRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function destroy($id)
    {
        try {
            $customer = $this->userRepository->find($id);

            if (empty($customer)) {
                return back()->withError("Error!");
            }
            $this->userRepository->delete($id);
            return redirect()->back()->with('message', 'Deleted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function assignPermission(Request $request)
    {
        try {
            $user = $this->userRepository->assignPermission($request);
            return redirect()->back()->with('message', 'Permission Added Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}