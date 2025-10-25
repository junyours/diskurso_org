@php
  $images = [
    ['src' => 'images/indexing/1.png'],
    ['src' => 'images/indexing/2.png'],
    ['src' => 'images/indexing/3.png'],
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
    ['src' => 'images/indexing/16.png'],
    ['src' => 'images/indexing/17.png'],
  ]
@endphp

<div x-data="{
    pauseOnHover: false,
    init() {
        this.$nextTick(() => {
            this.$refs.marqueeTrack.appendChild(this.$refs.marqueeList.cloneNode(true));
        });
    }
}" class="hidden relative overflow-hidden sm:block">
  <div class="absolute inset-y-0 start-0 z-10 w-32 bg-gradient-to-r from-white to-transparent" aria-hidden="true"></div>
  <div class="absolute inset-y-0 end-0 z-10 w-32 bg-gradient-to-l from-white to-transparent" aria-hidden="true"></div>
  <div x-ref="marqueeTrack" class="animate-full-tl rtl:animate-full-tr relative flex w-full"
    x-bind:class="{ 'hover:[animation-play-state:paused]': pauseOnHover }">
    <div x-ref="marqueeList" class="flex flex-none items-center whitespace-nowrap">
      @foreach ($images as $image)
        <img src="{{ asset($image['src']) }}" class="h-[150px] object-contain">
      @endforeach
    </div>
  </div>
</div>