<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

  <p class="m-8 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">VERIFICATION RESULT</p>

    <div class="p-6 text-gray-900 dark:text-gray-100">

      <div class="flex flex-wrap justify-center">    
        <div class="w-64">  
              <img src="data:image/jpeg;base64,{{ $test_image }}" alt="Description of the image" class="rounded-lg w-64 h-64">
              <p class="dark:text-red-50 text-black text-sm truncate mt-4 text-center">{{$fileName}}</p>
 
        </div>   
          <!--match accuracy-->
          <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 100 }">
            <svg class="transform -rotate-90 w-72 h-72">
                <circle cx="145" cy="145" r="100" stroke="currentColor" stroke-width="30" fill="transparent"
                    class="text-transparent" />
  
                <circle cx="145" cy="145" r="100" stroke="currentColor" stroke-width="30" fill="transparent"
                    :stroke-dasharray= '2 * 22 / 7 * 100'
                    :stroke-dashoffset='2 * 22 / 7 * 100 - <?php echo $overall_result ?> / 100 * 2 * 22 / 7 * 100'
                    class="text-blue-400 " />
            </svg>
            <span class="absolute text-5xl">
              <h1 class="text-6xl flex justify-center">{{$overall_result}}%</h1>
              <p class="text-lg flex justify-center">Match accuracy</p>
            </span>
          </div>


  <div class="mt-8">
    <p class="text-2xl text-center font-semibold text-red-400">3 LAYER VERIFICATION RESULT</p>      
    <div class="flex flex-wrap justify-center">

       <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 70 }">
          <svg class="transform -rotate-90 w-48 h-48">
          <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
              class="text-transparent" />

          <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
              :stroke-dasharray= '2 * 22 / 7 * 70'
              :stroke-dashoffset='2 * 22 / 7 * 70 - <?php echo $test1_result ?> / 100 * 2 * 22 / 7 * 70'
              class="text-orange-200 " />
      </svg>
      <span class="absolute text-5xl">
        <h1 class="text-2xl flex justify-center">{{$test1_result}}%</h1>
        <p class="text-xs flex justify-center">1st layer verification</p>
      </span>
    </div>


     
      <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 70 }">
        <svg class="transform -rotate-90 w-48 h-48">
        <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
            class="text-transparent" />

        <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
            :stroke-dasharray= '2 * 22 / 7 * 70'
            :stroke-dashoffset='2 * 22 / 7 * 70 - <?php echo $test2_result ?> / 100 * 2 * 22 / 7 * 70'
            class="text-amber-200 " />
    </svg>
    <span class="absolute text-5xl">
      <h1 class="text-2xl flex justify-center">{{$test2_result}}%</h1>
      <p class="text-xs flex justify-center">2nd layer verification</p>
    </span>
  </div>
   

    <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 70 }">
      <svg class="transform -rotate-90 w-48 h-48">
      <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
          class="text-transparent" />

      <circle cx="95" cy="95" r="70" stroke="currentColor" stroke-width="15" fill="transparent"
          :stroke-dasharray= '2 * 22 / 7 * 70'
          :stroke-dashoffset='2 * 22 / 7 * 70 - <?php echo $test3_result ?> / 100 * 2 * 22 / 7 * 70'
          class="text-rose-400 " />
     </svg>
      <span class="absolute text-5xl">
      <h1 class="text-2xl flex justify-center">{{$test3_result}}%</h1>
      <p class="text-xs flex justify-center">3rd layer verification</p>
      </span>
    </div>
  </div>
</div> 

     </div >

          <form action="/dashboard" method="get" class="flex justify-center ">
            <x-secondary-button class="my-8"
              type="submit" 
               >{{ __('Verify another signature') }}
            </x-secondary-button>
          </form>

          
    </div>
</div> 

<!-- component -->
<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>    
    




