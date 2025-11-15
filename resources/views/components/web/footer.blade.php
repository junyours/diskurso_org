<footer class="border-t border-gray-200">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0">
        <a href={{ route('home') }}>
          <img src={{ asset('images/logo.png') }} class="h-5" alt="logo" />
        </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase">Follow us</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-4">
              <a href="#" class="hover:underline">Facebook</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase">Contact us</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-4">
              <a href="mailto:ditads@infosheet.dev" target="_blank" class="hover:underline">ditads@infosheet.dev</a>
            </li>
            <li class="mb-4">
              <a href="tel:+639171281320" target="_blank" class="hover:underline">+63 917 128 1320</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase">Legal</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-4">
              <a href="#" class="hover:underline">Privacy Policy</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Terms &amp; Conditions</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-gray-500 sm:text-center">© {{ date('Y') }} <a href={{ route('home') }}
          class="hover:underline">{{ config('app.name') }}</a>. All Rights Reserved.
      </span>
      <div class="flex mt-4 sm:justify-center sm:mt-0">
        <a href="#" class="text-gray-500 hover:text-gray-800">
          <i data-lucide="facebook" class="size-5" stroke-width="1.5"></i>
        </a>
      </div>
    </div>
  </div>
</footer>