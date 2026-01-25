<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // Cache the story data for 1 hour (3600 seconds)
        $storyData = Cache::remember('story_data', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story.xlsx'));

            return $collections->first()->map(function ($row) {
                $rowArray = array_map('trim', $row->toArray());

                // Skip rows without story_id
                if (!isset($rowArray['story_id']) || empty($rowArray['story_id'])) {
                    return null;
                }

                return $rowArray;
            })->filter(); // remove null rows
        });

        if ($storyData->isEmpty()) {
            abort(404);
        }


        // dd($storyData);

        return view('quiz.index', compact('storyData'));
    }

    public function mcqTest()
    {
        //

        $words = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });


        if ($words->isEmpty()) {
            abort(404);
        }

        // dd($wordsdata);

        return view('quiz.mcqtest', compact('words'));
    }

    public function mocMcqTest()
    {
        //

        $words = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });


        if ($words->isEmpty()) {
            abort(404);
        }

        // dd($wordsdata);

        return view('quiz.mocmcqtest', compact('words'));
    }

    public function dragDrop($id)
    {
        //

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', $id)->values();

        if ($words->isEmpty()) {
            abort(404);
        }

        // dd($words->word);

        // "id" => "1"
        // "story_id" => "1"
        // "word" => "Brave"
        // "easy_spelling" => "Brave"
        // "wordmeaning" => "Showing courage and confidence"
        // "synonyms" => "Courageous, Bold"
        // "antonyms" => "Cowardly, Afraid"
        // "tactic" => "Remember heroes are brave"
        // "example" => "He was brave during the storm."

        return view('quiz.dragableqn', compact('words'));
    }

    public function meaningBuilder($id)
    {
        //

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', $id)->values();

        if ($words->isEmpty()) {
            abort(404);
        }


        return view('quiz.dragableqn', compact('words'));
    }


    public function storyQuizBuilder($id)
    {
        //

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', $id)->values();

        if ($words->isEmpty()) {
            abort(404);
        }


        return view('quiz.storymcq', compact('words'));
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

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', $id)->values();

        if ($words->isEmpty()) {
            abort(404);
        }


        return view('quiz.quizmode', compact('words', 'id'));
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
