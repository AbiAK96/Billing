<?php

namespace App\Repositories;

use App\Models\Organization;

class OrganizationRepository
{
    public function get()
    {
        return Organization::with('status')->where('id',auth()->user()->organization_id)->OrderBy('id', 'desc')->first();
    }

    public function find($id)
    {
        return Organization::find($id);
    }

    public function logoUpload($input)
    {
        
        $image_url = 'logo'."_".time().".jpg";
        $image = $input['logo'];
        $image->move(public_path('logo/'), $image_url);
        return $image_url;
    }

    public function update($input, $id)
    {

        if (isset($input['logo'])) {
            $input['logo'] = $this->logoUpload($input);
        } else {
            $input['logo'] = null;
        }
        $allowedFields = ['organization_name', 'address_line_2', 'city', 'country', 'address_line_1', 'county', 'post_code', 'mobile_no', 'email', 'logo'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return Organization::where('id', $id)->update($filteredInput);
    }
}