<h3>A total of <strong>{{ $total}}</strong> hours.</h3>

@foreach($info as $d)
<div class="col-sm-2 hourBox" style="">
	<strong><a href="/home/{{$d->displayName}}">{{$d->displayName}}</a></strong>
	<small>{{$d->date}}</small>
	<div>
		@for($i=0;$i<$d->hours;$i++)
			*
		@endfor
	</div>
</div>
@endforeach