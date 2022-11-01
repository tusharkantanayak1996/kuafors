<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\QuestionType;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        $question = QuestionType::get();
        return view('admin.questions.index',compact('question'));
    }
    public function addQuestion()
    {
        return view('admin.questions.newquestion');
    }
    public function saveQuestion(Request $request)
    {
        $question = new QuestionType();
        $question->category = $request->category;
        $question->questions = $request->question;
        $question->save();
        return redirect(url('/admin/question'))->with('flash_success', 'Question created successfully');
    }
    public function editQuestion($id)
    { 
        $question = QuestionType::find($id);
        return view('admin.questions.editquestion',compact('question'));
    }

    public function updateQuestion(Request $request,$question_id)
    {
        $question = QuestionType::find($question_id);

        if($request->category){
            $question->category = $request->category;
        }
        $question->questions = $request->question;
        $question->save();
        return redirect(url('/admin/question'))->with('flash_success', 'Question updated successfully');
    }

    public function deleteQuestion($question_id)
    {
        $question = QuestionType::find($question_id)->delete();
        if($question){
            return redirect()->back()->with('flash_success', 'Question deleted successfully');
        }else{
            return redirect()->back()->with('flash_success', 'Question not deleted');
        }
    }
}
