<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Auth, DB;
use App\Projects, App\User, App\Stories;

class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

	public function home(User $users, $search = false){
		//--------------------------------------------------------------------------------------------[setup]
		$data = false;
		$panel = view('bits.404-panel');
		$allProjects = Projects::select('name')->get();
		$allUsers = User::select('name')->get();
		$rawDates = Stories::select('date')->get();
		foreach ($rawDates as $rawDate ) {
			$date = explode('-', $rawDate->date);
			$allDates[$date[0].'-'.$date[1]] = (object)['name' => $date[0].'-'.$date[1]];
		}


		//--------------------------------------------------------------------------------------------[searching]
		if($search){
			$pageTitle = $search;

			if($res = Projects::where('name','=',$search)->first() ){

				$data = DB::table('users')
						->select('users.name as displayName','stories.date','stories.hours','stories.id','users.id as uid')
						->leftJoin('stories','stories.owner','=','users.id')
						->leftJoin('projects','stories.project','=','projects.id')
						->where('stories.project','=',$res->id)
						->orderBy('stories.date');

			}else if($res = User::where('name','=',$search)->first() ){

				$data = DB::table('users')
						->select('projects.name as displayName','stories.date','stories.hours','stories.id')
						->leftJoin('stories','stories.owner','=','users.id')
						->leftJoin('projects','stories.project','=','projects.id')
						->where('users.id','=',$res->id)
						->orderBy('stories.date');
			}elseif($res = Stories::where('date','>',$search.'-01') ->where('date','<',$search.'-28') ->first() ){
				$data = DB::table('users')
						->select('users.name as displayName','stories.date','stories.hours','stories.id','users.id as uid')
						->leftJoin('stories','stories.owner','=','users.id')
						->where('date','>=',$search.'-01') ->where('date','<=',$search.'-28')
						->orderBy('stories.date');
			}

			if($data){
				$info = $data->get();
				$total = $data->sum('hours');
				$panel = view('bits.bars-panel',compact('info','total','users'));
			}
			
		//--------------------------------------------------------------------------------------------[users dashboard]
		}else{

			$pageTitle = 'Your stats';

			$hoursTotal = Stories::where('owner','=',Auth::user()->id)->sum('hours');
			$hoursMonth = Stories::where('owner','=',Auth::user()->id)
										->where('date','>=',date('Y-m-').'01' )->where('date','<=',date('Y-m-').'28')
										->sum('hours');

			$projects = DB::table('users')->select('projects.name','projects.id')
					->leftJoin('stories','stories.owner','=','users.id')
					->leftJoin('projects','stories.project','=','projects.id')
					->where('stories.owner','=',Auth::user()->id)
					->groupBy('projects.id')
					->get();

			foreach ($projects as $p ) {
				$hoursProjects[$p->name] = Stories::where('owner','=',Auth::user()->id)
																->where('project','=',$p->id)->sum('hours');
			}

			$gravatar = User::find(Auth::user()->id)->gravatar;

			$panel = view('bits.home-panel',compact('hoursTotal','hoursMonth','hoursProjects','projects','gravatar'));
		}

      return view('home',compact('pageTitle','allProjects','allUsers','allDates','panel'));
	}

}
