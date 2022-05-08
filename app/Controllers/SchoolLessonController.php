<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolLessonModel;
use CodeIgniter\HTTP\RedirectResponse;

class SchoolLessonController extends BaseController
{
    public function __construct()
    {
        $repository = service('schoolLoginRepository');
        $this->login = $repository->getTablesRelatedByLoggedInUser($_SESSION['logged_in']);
    }
    
    /**
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
        
        return view('school/lesson/list', $data);
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
        
        return view('school/lesson/create', $data);
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
     * @param int $lessonId
     * @return RedirectResponse
     */
    public function lessonEdit(int $lessonId): RedirectResponse
    {
        // シェアードから取得。app/Config/Services.php
        // $school = service('schoolFactory');
        // TODO: $groupId にはセグメントがある（親子関係など）
        // $school->autoRating($lessonId);
        
        return redirect("school/lesson/$lessonId");
    }
    
    /**
     * @param int $lessonId
     * @return string
     */
    public function lessonItemList(int $lessonId): string
    {
        $model = model(SchoolLessonModel::class);
        $lesson['entity'] = $model->find($lessonId);
    
        // $model = model(LessonItemsModel::class);
        // $lesson['items'] = $model->where('lesson_id', $lessonId)->findAll();

        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('授業詳細', null);
    
        $data = [
            'lesson' => $lesson,
            'breadcrumb' => $b->render(),
        ];
    
        // ある授業の詳細
        return view("school/lesson/detail", $data);
    }
    
    public function lessonItemCreate(int $lessonId): RedirectResponse
    {
        dd(["lessonItemCreate($lessonId)"]);
    }
    
    public function lessonItemEdit(int $lessonId, int $lessonItemId): RedirectResponse
    {
        dd(["lessonItemCreate($lessonId, $lessonItemId)"]);
    }
}
