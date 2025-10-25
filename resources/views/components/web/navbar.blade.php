@php
  $items = [
    ['name' => 'Home', 'route' => 'home'],
    ['name' => 'Contact Us', 'route' => 'contact-us'],
  ]
@endphp
<div class="hidden bg-white sm:block">
  <div class="max-w-7xl mx-auto p-2">
    <div class="flex items-center justify-between gap-4">
      <div class="flex items-center gap-4 text-[#790E08]">
        <div class="flex items-center gap-2">
          <i data-lucide="mail" class="size-5" stroke-width="1.5"></i>
          <a href="mailto:ditads@infosheet.dev" target="_blank" class="hover:underline">ditads@infosheet.dev</a>
        </div>
        <div class="flex items-center gap-2">
          <i data-lucide="phone" class="size-5" stroke-width="1.5"></i>
          <a href="tel:09171281320" target="_blank" class="hover:underline">09171281320</a>
        </div>
        <div class="flex items-center gap-2">
          <i data-lucide="map-pin" class="size-5" stroke-width="1.5"></i>
          <a href="https://maps.app.goo.gl/WLB5KaEyTygUozGJ9" target="_blank" class="hover:underline">Metro Square R118
            Zone 2, Iponan,
            CDO City</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false"
  class="bg-[#0048AE] sticky top-0 z-50" aria-label="penguin ui menu">
  <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 p-2">
    <a href={{ route('home') }} class="bg-white p-2">
      <img src={{ asset('images/logo.png') }} class="h-5" alt="logo" />
    </a>
    <ul class="hidden items-center gap-4 md:flex">
      @foreach ($items as $item)
        <li>
          <a href="{{ route($item['route']) }}"
            class="block p-2 text-white font-medium {{ request()->routeIs($item['route']) ? "bg-[#790E08]" : "bg-transparent" }}">
            {{ $item['name'] }}
          </a>
        </li>
      @endforeach
    </ul>
    <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" type="button"
      class="flex z-20 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
      <i data-lucide="menu" x-cloak x-show="!mobileMenuIsOpen" class="size-5 text-white" stroke-width="1.5"
        aria-hidden="true"></i>
      <i data-lucide="x" x-cloak x-show="mobileMenuIsOpen" class="size-5" stroke-width="1.5" aria-hidden="true"></i>
    </button>
    <ul x-cloak x-show="mobileMenuIsOpen"
      x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
      x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
      x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
      x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu"
      class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 border-b border-neutral-300 bg-neutral-50 px-2 pb-2 pt-24 md:hidden">
      @foreach ($items as $item)
        <li>
          <a href="{{ route($item['route']) }}"
            class="block p-2 font-medium {{ request()->routeIs($item['route']) ? "bg-[#790E08] text-white" : "bg-transparent" }}">
            {{ $item['name'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</nav>