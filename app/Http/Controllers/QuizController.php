<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Exception;

class QuizController extends Controller
{
    public function index(Request $request)
    { 
        return view('quiz');
    }

    public function quiz(Request $request){
        try{ 
        
            if(
                !$request
                ->session()
                ->get('user')
            ){
                return response()->json([
                    'message' => 'Unauthenticated',
                    'data' => null 
                ], 401);
            }      
            $question = Question::with('options')
            ->whereNotIn('id', $request->session()->get('answered_questions', []))
                ->inRandomOrder()
                ->first();
             
            if(is_null($question)){  

                $result = Result::create([
                    'user_id'=> $request->session()->get('user'),
                    'total_skip_question' => count($request->session()->get('skip_questions') ?? []),
                    'total_answers_wrong' => count($request->session()->get('wrong_questions') ?? []),
                    'total_answers_right' => count($request->session()->get('question_corrects') ?? [] )
                ]); 
                
                $request->session()->flush(); 
                return response()->json([
                    'message' => 'Result Data',
                    'data' => $result 
                ]);
                 
            } 
            return response()->json([
                'message' => 'Question Data',
                'data' => [
                    'question' => $question,
                    'total_answer' => count($request->session()->get('answered_questions', [])),
                ] 
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Something Went Wrong',
                'data' => $e->getMessage()
            ], 422);  
        }
    }

    public function submit(Request $request)
    {

        try{
            $selectedOptionId = $request->option_id;
            $questionId = $request->question_id; 

            $answer = Answer::where([
                ['option_id', $selectedOptionId],
                ['question_id', $questionId]
                ])->first(); 
                
            if (!is_null($answer)) {

                $questionCorrects = $request->session()->get('question_corrects', []);
                $questionCorrects[] = $questionCorrects;
                $request->session()->put('question_corrects', $questionCorrects); 
            
            }else{

                $wrongAnswer = $request->session()->get('wrong_questions', []);
                $wrongAnswer[] = $wrongAnswer;
                $request->session()->put('wrong_questions', $wrongAnswer); 
            } 

            $answeredQuestions = $request->session()->get('answered_questions', []); 
            $answeredQuestions[] = $questionId; 
    
            $request->session()->put('answered_questions', $answeredQuestions);

            return response()->json([
                'message' => 'submit successfully.',
                'data' => $request->session()->get('answered_questions')
            ]);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Something Went Wrong',
                'data' => $e->getMessage()
            ], 422);  
        }
    }

    public function questionSkip(Request $request){
          
        try{
            $skipQuestions = $request->session()->get('skip_questions', []);
            $skipQuestions[] = $request->question_id;
            $request->session()->put('skip_questions', $skipQuestions);
            
            $answerQuestions = $request->session()->get('answered_questions', []);
            $answerQuestions[] = $request->question_id;
            $request->session()->put('answered_questions', $answerQuestions);   

            return response()->json([
                'message' => 'skip successfully.',
                'data' => $request->session()->get('skip_questions')
            ]);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Something Went Wrong',
                'data' => $e->getMessage()
            ], 422);  
        }
    } 

}
