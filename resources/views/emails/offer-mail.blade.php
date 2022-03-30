{{$order->offer}}

<ul>
	@foreach($order->details as $detail)
		<li>{{ $detail->key}} => {{$detail->value }}</li>
	@endforeach

	<a href="{{route('accept-offer',$order->id)}}">
		<button>Accept</button>
	</form>
	<a href="{{route('decline-offer',$order->id)}}">
		<button>DeclinedIf</button>
	</a>
</ul>
