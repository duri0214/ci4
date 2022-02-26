<?php

namespace App\Repository;

class AttendanceRepository
{
    /** TODO: attendanceModelで集計クエリ投げて返す
     * 生徒別出欠ステータス別にカウントされたレコードセットを、生徒id別出欠ステータスid別で名寄せする
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
}
