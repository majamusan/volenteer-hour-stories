<h4> Hours this month: {{ $hoursMonth}}</h4>
<h4> Your total hours: {{ $hoursTotal}}</h4> 

<h2>Past Projects</h2>
@foreach($projects as $p)
	<li><a href="home/{{$p->name}}">{{$p->name}}</a> Hours: {{$hoursProjects[$p->name]}}  </li>
@endforeach
</ul>
