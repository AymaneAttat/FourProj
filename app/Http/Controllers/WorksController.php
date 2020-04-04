<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Work;
use App\Company;
use App\Comment;
use App\UserWork;

class WorksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['works'] = Work::all();
        return view('works.index')->with($arr);
    }

    public function adduser(Request $request){
        $work = Work::find( $request->input('project_id') );
        if(Auth()->user()->id == $work->user_id){
            $user = User::where('email', $request->input('email'))->first();
            $workuser = UserWork::where('user_id', $user->id)->where('work_id', $work->id)->first();
            if($workuser){
                return redirect()->route('works.show', ['work' => $work->id])->with('success', $request->input('email').' is already a member of this project');
            }
            if($user && $work){
                $work->users()->attach($user->id);
                return redirect()->route('works.show', ['work' => $work->id])->with('success', $request->input('email').' was added to the project successfully');
            }
        }
        return redirect()->route('works.show', ['work' => $work->id])->with('errors',$request->input('email').' error adding user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['company'] = Company::where('user_id', Auth()->user()->id)->get();
        return view('works.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $work = new Work;
        $work->name = $request->input('name');
        $work->days = $request->input('days');
        $work->description = $request->input('description');
        $work->company_id = $request->input('company_id');
        $work->user_id = Auth()->user()->id;
        $work->save();
        return redirect()->route('works.index')->with('success','Project Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr['work'] = Work::find($id);
        $arr['comments'] = Comment::where('user_id',Auth()->user()->id)->get();
        
        return view('works.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr['work'] = Work::find($id);
        $arr['company'] = Company::where('user_id', Auth()->user()->id)->get();
        return view('works.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $work = Work::find($id);
        $work->name = $request->input('name');
        $work->days = $request->input('days');
        $work->description = $request->input('description');
        $work->company_id = $request->input('company_id');
        $work->user_id = Auth()->user()->id;
        $work->save();
        return redirect()->route('works.index')->with('success','Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect()->route('works.index')->with('success', 'Project Deleted');
    }
}
