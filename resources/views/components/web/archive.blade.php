@php
  $archives = App\Models\Archive::query()
    ->orderByDesc('volume')
    ->orderByDesc('issue')
    ->orderByDesc('from_month')
    ->orderByDesc('to_month')
    ->limit(10)
    ->get();
@endphp

<div>
  <h1 class="bg-[#790E08] text-white p-2 font-semibold uppercase">Quarterly Archive</h1>
  @foreach ($archives as $archive)
    <a href="{{ route('archive', [
      'volume' => $archive->volume,
      'issue' => $archive->issue,
      'from_month' => $archive->from_month,
      'to_month' => $archive->to_month
    ]) }}"
      class="flex items-center gap-2 border-x border-b border-gray-200 hover:bg-gray-200 p-2 hover:text-[#0048AE]  {{ request()->is("archive/volume-{$archive->volume}/issue-{$archive->issue}/{$archive->from_month}/{$archive->to_month}") ? 'text-[#0048AE]' : '' }}">
      <i data-lucide="circle-plus" class="size-5 shrink-0" stroke-width="1.5"></i>
      <span class="font-medium">Volume {{ $archive->volume }}, Issue {{ $archive->issue }},
        {{ Carbon\Carbon::parse($archive->from_month)->format('F Y') }} - {{ Carbon\Carbon::parse($archive->to_month)->format('F Y') }}</span>
    </a>
  @endforeach
</div>