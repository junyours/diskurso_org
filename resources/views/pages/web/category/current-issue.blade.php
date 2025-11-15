@extends('layouts.web')

@section('content')
  <div class="space-y-4">
    <h1 class="font-bold text-lg">
      Current Issue | Volume {{ $archive->volume }}, Issue {{ $archive->issue }},
      {{ Carbon\Carbon::parse($archive->from_month)->format('F Y') }} -
      {{ Carbon\Carbon::parse($archive->to_month)->format('F Y') }}
    </h1>
    @if (!$journals->isEmpty())
      @foreach ($journals as $journal)
        @php
          $hashids = new Hashids\Hashids(config('app.key'), 36);
          $hashedId = $hashids->encode($journal->id);
        @endphp
        <div class="space-y-2 border-b border-gray-300 pb-2">
          <div class="space-y-0.5">
            <h1 class="font-bold text-[#0048AE] uppercase">{{ $journal->title }}</h1>
            <h2 class="font-medium">{{ $journal->author }}</h2>
            <h3 class="font-semibold">{{ $journal->country }}</h3>
          </div>
          <p class="text-gray-800/80 line-clamp-3">{{ $journal->abstract }}</p>
          <div class="flex sm:items-center gap-2 max-sm:flex-col">
            <a href="{{ route('abstract', strtolower(str_replace(' ', '-', $journal->title))) }}">
              <button type="button"
                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-sm bg-neutral-50 border border-neutral-50 px-4 py-2 text-xs font-medium tracking-wide text-neutral-900 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-50 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">
                Abstract
                <i data-lucide="move-right" class="size-5" stroke-width="1.5"></i>
              </button>
            </a>
            <a href="{{ route('archive.pdf', [
            'volume' => $archive->volume,
            'issue' => $archive->issue,
            'from_month' => $archive->from_month,
            'to_month' => $archive->to_month,
            'hashedId' => $hashedId,
          ]) }}" target="_blank">
              <button type="button"
                class="whitespace-nowrap rounded-sm bg-red-600 border border-red-600 px-4 py-2 text-xs font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">PDF
                Open Access</button>
            </a>
            <p class="ml-2 font-semibold">Page No.: <span class="text-[#790E08]">{{ $journal->page_number }}</span></p>
          </div>
        </div>
      @endforeach
    @else
      <h1 class="font-semibold text-center">We haven’t published any articles yet. Check back later!</h1>
    @endif
  </div>
@endsection