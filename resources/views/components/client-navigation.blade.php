	<ul class="nav justify-content-end">
			
	  <li class="nav-item">
	    <a class="nav-link dashboard-link" id="messages_link" href="{{route('client-messages')}}">
	    	Messages {{count($messages) > 0 ? '('.count($messages).')' : ''}}</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link dashboard-link" id="orders_link" href="{{route('client-orders')}}">Order</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link dashboard-link" id="settings_link" href="{{route('client-settings')}}">Settings</a>
	  </li>
	</ul>