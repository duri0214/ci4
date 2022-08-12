## TODO
- [x] 複数のリポジトリ操作をサービス層に持っていく
  - [x] とともに、ドメイン層も整備することになると思う
- CSVアップロード機能
  - [ ] ユーザーが自由にマスタを登録する `user table` をダイナミックに作れる？
  - CsvServiceの処理ステップ
    - [x] csv吐き出し
    - [ ] csv読み込み
    - [ ] validation
    - [ ] 項目数が一致しているか
    - [ ] MySQL取り込み
    - [ ] 通知

## migration作成
- 一部のテーブルを消して作り直すとき
  - 該当テーブルを消す
  - `migrations` テーブルから該当マイグレーションレコードを消す
- 新規作成のとき
  - `php spark make:migration --suffix`
  - [up()とdown()メソッドを記述](https://qiita.com/YoshitakaOkada/items/7bdc4906725dab5adca6#up-%E3%81%A8-down-%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89%E3%82%92%E8%A8%98%E8%BF%B0)

## migrate!!
- 更地db作成
- `php spark migrate -n 'Myth\Auth'`
- `php spark migrate`

## その他新規作成
### seeder
- `php spark make:seeder --suffix`
### entity
- `php spark make:entity --suffix`
### model
- `php spark make:model --suffix`

## seeder実行!!
1. php spark db:seed VocabularyBookSeeder
2. php spark db:seed UserSeeder
3. php spark db:seed MSchoolCategorySeeder
4. php spark db:seed SchoolCorporationSeeder
5. php spark db:seed SchoolSeeder
6. php spark db:seed SchoolCurriculumSeeder
7. php spark db:seed SchoolPeriodSeeder
8. php spark db:seed SchoolRoleSeeder
9. php spark db:seed SchoolUserSeeder
10. php spark db:seed SchoolUserRoleSeeder
11. php spark db:seed SchoolTimeSeeder
12. php spark db:seed SchoolHomeroomSeeder
13. php spark db:seed SchoolSubjectSeeder
14. php spark db:seed SchoolSubSubjectSeeder
15. php spark db:seed SchoolLessonSeeder
16. php spark db:seed MLessonEvaluationSeeder
18. php spark db:seed SchoolLessonEvaluationSeeder
19. php spark db:seed SchoolLessonMemberSeeder
20. php spark db:seed SchoolAttendStatusSeeder
21. php spark db:seed SchoolAttendStatusDetailSeeder
22. php spark db:seed SchoolAttendSeeder
23. php spark db:seed SchoolCertSeeder
24. php spark db:seed SchoolCertItemSeeder

## codeigniterにおけるエンティティと関係
https://forum.codeigniter.com/thread-80298.html
