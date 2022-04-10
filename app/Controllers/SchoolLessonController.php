<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\SchoolLessonModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolLessonController extends BaseController
{
    private mixed $validation;
    
    public function __construct()
    {
        helper('form');
        $this->validation = service('validation');
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
        
        return view(route_to('lesson_list'), $data);
    }
    
    /**
     * @throws ReflectionException
     */
    public function lessonCreate(): RedirectResponse|string
    {
        $data = null;
        if ($this->request->getMethod() === 'post') {
            $this->validation->reset();
            if ($this->validate(
                [
                    'lesson_name' => ['label' => 'タイトル', 'rules' => 'required'],
                ]
            )) {
                // valid
                // $model = model(SchoolLessonModel::class);
                // $model->save($data);
                
                // 連続で作る場合は create に、そうでない場合は list に redirect。
                $isContinuous = $this->request->getPost('is_continuous');
                if (isset($isContinuous)) {
                    // 続けてレッスン作成
                    return redirect('lesson_create');
                } else {
                    // レッスン一覧にもどる
                    return redirect('lesson_list');
                }
            } else {
                // invalid
                $data['validation'] = $this->validator;
                view(route_to('lesson_create'), $data);
            }
        }
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('新規作成', null);
        $data['breadcrumb'] = $b->render();
        
        return view(route_to('lesson_create'), $data);
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
