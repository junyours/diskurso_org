@extends('layouts.web')

@section('content')
  <div class="space-y-4">
    <h1 class="font-bold text-lg">Editorial Board</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
      @foreach ($editors as $editor)
        <div class="border border-gray-200">
          <img src="https://lh3.googleusercontent.com/d/{{ $editor->profile_picture }}" alt="{{ $editor->name }}"
            class="object-cover w-full h-44">
          <div class="p-2 space-y-2">
            <div class="space-y-1">
              <h1 class="font-semibold">{{ $editor->position }}</h1>
              <h2 class="font-medium">{{ $editor->name }}</h2>
              <h3 class="text-xs">{{ $editor->email }}</h3>
            </div>
            <p>{{ $editor->department }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection