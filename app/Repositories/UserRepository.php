<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use App\Models\Paper;
use App\Models\Subscription;
use App\Models\DeliveryVehicle;
use App\Models\ModelHasPermission;
use Spatie\Permission\Models\Permission;

class UserRepository
{

    public function get()
    {
        $users = User::with('status')->where('organization_id',auth()->user()->organization_id)->where('id','!=',auth()->user()->id)->OrderBy('id', 'desc')->paginate(10);
        foreach ($users as $user) {

        $permissions = DB::table('model_has_permissions')->join('permissions', 'permissions.id', '=', 'model_has_permissions.permission_id')
                                            ->where('model_has_permissions.model_id',$user->id)
                                            ->select('model_has_permissions.*','permissions.*')
                                            ->get();

        $user->permissions = $permissions;
        }
        return $users;
    }

    public function create($input)
    {
        $input['organization_id'] = auth()->user()->organization_id;
        $input['password'] = Hash::make('Paper@123');
        $input['status_id'] = 1;
        return User::create($input);
    }

    public function getIdentityNo($input)
    {
        $lastNo = User::orderBy('identity_no', 'desc')->first(['identity_no']);
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
        return User::where('organization_id',auth()->user()->organization_id)->find($id);
    }

    public function update($input, $id)
    {
        $allowedFields = ['first_name', 'last_name', 'address_line_1', 'address_line_2', 'county', 'city', 'post_code', 'country', 'mobile_no', 'email', 'identity_no', 'gender', 'role', 'status_id'];
        $filteredInput = array_intersect_key($input, array_flip($allowedFields));
    
        return User::where('id', $id)->update($filteredInput);
    }

    public function delete($id)
    {
        $customer =  User::where('organization_id',auth()->user()->organization_id)->find($id);
        $customer->delete();
        return true;
    }

    public function changePassword($request, $id)
    {
        $user =  User::find($id);
        if(Hash::check($request['old_password'],$user->password)){
            $user->update([
                'password'=>Hash::make($request['new_password'])
            ]);
        return true;
        
        }else {
            return false;
        }
    }

    public function forgotPassword($request)
    {
        $user = User::where('email',$request['email'])->first();
        if($user == null) {
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
        $first_name = $user->first_name;
        Mail::to($request['email'])->send(new ForgotPassword($token, $request['email'], $first_name));
        return true;
    }

    public function assignPermission($request)
    {
        DB::table('model_has_permissions')->where('model_id',$request->user_id)->delete();
        $permissions = Permission::whereIn('id', $request->selected_ids)->get();
        $user = User::where('organization_id',auth()->user()->organization_id)->find($request->user_id); 

        foreach ($permissions as $permission) {
            $user->givePermissionTo($permission);
        }
    }
}