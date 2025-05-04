{{-- 

<h1>Test Method</h1>

@if(isset($param))
<p>Переданный параметр: <strong>{{ $param }}</strong></p>
@else
<p>Параметр не был передан.</p>
@endif


<h1>Test Method</h1>

<p><strong>Path:</strong> {{ $path }}</p>

@if(isset($param))
    <p><strong>GET-параметр "param":</strong> {{ $param }}</p>
@else
    <p>Параметр "param" не был передан.</p>
@endif



<h1>Test Method</h1>

<p><strong>Path:</strong> {{ $path }}</p>
<p><strong>URL:</strong> {{ $url }}</p>

@if(isset($param))
    <p><strong>GET-параметр "param":</strong> {{ $param }}</p>
@else
    <p>Параметр "param" не был передан.</p>
@endif



<h1>Test Method</h1>

<p><strong>Path:</strong> {{ $path }}</p>
<p><strong>URL:</strong> {{ $url }}</p>
<p><strong>Full URL:</strong> {{ $fullUrl }}</p>

@if(isset($param))
    <p><strong>GET-параметр "param":</strong> {{ $param }}</p>
@else
    <p>Параметр "param" не был передан.</p>
@endif
--}}


<h1>Test Method</h1>

<p><strong>Path:</strong> {{ $path }}</p>
<p><strong>URL:</strong> {{ $url }}</p>
<p><strong>Full URL:</strong> {{ $fullUrl }}</p>

<p><strong>Route is 'test/method'?</strong> {{ $isTestMethod ? 'Yes' : 'No' }}</p>
<p><strong>Route matches 'test/*'?</strong> {{ $isTestWildcard ? 'Yes' : 'No' }}</p>

@if(isset($param))
    <p><strong>GET-параметр "param":</strong> {{ $param }}</p>
@endif

