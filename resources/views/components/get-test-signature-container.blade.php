

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3 pb-5">
  <div class="p-6 text-gray-900 dark:text-gray-100 font">
    <h1 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Lets verify your  <span class="text-blue-600 dark:text-blue-500">Signature</span></h1>
  </div>

  <div class="flex md:flex-row-reverse flex-col-reverse justify-around ">
      <div>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Accepted file formats: JPEG, PNG, JPG") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Maximum file size: 5MB.") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Ensure your signature image is clear and legible.") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Avoid uploading images with low resolution or excessive details.") }}
        </p>

      <div class="flex flex-row">  
        <div class="px-10 justify-around mt-5">
          <x-primary-button type="submit" form="test_signature" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify Signature</x-primary-button>
        </div>
       
        <div class="flex lg:justify-start justify-center mt-5 lg-pl-10 pl-0">
          @if ($errors->any())
            <div class="pt-2">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li class="text-red-600 ">{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
          @endif
        </div>
      </div>  
    </div>

      <div class="flex flex-col flex-item-center justify-center lg-pr-10  md:block">
       
    <div class="px-6 text-gray-900 dark:text-gray-100">
        
      <form action="/test_signature" id="test_signature" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex lg:flex-row flex-col item-center justify-around mb-5 ">
        <!--signature-->
          <div class="flex items-center justify-center">
            <label  for="signature" class=" flex flex-col items-center justify-center w-64  h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">             
                <div  id="content1" class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG or JPG  (MAX. 5MB)</p>
                </div>
                <img id="imagePreview1" src="#" alt="Preview1" style="display: none;" class="rounded-lg w-64 h-64">
                <input onchange="NumberOne(event)" id="signature"  name="signature" type="file" accept="image/*" class="w-72 hidden"  /> 
            </label>
        </div>
      </div>
      </div>


      </form>
    </div>

      </div>
  </div>

</div>




<script type="text/javascript">
  function NumberOne(event) {
      const fileInput = event.target;
      const label = fileInput.parentElement;
      const imagePreview = label.querySelector('#imagePreview1');
      const contentDiv = label.querySelector('#content1'); // Select the first div
      
      const reader = new FileReader();
      reader.onload = function(e) {
          imagePreview.src = e.target.result;
          imagePreview.style.display = 'block';
          
          // Remove the content div from the label
          if (contentDiv) {
              label.removeChild(contentDiv);
          }
      };
      reader.readAsDataURL(fileInput.files[0]);
      
  }
</script>
