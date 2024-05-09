<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function store(Request $request){
        $number = mt_rand(100000,100000);

        if($this->memberCodeExist($number)){
            $number =mt_rand(100000,100000);
        }
        $request['member_code'] = $number;
        $request['id'] = Auth::id();
        $member = Member::create($request->all());
        $member->expired_at = Carbon::now()->addDays(30);
        $member->save();
        return redirect('/');
    }

    public function memberCodeExist($number){
        return Member::whereMemberCode($number)->exists();
    }

    public function show($id){
        $user = Auth::user();
        $member = $user->member;
        // dd($member); // Tambahkan ini untuk mencetak variabel $member
        return view('profile.partials.KartuMember', compact('member'));
    }
}
