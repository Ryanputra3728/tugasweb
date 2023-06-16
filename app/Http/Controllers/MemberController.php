<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index','show']]);
         $this->middleware('permission:member-create', ['only' => ['create','store']]);
         $this->middleware('permission:member-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = DB::table('members')
            ->join('users', 'members.user_id', '=', 'users.id')
            ->select('members.*', 'users.name as nama_user')
            ->paginate(10);

        return view('admin.member.index', compact('member'));
            // ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'member_code' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_ktp' => 'required',
            'photo_identitas' => 'required',
        ]);


        //1. simpan ke table "users"

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $nama_photo = "";
        $nama_photo_identitas = "";
        if ($request->has('photo')){
            $nama_photo = rand(pow(10, 3 - 1), pow(10, 3) -1). $request->file('photo')->getClientOriginalName();

            $request->photo->move(public_path('images/member/'), $nama_photo);
        };

        if ($request->has('photo_identitas')){
            $nama_photo_identitas = rand(pow(10, 3 - 1), pow(10, 3) -1). $request->file('photo_identitas')->getClientOriginalName();

            $request->photo_identitas->move(public_path('images/member/'), $nama_photo_identitas);
        };

        // 2. simpen ke tabel "member"
        $member = DB::table('members')->insert([
            'user_id' => $user->id,
            'member_code' => $request->member_code,
            'phone' => $request->phone,
            'address' => $request->address,
            'kota' => $request->kota,
            'photo' => $nama_photo,
            'no_ktp' => $request->no_ktp,
            'photo_identitas' => $nama_photo_identitas,
            'profil' => $request->profil,
        ]);

        
        
    
        return redirect('admin/member')
                        ->with('success','Member created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.member.show',compact('member'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = DB::table('members')
            ->join('users', 'members.user_id', '=', 'users.id')
            ->where('members.id', $id)
            ->select('users.*', 'members.*')
            ->first();
        // return response()->json($member);
        return view('admin.member.edit',compact('member'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'member_code' => 'required',
            'name' => 'required',
            'email' => 'required',
            'no_ktp' => 'required',
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        
        
        $member = DB::table('members')->where('id', $id);

        $member->update([
            'user_id' => $user->id,
            'member_code' => $request->member_code,
            'phone' => $request->phone,
            'address' => $request->address,
            'kota' => $request->kota,
            'no_ktp' => $request->no_ktp,
            'profil' => $request->profil,
        ]);
                
        if ($request->hasFile('photo')) {
            $nama_photo = rand(pow(10, 3 - 1), pow(10, 3) -1). $request->file('photo')->getClientOriginalName();

            $request->photo->move(public_path('images/member/'), $nama_photo);

            $member->update([
                'photo' => $nama_photo,
            ]);
        } 

        if ($request->has('photo_identitas')){
            $nama_photo_identitas = rand(pow(10, 3 - 1), pow(10, 3) -1). $request->file('photo_identitas')->getClientOriginalName();

            $request->photo_identitas->move(public_path('images/member/'), $nama_photo_identitas);

            $member->update([
                'photo_identitas' => $nama_photo_identitas,
            ]);
        };
            
        return redirect('admin/member')
        ->with('success','Member updated successfully.');
            
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
    
        return redirect()->route('member.index')
                        ->with('success','Product deleted successfully');
    }
}
