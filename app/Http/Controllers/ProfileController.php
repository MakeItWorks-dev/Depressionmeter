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
        return view('profile', compact('user'));
    }

    public function exportToPDF($id)
    {
        $user = Auth::user();
        $history = [];

        for ($i = 1; $i <= 300; $i++) {
            $history[] = [
                'no' => $i,
                'tanggal' => '2 Februari 2025',
                'hasil' => '80% Depresi',
                'positif' => 80,
                'negatif' => 10,
                'netral' => 10,
            ];
        }

        $pdf = PDF::loadView('pdf.profile', compact('user', 'history'));

        return $pdf->stream('profile.pdf');
    }

    
}
