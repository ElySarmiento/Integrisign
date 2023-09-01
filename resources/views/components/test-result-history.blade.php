<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 text-gray-900 dark:text-gray-100">
    
        @foreach ($result_history as $results)
            
        <div class="flex flex-row justify-around">
          <h3>{{$results['fileName']}}</h3>
          <h3>{{$results['overall_result']}}</h3>
          <h3>{{$results['created_at']}}</h3>
        </div>
    @endforeach
       
     
   
  </div>
</div>