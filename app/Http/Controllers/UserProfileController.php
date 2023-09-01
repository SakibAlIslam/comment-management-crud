<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        // Fetch the user data (you can customize this as needed)
        $user = 'shiam'; // Assuming you have user authentication

        return view('user-profile', compact('user'));
    }
}
