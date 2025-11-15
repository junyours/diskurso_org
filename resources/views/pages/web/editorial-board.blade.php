@extends('layouts.web')

@section('content')
  <div class="space-y-6">
    <h1 class="font-bold text-lg">Editorial Board</h1>
    @php
      $groupedEditors = $editors->groupBy('position');
    @endphp
    @foreach ($groupedEditors as $position => $group)
      <div class="divide-y divide-gray-300">
        <h2 class="font-semibold mb-2">{{ $position }}</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-2">
          @foreach ($group as $editor)
            <div class="border border-gray-200">
              <img src="https://lh3.googleusercontent.com/d/{{ $editor->profile_picture }}" alt="{{ $editor->name }}"
                class="object-cover w-full h-48">
              <div class="p-2 flex flex-col gap-2">
                <h2 class="font-medium break-words">{{ $editor->name }}</h2>
                <a href="mailto:{{ $editor->email }}"
                  class="text-xs break-words text-[#0048AE] hover:underline w-fit">{{ $editor->email }}</a>
                <p class="text-gray-600 break-words">{{ $editor->department }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
@endsection