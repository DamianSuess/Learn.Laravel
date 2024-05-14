<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
  /**
   * Register api
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function register(Request $request): JsonResponse
  {
    ////$validator = $request->validate(
    ////  [
    ////    'name' => 'required',
    ////    'email' => 'required|email',
    ////    'password' => 'required',
    ////    'c_password' => 'required|same:password',
    ////  ]
    ////);

    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'c_password' => 'required|same:password',
    ]);

    if ($validator->fails())
      return $this->sendError('Validation Error.', $validator->errors());

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    $success['name'] =  $user->name;

    return $this->sendResponse($success, 'User register successfully.');
  }

  /**
   * Login api
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request): JsonResponse
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

      // Intellisense fix: This informs Inteliphense to base on our User model which utilizes, `HasApiTokens` to 'createToken(..)'
      /** @var \App\Models\User $user */
      $user = Auth::user();
      $success['token'] =  $user->createToken('MyApp')->plainTextToken;
      $success['name'] =  $user->name;

      return $this->sendResponse($success, 'User login successfully.');
    } else {
      return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
    }
  }
}
