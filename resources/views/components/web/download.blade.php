@php
  $items = [
    ['name' => 'DisKURSO_IMJR-Journal-Template', 'path' => 'files/downloads/DisKURSO_IMJR-Journal-Template.docx'],
  ]
@endphp

<div>
  <h1 class="bg-[#790E08] text-white p-2 font-semibold uppercase">Downloads</h1>
  @foreach ($items as $item)
    <a href={{ asset($item['path']) }} target="_blank"
      class="flex items-center gap-2 border-x border-b border-gray-200 hover:bg-gray-200 p-2 hover:text-[#0048AE]">
      <i data-lucide="download" class="size-5" stroke-width="1.5"></i>
      <span class="font-medium">{{ $item['name'] }}</span>
    </a>
  @endforeach
</div>