<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolLessonModel;
use App\Repository\LessonEvaluationRepository;
use App\Repository\LoginRepository;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolLessonController extends BaseController
{
    private LessonEvaluationRepository $lessonEvaluationRepository;
    
    public function __construct()
    {
        $loginRepository = new LoginRepository();
        $this->lessonEvaluationRepository = new LessonEvaluationRepository();
    
        $this->login = $loginRepository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    /**
     * 授業管理｜授業一覧
     * @return string
     */
    public function lessonList(): string
    {
        $model = model(SchoolLessonModel::class);
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', null);
    
        $data = [
            'lessons' => $model->findAll(),
            'breadcrumb' => $b->render(),
        ];
        
        return view('school/admin/lesson/list', $data);
    }
    
    /**
     * 授業管理｜新規作成画面
     * @return string
     */
    public function lessonCreate(): string
    {
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('新規作成', null);
        
        $data = [
            'homerooms' => service('schoolHomeroomModel')->findAll(),
            'subsubjects' => service('schoolSubSubjectModel')->findAll(),
            'breadcrumb' => $b->render()
        ];
        
        return view('school/admin/lesson/create', $data);
    }
    
    /**
     * 授業管理｜新規作成画面｜登録
     * @return RedirectResponse
     */
    public function lessonRegister(): RedirectResponse
    {
        if ($this->validate(
            [
                'lesson_name' => ['label' => 'タイトル', 'rules' => 'required'],
            ]
        )) {
            // valid
            $model = model(SchoolLessonModel::class);
            $entity = new SchoolLessonModel();
            dd('登録処理を作ってください！');
            // $entity->
            // $model->save($data);
        
            // 連続で作る場合は create に、そうでない場合は list に redirect。
            $isContinuous = $this->request->getPost('is_continuous');
            $lessonName = $this->request->getPost('lesson_name');
            if (isset($isContinuous)) {
                // 続けてレッスン作成
                return redirect()->back()->with('success', $lessonName.' の登録が成功しました。続けてレッスン作成ができます');
            } else {
                // レッスン一覧にもどる
                return redirect('lesson_list');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
    }
    
    /**
     * 授業管理｜授業詳細
     * @param int $lessonId
     * @return string
     */
    public function lessonEvaluationList(int $lessonId): string
    {
        $model = new SchoolLessonModel();
        $schoolLesson = $model->find($lessonId);
        $lessonEvaluations = $this->lessonEvaluationRepository->getDefinition($schoolLesson);
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('授業詳細', null);
    
        $data = [
            'lesson' => $schoolLesson,
            'lessonEvaluations' => $lessonEvaluations,
            'breadcrumb' => $b->render(),
        ];
    
        return view("school/admin/lesson/detail", $data);
    }
}
