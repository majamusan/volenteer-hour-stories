<?php

namespace App\Http\Controllers;

use App\Stories, App\Projects, Auth,Session, App\User;
use Illuminate\Http\Request;

class StoriesController extends Controller
{

    private $projects;
    private $formRules;
    public function __construct()
    {
        $this->middleware('auth');
        foreach(Projects::get() as $p){
            $this->projects[$p->id] = $p->name; 
        }

        $this->formRules =  [
                'project' => 'required',
                'date' => 'required|date|before:tomorrow|after_or_equal:'.date('Y/m').'/01',
                'description' => 'required|min:20|max:1500',
                'hours' => 'required|integer|between:1,24'
            ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $stories = [];
        $projects = $this->projects;

        if (!empty($keyword)) {
            $stories = Stories::where('date', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $stories = Stories::where('owner','=',Auth::user()->id)->paginate($perPage);
        }

        return view('stories.index', compact(['stories','projects','users']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = $this->projects;
        return view('stories.create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->formRules);
        $requestData = $request->all();
        $requestData['owner'] = Auth::user()->id;
        Stories::create($requestData);
        Session::flash('flash_message', 'Story added!');
        return redirect('stories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function show(User $users,$id)
    {
        if($stories = Stories::find($id)){
            $projects = $this->projects;
            return view('stories.show', compact('stories','projects','users'));
        }
        return redirect('stories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = $this->projects;
        if($stories = Stories::where('id','=',$id)->where('owner','=',Auth::user()->id)->first() ){
            return view('stories.edit', compact('stories','projects'));
        }
        return redirect('stories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stories $stories,$id)
    {
        $this->validate($request, $this->formRules );
        $requestData = $request->all();
        unset($requestData['_method']);
        unset($requestData['_token']);
        if($res = $stories->where('id','=',$id)->where('owner','=',Auth::user()->id)->update($requestData)){
            Session::flash('flash_message', 'Story updated!');
        }
        return redirect('stories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($res = Stories::where('id','=',$id)->where('owner','=',Auth::user()->id)->first() ) {
            Stories::destroy($id);
            Session::flash('flash_message', 'Story deleted!');
        }
        return redirect('stories');
    }
}
