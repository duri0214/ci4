<?php

namespace App\Repository;

use App\Entities\HomeroomEntity;
use App\Models\AttendanceModel;

class AttendanceRepository extends AttendanceModel
{
    /** TODO: ややライブラリ的な使い方をしてるので、どこだろう。。ヘルパ？
     * 生徒別出欠ステータス別にカウントされたレコードセットを、生徒名で名寄せする
     * e.g. [999 => [1(出席) => '4', 2(欠席) => '1'], ... ]
     * @param $attendances  // require 'student_id' and 'attendance_status' in array
     * @return array
     */
    public function aggAttendanceStatus($attendances): array
    {
        $temp = [];
        foreach ($attendances as $attendance) {
            $student_id = $attendance['student_id'];
            $attendance_status = $attendance['attendance_status'];
            $temp[$student_id][$attendance_status] = $attendance['cnt'];
        }
        
        return $temp;
    }
    
    /**
     * @param HomeroomEntity $homeroom
     * @return AttendanceModel|null
     */
    public function getHomeroomAttendance(HomeroomEntity $homeroom): ?AttendanceModel
    {
        if ($homeroom->id) {
            $model = service('attendanceModel');
            $model->entity = $model->where('homeroom_id', $homeroom->id)->findAll();

            return $model;
        }
    
        return null;
    }
}
