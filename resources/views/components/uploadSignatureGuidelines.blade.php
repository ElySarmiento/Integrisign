<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
  <div class="p-6 text-gray-900 dark:text-gray-100 font">
    <h1 class="mb-4 text-lg font-extrabold text-gray-900 dark:text-white md:text-xl lg:text-2xl">Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">IntegriSign!</span> Before we begin, please upload your signatures.</h1>
  </div>

  <div class="flex md:flex-row flex-col justify-around">
      <div>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Accepted file formats: JPEG, PNG, JPG") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Maximum file size: 2MB.") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Ensure your signature image is clear and legible.") }}
        </p>
        <p class="px-10 py-3 text-gray-900 dark:text-gray-100">
          {{ __("Avoid uploading images with low resolution or excessive details.") }}
        </p>
      </div>
      <div class="flex flex-col flex-item-center justify-center pr-10 hidden md:block">
        <img src="signatureImage/example_signature.png" alt="example signature image"
        class="w-48 h-48 justify-self-center rounded-md">
      <div class="flex justify-center"> <p class=" py-3 italic text-gray-900 dark:text-gray-100 text-sm justify-center">{{ __("Example image ") }}</p></div>  
      </div>
  </div>

</div>
