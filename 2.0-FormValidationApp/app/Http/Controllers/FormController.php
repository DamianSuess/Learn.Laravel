<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FormController extends Controller
{
  /**
   * Show the application dashboard.
   * @return \Illuminate\Http\Response
   */
  public function create(): View
  {
    return view('createUser');
  }

  /**
   * Stores validates the user entry and stores into the database if successful.
   * @param   Request           $request  HTTP Form input.
   * @return  RedirectResponse            HTTP Response class which performs the redirect.
   */
  public function store(Request $request): RedirectResponse
  {
    // Validate the fields according to the specified rules
    $validatedData = $request->validate(
      [
        "name"      => "required",
        "password"  => "required|min:5",
        "email"     => "required|email|unique:users",
      ],
      [
        "name.required"     => "Name filed is required.",
        "password.required" => "Password must be at least 5 characters.",
        "email.required"    => "Email field is required.",
        "email.email"       => "Email field must be an email address.",
      ]
    );

    // Encrypt the password
    $validatedData["password"] = bcrypt($validatedData["password"]);
    $user = User::create($validatedData);

    return back()->with("success", "User created successfully.");
  }
}
