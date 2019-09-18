<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with('creator')->get();

        return view('quiz.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->canCreateQuiz())
        {
            abort(403, 'Unauthorized action.');
        }
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->canCreateQuiz())
        {
            abort(403, 'Unauthorized action.');
        }

        $newQuiz = json_decode($request->quiz, true);

        $quiz = new Quiz;
        $quiz->name = $newQuiz['name'];
        $quiz->description = $newQuiz['description'];
        $quiz->uuid = \Illuminate\Support\Str::uuid()->toString();
        $quiz->user_id = Auth::user()->id;
        $quiz->save();

        $quizID = $quiz->id;

        foreach ($newQuiz['questions'] as $index => $newQuestion) {

            $question = new QuizQuestion;
            $question->quiz_id = $quizID;
            $question->question = $newQuestion['question'];
            $question->sort = $index;
            $question->save();

            $questionID = $question->id;

            foreach ($newQuestion['answers'] as $index => $newAnswer) {
                $answer = new QuizAnswer;
                $answer->question_id = $questionID;
                $answer->answer = $newAnswer['answer'];
                $answer->is_correct = $newAnswer['is_correct'];
                $answer->sort = $index;
            $answer->save();
            }

        }

        return redirect()->route('quizzes.show', [$quiz->uuid]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id)
    {
        $quiz = Quiz::with('creator');

        $quiz->with('questions');

        if(Auth::user()->canReadAnswers())
        {
            $quiz->with('answers');
        }

        $quiz->where('uuid', '=', $quiz_id);

        return view('quiz.show', [
            'quiz' => $quiz->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id)
    {
        if(!Auth::user()->canEditQuiz())
        {
            abort(403, 'Unauthorized action.');
        }

        $quiz = Quiz::with([
            'creator',
            'questions' => function($query) {
                $query->orderBy('sort');
            },
            'answers' => function($query) {
                $query->orderBy('sort');
            }
        ])
        ->where('uuid', '=', $quiz_id)
        ->first();

        return view('quiz.edit', [
            'quiz' => $quiz
        ]);
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
        if(!Auth::user()->canEditQuiz())
        {
            abort(403, 'Unauthorized action.');
        }

        $updatedQuiz = json_decode($request->quiz, true);

        $quiz = Quiz::where('uuid', $updatedQuiz['uuid'])->first();
        $quiz->name = $updatedQuiz['name'];
        $quiz->description = $updatedQuiz['description'];
        $quiz->save();

        $questionIdMap = [];

        foreach ($updatedQuiz['questions'] as $index => $questionData) {
            if(substr($questionData['id'], 0, 1) === '_') {
                $question = new QuizQuestion();
            } else {
                $question = QuizQuestion::find($questionData['id']);
            }
            $question->quiz_id = $quiz->id;
            $question->question = $questionData['question'];
            $question->sort = $index;
            $question->save();

            $questionIdMap[$questionData['id']] = $question->id;
        }

        foreach ($updatedQuiz['answers'] as $index => $answerData) {
            if(substr($answerData['id'], 0, 1) === '_') {
                $answer = new QuizAnswer();
            } else {
                $answer = QuizAnswer::find($answerData['id']);
            }
            $answer->question_id = $questionIdMap[$answerData['question_id']];
            $answer->answer = $answerData['answer'];
            $answer->is_correct = $answerData['is_correct'];
            $answer->sort = $index;
            $answer->save();
        }


        // dd($quiz);
        // dd($request);
        return redirect()->route('quizzes.show', [$quiz->uuid]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id)
    {
        if(!Auth::user()->canDeleteQuiz())
        {
            abort(403, 'Unauthorized action.');
        }

        $quiz = Quiz::with('creator')
                    ->with('questions')
                    ->with('answers')
                    ->where('uuid', '=', $quiz_id)
                    ->first();

        $quiz->delete();

        return redirect()->route('quizzes.index')->with('alert-message','Quiz successfully deleted!')->with('alert-type','success');
    }
}
