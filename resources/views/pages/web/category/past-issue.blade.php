@extends('layouts.web')

@section('content')
  <div class="space-y-4">
    <h1 class="font-bold text-lg">Past Issue | Quarterly Archive</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
      @foreach ($archives as $archive)
          <a href="{{ route('archive', [
          'volume' => $archive->volume,
          'issue' => $archive->issue,
          'from_month' => $archive->from_month,
          'to_month' => $archive->to_month,
        ]) }}" class="flex items-center gap-2 border border-gray-200 p-2 hover:text-[#0048AE]">
            <span class="font-medium">Volume {{ $archive->volume }}, Issue {{ $archive->issue }},
              {{ Carbon\Carbon::parse($archive->from_month)->format('F Y') }} -
              {{ Carbon\Carbon::parse($archive->to_month)->format('F Y') }}</span>
          </a>
      @endforeach
    </div>
  </div>
@endsection