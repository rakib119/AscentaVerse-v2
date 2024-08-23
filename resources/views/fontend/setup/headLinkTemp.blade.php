@php
    extract($dataArray);
    $favicon = asset('assets/images/info/'.$favicon);
@endphp
<title>{{ $web_title }}</title>
<link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">
<link rel="icon" href="{{ $favicon }}" type="image/x-icon">
