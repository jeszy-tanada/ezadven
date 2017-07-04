@if ($paginator->lastPage() > 1)
<div class="ui small basic icon buttons">
    {{--<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">--}}
        {{--<a href="{{ $paginator->url(1) }}">Previous</a>--}}
    {{--</li>--}}
    <a href="{{ $paginator->url(1) }}" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} ui button"><i class="left chevron icon"></i></a>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} ui button">{{ $i }}</a>
        {{--<li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">--}}
            {{--<a >{{ $i }}</a>--}}
        {{--</li>--}}
    @endfor
    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} ui button"><i class="right chevron icon"></i></a>
    {{--<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">--}}
        {{--<a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>--}}
    {{--</li>--}}
</div>
@endif