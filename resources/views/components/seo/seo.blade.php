
<!-- Seo -->
<meta name="keywords" content="{{ $keyword }}" />
<meta name="author" content="{{ $author }}" />
<meta name="description" content="{{$description}}">

<!-- social media seo -->
<meta property="og:site_name" content="{{$sitename}}">
<meta property="og:url" content="{{$url}}">
<meta property="og:title" content="{{$title}}">
<meta property="og:type" content="{{$type}}">
<meta property="og:description" content="{{$description}}">
<meta property="og:image" content="{{$imguri}}">
<meta property="og:image:secure_url" content="{{$imguri}}">

@if(!empty($price) && !empty($currency))
	<meta property="og:price:amount" content="{{$price}}">
	<meta property="og:price:currency" content="{{$currency}}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{$title}}">
<meta name="twitter:description" content="{{$description}}">
<meta name="twitter:creator" content="{{$twithandle}}" />
<!-- /social media seo -->