



<div class="relative overflow-y-auto shadow-md sm:rounded-lg">
  <table class="w-full h-94  text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Filename
              </th>
              <th scope="col" class="px-6 py-3">
                  1st layer test result
              </th>
              <th scope="col" class="px-6 py-3">
                2nd layer test result
              </th>
              <th scope="col" class="px-6 py-3">
                3rd layer test result
              </th>
              <th scope="col" class="px-6 py-3">
                  Match Accuracy
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($result_history as $results)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <h3>{{$results['fileName']}}</h3>
              </th>
              <td class="px-6 py-4">
                <h3>{{$results['test1_result']}}</h3>
              </td>
              <td class="px-6 py-4">
                <h3>{{$results['test2_result']}}</h3>
              </td>
              <td class="px-6 py-4">
                <h3>{{$results['test3_result']}}</h3>
              </td>
              <td class="px-6 py-4">
                <h3>{{$results['overall_result']}}</h3>
              </td>
          </tr>
      @endforeach    
      </tbody>
  </table>
</div>
