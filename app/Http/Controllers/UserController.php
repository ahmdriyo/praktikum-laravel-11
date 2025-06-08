<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
  public function printPDF()
  {
    $users = User::get();
    $data = [
      'title' => 'Welcome To fti.uniska-bjm.ac.id',
      'date' => date('m/d/Y'),
      'users' => $users
    ];
    $pdf = PDF::loadview('printpdf', $data);
    $pdf->setPaper('A4', 'landscape');

    return $pdf->stream('Data User.pdf', array( "attachment" => false));
  }
  
  public function userExcel()
  {
    $users = User::get();
    $data = [
      'title' => 'Welcome To fti.uniska-bjm.ac.id',
      'date' => date('m/d/Y'),
      'users' => $users
    ];
    return view('printexcel',$data);
  }
}