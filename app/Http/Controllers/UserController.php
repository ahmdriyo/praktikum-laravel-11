<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  public function dashboard(Request $request)
  {
    return view('dashboard');
  }
  public function users(Request $request)
  {
    $users = User::get();
    return view('users', compact('users'));
  }
}