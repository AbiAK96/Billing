<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        return view('pages/profile/profile');
    }

    public function update(Request $request, $id)
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

    public function changePassword(Request $request, $id)
    {
        try {
            $user = $this->userRepository->find($id);

        if (empty($user)) {
            return back()->withError("Error!");
        }
        $user = $this->userRepository->changePassword($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function forgetPassword(Request $request)
    {
        try {
        $email = $this->userRepository->forgotPassword($request);
        if ($email == false){
            return back()->withError("Error!");
        } 
        return redirect()->back()->with('message', 'Email send Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}
