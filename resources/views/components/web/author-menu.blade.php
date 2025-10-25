@php
  $items = [
    ['name' => 'Submission Guidelines', 'route' => 'submission-guideline'],
    ['name' => 'Research Ethics', 'route' => 'research-ethics'],
  ]
@endphp

<div>
  <h1 class="bg-[#790E08] text-white p-2 font-semibold uppercase">Authors Menu</h1>
  @foreach ($items as $item)
    <a href={{ route($item['route']) }}
      class="flex items-center gap-2 border-x border-b border-gray-200 hover:bg-gray-200 p-2 hover:text-[#0048AE] {{ request()->routeIs($item['route']) ? "text-[#0048AE]" : "" }}">
      <i data-lucide="chevrons-right" class="size-5" stroke-width="1.5"></i>
      <span class="font-medium">{{ $item['name'] }}</span>
    </a>
  @endforeach
</div>