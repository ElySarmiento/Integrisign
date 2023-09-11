

@if ($container == 'get_image')
  @include('components.get-test-signature-container')
@endif
    
@if($container == 'get_result')
  @include('components.test-result')
  @include('components.test-result-history')
@endif

  



