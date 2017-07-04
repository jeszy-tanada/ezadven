<p class="lead text-center">Menu</p>

<ul class="list-group">
  <li class="list-group-item justify-content-between @if($menu=='home') active @endif">

        <a class="text-white" href="{{ URL::route('cp_home') }}" style="width: 100%">Home</a>
  </li>
  <li class="list-group-item @if($menu=='country') active @endif">
        <a class="text-white" href="{{ URL::route('countries') }}" style="width: 100%">Country</a>
  </li>
  <li class="list-group-item @if($menu=='area') active @endif">
        <a class="text-white" href="{{ URL::route('areas') }}" style="width: 100%">Areas</a>
  </li>
  <li class="list-group-item @if($menu=='tour') active @endif">
        <a class="text-white" href="{{ URL::route('tours') }}" style="width: 100%">Tours</a>
  </li>
  <li class="list-group-item @if($menu=='inquiries') active @endif">
        <a class="text-white" href="{{ URL::route('inquiries') }}" style="width: 100%">Inquiries</a>
  </li>
</ul>
