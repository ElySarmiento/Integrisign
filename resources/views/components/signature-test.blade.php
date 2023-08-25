<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 text-gray-900 dark:text-gray-100">
    {{ __("get test signature container") }}
    @include('components.get-test-signature-container')
  </div>
</div>


<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 text-gray-900 dark:text-gray-100">
    {{ __("test result") }}
    @include('components.test-result')
  </div>
</div>



<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 text-gray-900 dark:text-gray-100">
    {{ __("test result history") }}
  @include('components.test-result-history')
  </div>
</div>



