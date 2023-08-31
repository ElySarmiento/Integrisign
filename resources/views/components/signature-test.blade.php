

@if ($container == 'get_image')
  @include('components.get-test-signature-container')
  @include('components.test-result-history')
@endif
    
@if($container == 'get_result')
  @include('components.test-result')
  @include('components.test-result-history')
@endif




