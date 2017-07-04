<!DOCTYPE html>
<html>
<head>
	<title></title>
    {!! HTML::style('css/semantic.min.css') !!}
	{!! HTML::style('css//magic.min.css') !!}
	{!! HTML::script('js/jquery-2.2.0.min.js') !!}
	{!! HTML::script('js/semantic.min.js') !!}
	@yield('css')
</head>
<body>


            @yield('content')





<script type="text/javascript">
$('.red').hover(function () {
  $(this).addClass('magictime magic');
});
  </script>

@yield('js')

</body>
</html>