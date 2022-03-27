<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\LessonModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class SchoolLessonController extends BaseController
{
    /**
     * @return string
     */
    public function list(): string
    {
        $model = model(LessonModel::class);
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
     * @param int $lessonId
     * @return string
     */
    public function detail(int $lessonId): string
    {
        $model = model(LessonModel::class);
        $lesson['entity'] = $model->find($lessonId);
    
        // $model = model(LessonItemsModel::class);
        // $lesson['items'] = $model->where('lesson_id', $lessonId)->findAll();

        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('school_list'));
        $b->add('授業詳細', null);
    
        $data = [
            'lesson' => $lesson,
            'breadcrumb' => $b->render(),
        ];
    
        // ある授業の詳細
        return view("school/lesson/detail", $data);
    }
    
    /**
     * @throws ReflectionException
     */
    public function create(): RedirectResponse|string
    {
        helper(['form', 'url']);
        $data = null;
        if ($this->request->getMethod() === 'post') {
            if ($this->validate(
                [
                    'title' => ['label' => 'タイトル', 'rules' => 'required|min_length[3]|max_length[255]'],
                    'body'  => ['label' => '説明', 'rules' => 'required'],
                ])) {
                dd('success');
                $data = [
                    'title' => $this->request->getVar('title'),
                    'body' => $this->request->getVar('body'),
                ];
                $model = model(LessonModel::class);
                $model->save($data);
    
                // 連続で作る場合は create に、そうでない場合は list に redirect。
                $isContinuous = $this->request->getPost('is_continuous');
                if (isset($isContinuous)) {
                    return redirect('lesson_create');
                } else {
                    return redirect('lesson_list');
                }
            } else {
                view(route_to('lesson_create'), [
                    'validation' => $this->validator,
                ]);
            }
        } else {
            $data = [
                'title' => null,
                'body' => null,
            ];
        }
        
        $b = new Breadcrumb();
        $b->add('Home', route_to('school_home'));
        $b->add('授業管理', route_to('lesson_list'));
        $b->add('新規作成', null);
        $data['breadcrumb'] = $b->render();
    
        return view(route_to('lesson_create'), $data);
    }
    
    /**
     * @param int $group_id
     * @return RedirectResponse
     */
    public function edit(int $group_id): RedirectResponse
    {
        // シェアードから取得。app/Config/Services.php
        // $school = service('schoolFactory');
        // TODO: $groupId にはセグメントがある（親子関係など）
        // $school->autoRating($group_id);
        
        return redirect("school/lesson/$group_id");
    }
}
