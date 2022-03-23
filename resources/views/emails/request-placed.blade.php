<p>{{$order['name']}}</p>
<p>{{$order['email']}}</p>
<p>{{$order['phone']}}</p>

<ul>
	@foreach($order->details as $detail)
		<li>{{$detail['key']}} => {{$detail['value']}}</li>
	@endforeach
</ul>