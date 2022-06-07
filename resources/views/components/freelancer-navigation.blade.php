<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link dashboard-link" id="offers_link" href="{{route('freelancer-offers')}}">Offers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link dashboard-link" id="messages_link" href="{{route('freelancer-messages')}}">Messages {{count($notifications) > 0 ? '('.count($notifications).')' : ''}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link dashboard-link" id="orders_link" href="{{route('freelancer-projects')}}">My Projects</a>
  </li>
  <li class="nav-item">
    <a class="nav-link dashboard-link" id="settings_link" href="{{route('freelancer-settings')}}">Settings</a>
  </li>
</ul>