<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">

      <div class="flex justify-center">
        <img src="data:image/jpeg;base64,{{ $test_image }}" alt="Description of the image" class="rounded-lg w-64 h-64">
        <div class="flex justify-center flex-col w-64 h-64 border-2  rounded-md">
          <h1 class="text-8xl flex justify-center">{{$overall_result}}%</h1>
          <p class="text-xl flex justify-center">Match Accuracy</p>
        </div>
     </div>


          <form action="/dashboard" method="get">
            <input type="submit" value="submit">
          </form>
    </div>
</div>    



