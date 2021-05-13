<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return $members;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'firstname'=> 'required|min:4',
            'lastname'=> 'required|min:4',
            'middlename'=> 'required|min:4',
            'adrress'=> 'required',
            'contactNumber'=> 'required|min:11|max:11',
            'emailAddress'=> 'required'
        ]);

        $member = new Member();

        $member->firstname = $valid['firstname'];
        $member->lastname = $valid['lastname'];
        $member->middlename = $valid['middlename'];
        $member->adrress = $valid['adrress'];
        $member->contactNumber = $valid['contactNumber'];
        $member->emailAddress = $valid['emailAddress'];

        $member->save();
        
        return "Created!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Member $member)
    {
        $request->validate(
            ['firstname' => 'required' ],
            ['lastname' => 'required'],
            ['middlename' => 'required'],
        );

        $member->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'middlename'=>$request->middlename
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
    }
}
