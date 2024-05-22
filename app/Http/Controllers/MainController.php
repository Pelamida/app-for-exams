<?php

namespace App\Http\Controllers;

use App\Models\AnswerModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function subject(){
        $subjects = new SubjectModel();
        return view('subject',['data'=>$subjects->all()]);
    }

    public function subject_check(Request $request){
        
        $onesub = new SubjectModel();
        $onesub->sub = $request->input('subject');

        $onesub->save();
        return redirect()->route('subject');
    }
    
    

    public function updateSubject($id){
        $onesub = new SubjectModel();
        return view('update-subject', ['data'=>$onesub->find($id)]);
    }

    public function updateSubjectName($id ,Request $request){
        
        $onesub = SubjectModel::find($id);
        $onesub->sub = $request->input('subject');

        $onesub->save();
        return redirect()->route('subject-one',$id);
    }

    public function deleteSubject($id){
        SubjectModel::find($id)->delete();
        return redirect()->route('subject');
    }

    public function showOneSubject($id){
        $onesubject = SubjectModel::find($id);
        $answers= $onesubject->answers;
        return view('one-subject', ['data'=>$onesubject], ['datans'=>$answers]);
    }

    public function subjectOne_check($id, Request $request){
        function uploadImage($image){
            $name = $image['name'];
            $tmp_name = $image['tmp_name'];
            move_uploaded_file($tmp_name,"storage/".$name);
        }


        $valid = $request->validate([
            'question'=> 'required',
        ]);  
        
        $answer = new AnswerModel();
        $onesubject = SubjectModel::find($id);
        $answer->subject_model_id=$onesubject->id;
        $answer->que = $request->input('question');
        if (!(empty($_POST['answer']))) {
            $answer->ans = $request->input('answer');
        }
        else {$answer->ans = " ";}

        if (!(empty($_FILES['image']))) {
            uploadImage($_FILES['image']);
            $answer->file = $_FILES['image']['name'];
        }

        $answer->save();
        return redirect()->route('subject-one',$id);
        
    }

    public function updateAnswer($id){
        $oneans = new AnswerModel();
        return view('update-answer', ['data'=>$oneans->find($id)]);
    }

    public function updateAnswerName($id ,Request $request){
        
        $onesub = AnswerModel::find($id);
        $onesub->que = $request->input('question');
        $onesub->ans = $request->input('answer');
        $onesub->save();
        return redirect()->route('subject-one',$onesub->subject_model_id);
    }

    public function deleteAnswer($id){
        $onesub = AnswerModel::find($id);
        AnswerModel::find($id)->delete();
        return redirect()->route('subject-one',$onesub->subject_model_id);
    }

    public function tests(){
        $tests = new SubjectModel();
        return view('tests',['data'=>$tests->all()]);
    }

    public function testOneSubject($id){
        $onesubject = SubjectModel::find($id);

        $connection = mysqli_connect('127.0.0.1', 'root', '', 'Subjects');

        $sql = mysqli_query($connection,"SELECT * FROM `answer_models` WHERE `subject_model_id` = $id ORDER BY RAND() LIMIT 1;");

        while($row = $sql->fetch_assoc()){
            $ques=$row['que'];
            $answ=$row['ans'];
            $pict = $row['file'];
            $ansid = $row['id'];
        }
        
        return view('one-test', ['data'=>$onesubject], ['ansid'=>$ansid,'datans'=>$answ, 'dataque'=>$ques, 'datapict'=>$pict]);
    }

    public function testOneSubjectAnswer($id){
        $oneans = AnswerModel::find($id);
        $onesubject = SubjectModel::find($oneans->subject_model_id);
        return view('one-test-answer',['ansid'=>$id, 'data'=>$onesubject, 'datans'=>$oneans->ans, 'dataque'=>$oneans->que, 'datapict'=>$oneans->file]);
    }

    public function parser_check($id,Request $request){
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['pdfFile'])) {
            $file = $_FILES['pdfFile'];

            return view('upload',['file'=>$file, 'data'=>$id]);  
        }
        else {
            echo "<p>Файл не был загружен через форму.</p>";
        }
    
    }
}
