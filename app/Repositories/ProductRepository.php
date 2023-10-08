<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public function get()
    {
        return Product::where('organization_id',auth()->user()->organization_id)->OrderBy('id', 'desc')->paginate(10);
    }

    public function create($input)
    {
        $input['organization_id'] = auth()->user()->organization_id;
        return Product::create($input);
    }

    public function find($id)
    {
        return Product::where('organization_id',auth()->user()->organization_id)->find($id);
    }

    public function update($input, $id)
    {
        $allowedFields = ['product_name', 'product_code', 'description', 'unit_price', 'status_id'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return Product::where('id', $id)->update($filteredInput);
    }

    public function delete($id)
    {
        $customerInquiry =  Product::where('organization_id',auth()->user()->organization_id)->find($id);
        $customerInquiry->delete();
        return true;
    }
}