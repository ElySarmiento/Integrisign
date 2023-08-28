<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
  <div class="p-6 text-gray-900 dark:text-gray-100 font">
   <p class="text-base lg:text-large xl:text-xl font-semibold">{{ __("Welcome to IntegriSign! Before we begin, please upload your signatures.") }}</p> 
  </div>

  <div class="flex md:flex-row flex-col justify-around">
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
      </div>
      <div class="flex flex-col flex-item-center justify-center pr-10 hidden md:block">
        <img src="signatureImage/signature_1.png" alt="example signature image"
        class="w-48 h-48 justify-self-center rounded-md">
        <p class="px-10 py-3 italic text-gray-900 dark:text-gray-100 text-sm">{{ __("Example image ") }}</p>
      </div>
  </div>

</div>
