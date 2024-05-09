<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class admin extends Controller
{
    //
    public function index()
    {
        $userCount =User::count();
        $memberCount =Member::count();
        $members = Member::all();
        return view('admin', compact('members','userCount','memberCount'));
    }
    }

