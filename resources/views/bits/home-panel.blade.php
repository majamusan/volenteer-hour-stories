<div class="col-md-3">
	<img src="{{ $gravatar }}" /> 
</div>

<div class="col-md-9">
	<h4> Hours this month: {{ $hoursMonth}}</h4>
	<ul>
		@foreach($projectsMonth as $p)
			<li><a href="home/{{$p->name}}">{{$p->name}}</a> Hours: {{$hoursProjectsMonth[$p->name]}}  </li>
		@endforeach
	</ul>
	<h4> Your total hours: {{ $hoursTotal}}</h4> 

	<ul>
		@foreach($projects as $p)
			<li><a href="home/{{$p->name}}">{{$p->name}}</a> Hours: {{$hoursProjects[$p->name]}}  </li>
		@endforeach
	</ul>
</div>