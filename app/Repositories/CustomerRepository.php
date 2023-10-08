<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\CustomerDetails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class CustomerRepository
{
    public function get()
    {
        $customers = CustomerDetails::with('status')->where('organization_id',auth()->user()->organization_id)->OrderBy('id', 'desc')->paginate(10);
        return $customers;
    }

    public function create($input)
    {
        $customer = Customer::where('email',$input['email'])->first();
        if ($customer == null) {
            $input['status_id'] = 1;
            $input['password'] = Hash::make($input['first_name']);
            $customer = Customer::create($input);
        }
        $input['organization_id'] = auth()->user()->organization_id;
        $input['status_id'] = 1;
        $input['customer_id'] = $customer->id;
        return CustomerDetails::create($input);
    }

    public function getIdentityNo()
    {
        $lastNo = Customer::orderBy('identity_no', 'desc')->first(['identity_no']);
        if ($lastNo) {
            $lastId = $lastNo->identity_no;
            $incrementedId = (int) $lastId + 1;
            $paddedId = str_pad($incrementedId, 8, '0', STR_PAD_LEFT);
            return $paddedId;
        } else {
            return '00000001';
        }
    }

    public function find($id)
    {
        return CustomerDetails::find($id);
    }

    public function update($input, $id)
    {
        $allowedFields = ['first_name', 'last_name', 'address_line_1', 'address_line_2', 'county', 'city', 'post_code_id', 'country', 'mobile_no', 'email', 'identity_no', 'gender', 'role', 'status_id'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return CustomerDetails::where('id', $id)->update($filteredInput);
    }

    public function delete($id)
    {
        $customer =  CustomerDetails::find($id);
        $customer->delete();
        return true;
    }

    public function changePassword($request, $id)
    {
        $customer =  Customer::find($id);
        if(Hash::check($request['old_password'],$customer->password)){
            $customer->update([
                'password'=>Hash::make($request['new_password'])
            ]);
        return true;
        
        }else {
            return false;
        }
    }

    public function forgotPassword($request)
    {
        $customer = Customer::where('email',$request['email'])->first();
        if($customer == null) {
            return false;
        }
        $token = Str::random(40);
        $password_resets = DB::table('password_reset_tokens')->where('email', $request['email'])->first();
        if ($password_resets == null) {
            DB::table('password_reset_tokens')->insert([
                'email' => $request['email'],
                'token' => $token,
                'created_at' => Carbon::now()
            ]); 
        } else {
            DB::table('password_reset_tokens')->where('email', $request['email'])->update([
                'email' => $request['email'],
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }
        $first_name = $customer->first_name;
        Mail::to($request['email'])->send(new ForgotPassword($token, $request['email'], $first_name));
        return true;
    }
}