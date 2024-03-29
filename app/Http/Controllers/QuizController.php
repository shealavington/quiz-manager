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
            // abort(403, 'Unauthorized action.');
            return redirect()->back();
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
            // abort(403, 'Unauthorized action.');
            return redirect()->back();
        }

        $quizData = json_decode($request->quiz, true);

        $quiz = $this->addOrUpdateQuiz($quizData);

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
        $quiz = Quiz::with([
            'creator',
            'questions' => function($query) {
                $query->orderBy('sort');
            }
        ]);

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
            // abort(403, 'Unauthorized action.');
            return redirect()->back();
        }

        $quiz = Quiz::with([
            'creator',
            'questions' => function($query) {
                $query->orderBy('sort');
            },
            'answers'
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
            // abort(403, 'Unauthorized action.');
            return redirect()->back();
        }

        $quizData = json_decode($request->quiz, true);

        $quiz = $this->addOrUpdateQuiz($quizData);

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
            // abort(403, 'Unauthorized action.');
            return redirect()->back();
        }

        $quiz = Quiz::with(['creator','questions'])
                    ->where('uuid', '=', $quiz_id)
                    ->first();

        $quiz->delete();

        return redirect()->route('quizzes.index')->with('alert-message','Quiz successfully deleted!')->with('alert-type','success');
    }

    protected function isTemporaryId($data) {
        return substr($data, 0 , 1) === '_' ? true : false;
    }

    protected function addOrUpdateQuiz($quizData) {
        if($this->isTemporaryId($quizData['id'])) {
            $quiz = new Quiz();
            $quiz->uuid = \Illuminate\Support\Str::uuid()->toString();
            $quiz->user_id = Auth::user()->id;
        } else {
            $quiz = Quiz::where('uuid', $quizData['uuid'])->first();
        }
        $quiz->name = $quizData['name'];
        $quiz->description = $quizData['description'];
        $quiz->save();

        $questionIdMap = [];

        foreach ($quizData['deletedAnswers'] as $index => $answerData) {
            if($this->isTemporaryId($answerData['id'])) { continue; }
            $question = QuizAnswer::find($answerData['id']);
            $question->delete();
        }

        foreach ($quizData['deletedQuestions'] as $index => $questionData) {
            if($this->isTemporaryId($questionData['id'])) { continue; }
            $question = QuizQuestion::find($questionData['id']);
            $question->delete();
        }

        foreach ($quizData['questions'] as $index => $questionData) {
            if($this->isTemporaryId($questionData['id'])) {
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

        foreach ($quizData['answers'] as $index => $answerData) {
            if(!$questionId = $questionIdMap[$answerData['question_id']]) {
                continue;
            }
            if($this->isTemporaryId($answerData['id'])) {
                $answer = new QuizAnswer();
            } else {
                $answer = QuizAnswer::find($answerData['id']);
            }
            $answer->question_id = $questionId;
            $answer->answer = $answerData['answer'];
            $answer->is_correct = $answerData['is_correct'];
            $answer->save();
        }
        return $quiz;
    }
}
