<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::query()
            ->orderByDesc('volume')
            ->orderByDesc('issue')
            ->orderByDesc('month_year')
            ->get();

        return view('pages.app.archive.index', compact('archives'));
    }

    public function create()
    {
        return view('pages.app.archive.create');
    }

    public function add(Request $request)
    {
        $accessToken = $this->token();

        $request->validate([
            'volume' => ['required'],
            'issue' => ['required'],
            'month_year' => ['required'],
        ]);

        $mainFolder = $this->getOrCreateFolder($accessToken, 'Archives', config('services.google.folder_id'));
        $subFolder = $this->getOrCreateFolder($accessToken, 'Volume' . ' ' . $request->volume . ',' . ' ' . 'Issue' . ' ' . $request->issue . ',' . ' ' . Carbon::parse($request->month_year)->format('F Y'), $mainFolder);

        Archive::create([
            'volume' => $request->volume,
            'issue' => $request->issue,
            'month_year' => $request->month_year,
            'folder_id' => $subFolder,
        ]);

        return redirect()->back();
    }
}
