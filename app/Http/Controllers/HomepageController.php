<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // Cache the story data for 1 hour
        $storyData = Cache::remember('story_data', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story.xlsx'));

            return $collections->first()
                ->map(function ($row) {
                    $rowArray = array_map('trim', $row->toArray());

                    // Skip rows without story_id
                    if (empty($rowArray['story_id'])) {
                        return null;
                    }

                    return $rowArray;
                })
                ->filter()
                ->unique('story_id')
                ->values(); // IMPORTANT
        });

        if ($storyData->isEmpty()) {
            abort(404);
        }

        // -------------------
        // PAGINATION
        // -------------------
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = $storyData
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values();

        $paginatedStoryData = new LengthAwarePaginator(
            $currentItems,
            $storyData->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );


        return view('layouts.index', [
            'storyData' => $paginatedStoryData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
