@extends('layouts.web')

@section('content')
  <div class="space-y-4">
    <h1 class="font-bold text-lg">Past Issue | Quarterly Archive</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
      @foreach ($archives as $archive)
          <a href="{{ route('archive', [
          'volume' => $archive->volume,
          'issue' => $archive->issue,
          'month_year' => $archive->month_year
        ]) }}" class="flex items-center gap-2 border border-gray-200 p-2 hover:text-[#0048AE]">
            <span class="font-medium">Volume {{ $archive->volume }}, Issue {{ $archive->issue }},
              {{ Carbon\Carbon::parse($archive->month_year)->format('F Y') }}</span>
          </a>
      @endforeach
    </div>
  </div>
@endsection