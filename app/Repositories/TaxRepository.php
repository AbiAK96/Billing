<?php

namespace App\Repositories;

use App\Models\Tax;

class TaxRepository
{

    public function get()
    {
        return Tax::with('status')->where('organization_id',auth()->user()->organization_id)->OrderBy('id', 'desc')->paginate(10);
    }

    public function create($input)
    {
        $input['organization_id'] = auth()->user()->organization_id;
        return Tax::create($input);
    }

    public function find($id)
    {
        return Tax::where('organization_id',auth()->user()->organization_id)->find($id);
    }

    public function update($input, $id)
    {
        $allowedFields = ['tax_code', 'tax_name', 'percentage', 'status_id'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return Tax::where('id', $id)->update($filteredInput);
    }

    public function delete($id)
    {
        $customerInquiry =  Tax::where('organization_id',auth()->user()->organization_id)->find($id);
        $customerInquiry->delete();
        return true;
    }
}