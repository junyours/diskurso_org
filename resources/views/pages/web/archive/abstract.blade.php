<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <meta name="google-site-verification" content="2XyQMgn8Xz_5JVc5z57O-9Aj9VNKq4-Z5KMSv-WzJgg" />

  <meta name="citation_issn" content="">
  <meta name="citation_publisher" content="Diskurso">
  <meta name="citation_title" content="{{ $journal->title }}">
  @foreach($authors as $author)
    <meta name="citation_author" content="{{ $author }}">
  @endforeach
  <meta name="citation_publication_date"
    content="{{ \Carbon\Carbon::parse($journal->publication_date)->format('Y/m/d') }}">
  <meta name="citation_journal_title" content="Diskurso International Multidisciplinary Research Journal">
  <meta name="citation_volume" content="{{ $journal->archive->volume }}">
  <meta name="citation_issue" content="{{ $journal->archive->issue }}">
  <meta name="citation_firstpage" content="{{ trim($firstpage) }}">
  <meta name="citation_lastpage" content="{{ trim($lastpage) }}">
  <meta name="citation_pdf_url" content="{{ route('archive.pdf', [
  'volume' => $journal->archive->volume,
  'issue' => $journal->archive->issue,
  'month_year' => $journal->archive->month_year,
  'pdf_path' => $journal->pdf_path,
]) }}">
  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 text-sm antialiased">
  @include('components.web.navbar')
  <main class="min-h-screen max-w-7xl mx-auto">
    @include('components.web.banner')
    @include('components.web.marquee')
    <div class="flex flex-col md:flex-row">
      <div class="p-2 w-full space-y-2 md:w-xs">
        @include('components.web.category')
        @include('components.web.download')
      </div>
      <div class="flex-1 md:py-2 max-md:px-2">
        <div class="space-y-4">
          <div class="space-y-2">
            <h1 class="font-bold text-[#0048AE] uppercase text-lg border-b border-gray-200 pb-2">{{ $journal->title }}
            </h1>
            <h2 class="font-semibold">Author: <span class="font-normal">{{ $journal->author }}</span></h2>
            <h2 class="font-semibold">Country: <span class="font-normal">{{ $journal->country }}</span></h2>
            <h2 class="font-semibold">Volume & Issue: <span class="font-normal">Volume {{ $journal->archive->volume }},
                Issue
                {{ $journal->archive->issue }},
                {{ Carbon\Carbon::parse($journal->archive->month_year)->format('F Y') }}</span>
            </h2>
            <h2 class="font-semibold">Page No.: <span class="font-normal">{{ $journal->page_number }}</span></h2>
            <h2 class="font-semibold">DOI.: <a href="https://doi.org/10.63941/{{ $journal->doi }}" target="_blank"
                class="font-normal hover:underline">https://doi.org/10.63941/{{ $journal->doi }}</a></h2>
            <h2 class="font-semibold">Publication Date: <span
                class="font-normal">{{ \Carbon\Carbon::parse($journal->publication_date)->format('F j, Y') }}</span>
            </h2>
            <div>
              <h2 class="font-semibold">Abstract:</h2>
              <p>{{ $journal->abstract }}</p>
            </div>
            <div>
              <h2 class="font-semibold">Keywords:</h2>
              <p>{{ $journal->keyword }}</p>
            </div>
          </div>
          <a href="{{ route('archive.pdf', [
  'volume' => $journal->archive->volume,
  'issue' => $journal->archive->issue,
  'month_year' => $journal->archive->month_year,
  'pdf_path' => $journal->pdf_path,
]) }}" target="_blank">
            <button type="button"
              class="whitespace-nowrap rounded-sm bg-red-600 border border-red-600 px-4 py-2 text-xs font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">PDF
              Open Access</button>
          </a>
        </div>
      </div>
      <div class="p-2 w-full space-y-2 md:w-xs">
        @include('components.web.author-menu')
        @include('components.web.archive')
      </div>
    </div>
  </main>
  @include('components.web.footer')
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>