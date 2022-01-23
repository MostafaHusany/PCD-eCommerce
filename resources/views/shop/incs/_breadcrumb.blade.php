<div class="breadcrumb-container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      @if(Request::is( LaravelLocalization::getCurrentLocale() ))
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      @elseif(Request::is(LaravelLocalization::getCurrentLocale() . '/shop'))
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Shop</li>
      @elseif(str_contains(Request::path(), '/shop/') && isset($target_product))
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/shop') }}">Shop</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $target_product[ LaravelLocalization::getCurrentLocale() . '_name'] }}</li>
      @endif
    </ol>
  </nav>
</div>
