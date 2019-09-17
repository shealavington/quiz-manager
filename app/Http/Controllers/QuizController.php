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

        foreach ($newQuiz['questions'] as $newQuestion) {

            $question = new QuizQuestion;
            $question->quiz_id = $quizID;
            $question->question = $newQuestion['question'];
            $question->save();

            $questionID = $question->id;

            foreach ($newQuestion['answers'] as $newAnswer) {
                $answer = new QuizAnswer;
                $answer->question_id = $questionID;
                $answer->answer = $newAnswer['answer'];
                $answer->is_correct = $newAnswer['is_correct'];
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
        $quiz = Quiz::with('creator')
                    ->with('questions')
                    ->with('answers')
                    ->where('uuid', '=', $quiz_id)
                    ->first();

        $questions = [];

        foreach ($quiz->questions as $question)
        {
            $questions[$question['id']] = [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => []
            ];
        }

        if(Auth::user()->canReadAnswers())
        {
            foreach ($quiz->answers as $answer)
            {
                $questions[$answer['question_id']]['answers'][] = [
                    'id' => $answer->id,
                    'answer' => $answer->answer
                ];
            }
        }

        $questions = array_values ( $questions );

        return view('quiz.show', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->canEditQuiz())
        {
            abort(403, 'Unauthorized action.');
        }
        return view('quiz.edit');
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

        return redirect()->route('quizzes.index')->with('message','Quiz successfully deleted!');
    }
}
