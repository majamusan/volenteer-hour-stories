<h3>A total of <strong>{{ $total}}</strong> hours.</h3>

@foreach($info as $d)
<div class="col-sm-4 hourBox" style="">
	@if(isset($d->uid )) <img width="20px" src="{{ $users->find($d->uid)->gravatar or ''}}" /> @endif

	<strong><a href="/home/{{$d->displayName}}">{{$d->displayName}}</a></strong>
	<br />
	<small><a href="/stories/{{$d->id}}">{{$d->date}}</a></small>
	<div>
		@for($i=0;$i<$d->hours;$i++)
			*
		@endfor
	</div>
</div>
@endforeach