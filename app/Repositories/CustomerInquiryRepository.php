<?php

namespace App\Repositories;

use App\Models\CustomerInquiry;

class CustomerInquiryRepository
{

    public function get()
    {
        return CustomerInquiry::with('status','customer')->where('organization_id',auth()->user()->organization_id)->OrderBy('id', 'desc')->paginate(10);
    }

    public function create($input)
    {
        $input['organization_id'] = auth()->user()->organization_id;
        return CustomerInquiry::create($input);
    }

    public function find($id)
    {
        return CustomerInquiry::where('organization_id',auth()->user()->organization_id)->find($id);
    }

    public function update($input, $id)
    {
        $allowedFields = ['customer_id', 'inquiry_subject', 'inquiry_details', 'status_id'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return CustomerInquiry::where('id', $id)->update($filteredInput);
    }

    public function delete($id)
    {
        $customerInquiry =  CustomerInquiry::where('organization_id',auth()->user()->organization_id)->find($id);
        $customerInquiry->delete();
        return true;
    }
}