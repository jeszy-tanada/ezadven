@if(Session::has('success'))
<div class="ui form success">
        <div class="ui success message">
        <div class="header"><i class="green thumbs down up"></i>Success!</div>
        <p>{{ Session::get('success') }}</p>
        </div>
</div>
@endif

@if(Session::has('error'))
<div class="ui form error">
        <div class="ui error message">
        <div class="header"><i class="red thumbs down icon"></i>Error!</div>
        <p>{{ Session::get('error') }}</p>
        </div>
</div>
@endif

@if ($errors->has())
<div class="ui form error">

        <div class="ui error message">
        <div class="header"><h3><i class="red warning circle icon"></i>Error!</h3></div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        </div>
</div>
@endif