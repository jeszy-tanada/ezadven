@if ($paginator->lastPage() > 1)
<div class="ui buttons">
  <a href="{{ $paginator->url(1) }}" class="ui button {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><i class="step backward icon"></i></a>
  @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <a href="{{ $paginator->url($i) }}" class="ui button {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i  + $paginator->perPage()}}</a>
  @endfor
  <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="ui button {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}"><i class="step forward icon"></i></a>
</div>

@endif