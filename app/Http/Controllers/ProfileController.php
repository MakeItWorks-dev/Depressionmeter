<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function showprofileForm()
    {
        $user = Auth::user();
        $history = $user->histories()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('user', 'history'));
    }

    public function exportToPDF($id)
    {
        $user = Auth::user();
        $history = [];

        for ($i = 1; $i <= 5; $i++) {
            $history = $user->histories()->orderBy('created_at', 'desc')->get();
        }

        $pdf = PDF::loadView('pdf.profile', compact('user', 'history'));

        return $pdf->stream('profile.pdf');
    }

    
}