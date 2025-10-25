<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Journal;
use App\Models\User;
use Http;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $archive = Archive::query()
            ->orderByDesc('volume')
            ->orderByDesc('issue')
            ->orderByDesc('month_year')
            ->firstOrFail();

        $journals = Journal::query()
            ->where('archive_id', $archive->id)
            ->orderByDesc('publication_date')
            ->limit(3)
            ->get();

        return view('pages.web.home', compact('archive', 'journals'));
    }

    public function aboutUs()
    {
        return view('pages.web.about-us');
    }

    public function editorialBoard()
    {
        $editors = User::query()->where('role', 'editor')
            ->orderByRaw("
            CASE 
                WHEN position = 'Editorial in Chief' THEN 1
                WHEN position = 'Associate Editor' THEN 2
                WHEN position = 'Editorial Board' THEN 3
                ELSE 4
            END
        ")
            ->get();

        return view('pages.web.editorial-board', compact('editors'));
    }

    public function contactUs()
    {
        return view('pages.web.contact-us');
    }

    public function aboutJournal()
    {
        return view('pages.web.category.about-journal');
    }

    public function indexing()
    {
        return view('pages.web.category.indexing');
    }

    public function currentIssue()
    {
        $archive = Archive::query()
            ->orderByDesc('volume')
            ->orderByDesc('issue')
            ->orderByDesc('month_year')
            ->firstOrFail();

        $journals = Journal::query()
            ->where('archive_id', $archive->id)
            ->orderByDesc('publication_date')
            ->get();

        return view('pages.web.category.current-issue', compact('archive', 'journals'));
    }

    public function pastIssue()
    {
        $archives = Archive::query()
            ->orderByDesc('volume')
            ->orderByDesc('issue')
            ->orderByDesc('month_year')
            ->get();

        return view('pages.web.category.past-issue', compact('archives'));
    }

    public function submissionGuideline()
    {
        return view('pages.web.author-menu.submission-guideline');
    }

    public function researchEthics()
    {
        return view('pages.web.author-menu.research-ethics');
    }

    public function index($volume, $issue, $month_year)
    {
        $archive = Archive::query()
            ->where('volume', $volume)
            ->where('issue', $issue)
            ->where('month_year', $month_year)
            ->firstOrFail();

        $journals = Journal::query()
            ->where('archive_id', $archive->id)
            ->orderByDesc('publication_date')
            ->get();

        return view('pages.web.archive.index', compact('volume', 'issue', 'month_year', 'journals'));
    }

    public function pdf($volume, $issue, $month_year, $pdf_path)
    {
        Archive::whereHas('journal', function ($query) use ($pdf_path) {
            $query->where('pdf_path', $pdf_path);
        })
            ->where('volume', $volume)
            ->where('issue', $issue)
            ->where('month_year', $month_year)
            ->firstOrFail();

        $pdfUrl = "https://drive.google.com/uc?export=view&id={$pdf_path}";

        return response()->make(file_get_contents($pdfUrl), 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function abstract($title)
    {
        $journal = Journal::with('archive')
            ->where('title', str_replace('-', ' ', $title))
            ->firstOrFail();

        $authors = array_map('trim', explode(',', $journal->author));
        [$firstpage, $lastpage] = explode('-', $journal->page_number);

        return view('pages.web.archive.abstract', compact('journal', 'authors', 'firstpage', 'lastpage'));
    }
}
