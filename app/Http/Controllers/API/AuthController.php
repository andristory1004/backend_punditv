<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Ballance;
use App\Models\Referral;
use App\Models\CreditPoint;
use App\Models\CreditPundi;
use Illuminate\Support\Str;
use App\Models\ViewProgress;
use Illuminate\Http\Request;
use App\Models\SubscribeProgress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $referral = Referral::create([
            'referral_code' => Str::random(5),
        ]);
        
        $validator = Validator::make($request->all(),[
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8',
            // 'picture'   => 'file'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        // $picture = $request->file('picture');

        // if ($picture) {
        //     $fileName = time().'_'.$picture->getClientOriginalName();
        //     $filePath = $picture->storeAs('uploads/users', $fileName, 'public');
        // }

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            // 'picture'       => $filePath,
            'ref_id'        => $referral->id,
            'role_id'       => $request->role ?? 1

         ]);

         $user_id = $user->id;
        
         //  Ballance
        CreditPoint::create([
            'user_id'   => $user_id,
            'name'      => 'Credit Point',
            'ballance'  => 0,
         ]);

        CreditPundi::create([
            'user_id'   => $user_id,
            'name'      => 'Credit Pundi',
            'ballance'  => 0,
        ]);

        ViewProgress::create([
            'user_id'   => $user_id,
            'name'      => "View Progress",
            'progress' => 0
        ]);

        SubscribeProgress::create([
            'user_id'   => $user_id,
            'name'      => "Subscribe Progress",
            'progress' => 0
        ]);



        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function profile()
    {
        
        return response()->json(['message' => 'Your Profile','data' => Auth::user()]);
    }

    // method for profile update
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(),[
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'  => 'nullable|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $picture = $request->file('picture');

        if ($picture) {
            $fileName = time().'_'.$picture->getClientOriginalName();
            $filePath = $picture->storeAs('uploads/users', $fileName, 'public');
        }

        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'picture'       => $filePath,
            'password'      => $request->password ? Hash::make($request->password) : $user->password
         ]);

         return response()->json(['message' => 'Successfully updated','data' => $user]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'You have been logged out']);
    }
}