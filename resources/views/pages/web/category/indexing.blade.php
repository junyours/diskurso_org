@extends('layouts.web')

@section('content')
  <div class="space-y-4">
    <h1 class="font-bold text-lg">Indexing</h1>
    @php
      $items = [
        ['src' => 'images/indexing/1.png'],
        ['src' => 'images/indexing/2.png'],
        ['src' => 'images/indexing/3.png'],
        ['src' => 'images/indexing/4.png'],
        ['src' => 'images/indexing/5.png'],
        ['src' => 'images/indexing/6.png'],
        ['src' => 'images/indexing/7.png'],
        ['src' => 'images/indexing/8.png'],
        ['src' => 'images/indexing/9.png'],
        ['src' => 'images/indexing/10.png'],
        ['src' => 'images/indexing/11.png'],
        ['src' => 'images/indexing/12.png'],
        ['src' => 'images/indexing/13.png'],
        ['src' => 'images/indexing/14.png'],
        ['src' => 'images/indexing/15.png'],
        ['src' => 'images/indexing/16.png'],
        ['src' => 'images/indexing/17.png'],
      ];
    @endphp
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
      @foreach ($items as $item)
        <div class="border border-gray-200">
          <img src="{{ asset($item['src']) }}" class="object-contain">
        </div>
      @endforeach
    </div>
  </div>
@endsection