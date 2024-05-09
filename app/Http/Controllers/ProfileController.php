<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{    
    public function edit(Request $request): View
    {
        $id = auth()->id(); // Mendapatkan ID pengguna yang terautentikasi
        $member = Member::find($id); // Mengambil data member berdasarkan ID
    
       
        // $member->created_at = Carbon::parse($member->created_at,'Asia/Jakarta')->locale('id')->translatedFormat('d F Y');
        // $member->expired_at = Carbon::createFromFormat('d F Y', 'Asia/Jakarta')->addDays(30)->locale('id');    
        return view('profile.edit', [
            'user' => $request->user(),
            'member' => $member, // Menambahkan data member ke view
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // public function show()
    // {
        
    //     $id= auth()->id();
    //     $member = Member::find($id);
    //     // $member->created_at = Carbon::parse($member->created_at,'Asia/Jakarta')->locale('id')->translatedFormat('d F Y');
    //     // $member->expired_at = Carbon::parse($member->created_at)->addDays(30)->locale('id')->translatedFormat('d F Y');

    //     // render view

    //     return view('profile.edit',[
    //         'user'=>auth()->user(),
    //         'member' =>$member,
    //     ]);
    
    // }
}

