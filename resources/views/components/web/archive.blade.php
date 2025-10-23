@php
  $archives = App\Models\Archive::query()
    ->orderByDesc('volume')
    ->orderByDesc('issue')
    ->orderByDesc('month_year')
    ->get();
@endphp

<h1 class="bg-[#790E08] text-white p-2 font-semibold uppercase">Monthly Archive</h1>
@foreach ($archives as $archive)
  <a href="{{ route('archive', [
      'volume' => $archive->volume,
      'issue' => $archive->issue,
      'month_year' => $archive->month_year
    ]) }}"
    class="flex items-center gap-2 border-x border-b border-gray-200 hover:bg-gray-200 p-2 hover:text-[#0048AE]  {{ request()->is("archive/volume-{$archive->volume}/issue-{$archive->issue}/{$archive->month_year}") ? 'text-[#0048AE]' : '' }}">
    <i data-lucide="circle-plus" class="size-5" stroke-width="1.5"></i>
    <span class="font-medium">Volume {{ $archive->volume }}, Issue {{ $archive->issue }},
      {{ Carbon\Carbon::parse($archive->month_year)->format('F Y') }}</span>
  </a>
@endforeach