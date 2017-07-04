<p class="lead text-center">What's Hot</p>
<ul class="list-group">
  @foreach($featured as $tour)
  <li class="list-group-item">
    <a class="nav-link " href="{{ URL::route('pub_tour_view', array('id' => $tour->id)) }}">{{ $tour->name }}</a>
  </li>
  @endforeach
</ul>