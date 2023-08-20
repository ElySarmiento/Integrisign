<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
      {{ __("Welcome to IntegriSign, Before we get started please upload your signatures.") }}
    </div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        
      <form action="/upload-signature" method="POST" enctype="multipart/form-data">
        @csrf
      

        <div class="flex lg:flex-row flex-col item-center justify-around">
        <!--1st signature-->

        <div class="items-center justify-center "> 
          <div class="flex item-center justify-center my-4">
            <h1>1st signature</h1>
          </div> 
          <div class="flex items-center justify-center ">
          <label for="signature_1" class="flex  flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG or JPG  (MAX. 800x400px)</p>
              </div>
              <input id="signature_1" name="signature_1" type="file" class="w-72" />
              
          </label>
          </div> 
        </div>  
        <!--2nd signature-->

        <div class=" items-center justify-center "> 
          <div class="flex item-center justify-center my-4">
            <h2>2nd signature</h2>
          </div> 
        <div class="flex items-center justify-center w-30">
          <label for="signature_2" class="flex  flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG or JPG (MAX. 800x400px)</p>
              </div>
              <input id="signature_2" name="signature_2" type="file" class="w-72" />
          </label>
        </div>
        </div> 

        <!--3rd signature-->
        <div class=" items-center justify-center "> 
          <div class="flex item-center justify-center my-4">
            <h2>3rd signature</h2>
          </div> 
        <div class="flex items-center justify-center w-30">
          <label for="signature_3" class="flex  flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG or JPG  (MAX. 800x400px)</p>
              </div>
              <input id="signature_3" name="signature_3" type="file" class="w-72" />
          </label>
        </div> 
      </div>
      </div>

      <div class="flex lg:justify-start justify-center mt-5 pl-10">
        @if ($errors->any())
          <div >
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600 ">{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif

      </div>

      <div class="flex item-center justify-around mt-5">

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload Signatures</button>

      </div>


      </form>

    </div>
  
</div>
