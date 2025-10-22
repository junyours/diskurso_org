<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\User;
use Http;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('pages.web.home');
    }

    public function aboutJournal()
    {
        return view('pages.web.research-journal.about-journal');
    }

    public function indexing()
    {
        return view('pages.web.research-journal.indexing');
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

        return view('pages.web.research-journal.editorial-board', compact('editors'));
    }

    public function index()
    {
        return view('pages.web.archive.index');
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
}
