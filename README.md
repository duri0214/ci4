## TODO

- 学校のレッスン一覧を表示（リテラルでハリボテ作ってあるだけ）
  - やはり「学校」とはドメインクラスを変える必要があると思う
- attendanceのレコード数を増やして、ページネーター実装
- 複数のリポジトリ操作をサービス層に持っていく
  - とともに、ドメイン層も整備することになると思う
- CSVアップロード機能
  - ユーザーが自由にマスタを登録するテーブルをダイナミックに作れる？
  - serviceの処理ステップ
    - csv吐き出し
    - csv読み込み
    - validation
      - 項目数が一致しているか
    - MySQL取り込み
    - 通知
- 認証機能
- 年度更新
- pdfタテ・ヨコ検証　phpオフィシャルから検索
  - https://codeigniter.com/user_guide/cli/cli.html?highlight=cli
- 簡単な帳票を作って
- 資格管理画面
  - マスタがあり、学校が資格を選ぶと学校がその資格を管理できる
  - 学校で取り扱わない資格は表示されない
  - student に紐付いている

# migration
1. 該当テーブルを消す
2. migrations テーブルから該当マイグレーションレコードを消す
3. 新規のとき（編集はそのまま既存migrationを編集して）
   1. php spark make:migration --suffix
   2. [up()とdown()メソッドを記述](https://qiita.com/YoshitakaOkada/items/7bdc4906725dab5adca6#up-%E3%81%A8-down-%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89%E3%82%92%E8%A8%98%E8%BF%B0)
4. php spark migrate -n 'Myth\Auth'
5. php spark migrate
6. php spark make:seeder --suffix
7. php spark make:entity --suffix
8. php spark make:model --suffix

# seederの順番
1. php spark db:seed VocabularyBookSeeder
2. php spark db:seed UserSeeder
3. php spark db:seed MSchoolCategorySeeder
4. php spark db:seed SchoolSeeder
5. php spark db:seed SchoolCurriculumSeeder
6. php spark db:seed SchoolPeriodSeeder
7. php spark db:seed SchoolRoleSeeder
8. php spark db:seed SchoolUserSeeder
9. php spark db:seed SchoolUserRoleSeeder
10. php spark db:seed SchoolTimeSeeder
11. php spark db:seed SchoolHomeroomSeeder
12. php spark db:seed SchoolSubjectSeeder
13. php spark db:seed SchoolSubSubjectSeeder
14. php spark db:seed SchoolLessonSeeder
15. php spark db:seed SchoolLessonItemSegmentSeeder
16. php spark db:seed SchoolLessonItemSeeder
17. php spark db:seed SchoolLessonMemberSeeder
18. php spark db:seed SchoolAttendStatusSeeder
19. php spark db:seed SchoolAttendStatusDetailSeeder
20. php spark db:seed SchoolAttendSeeder
21. php spark db:seed SchoolCertSeeder
22. php spark db:seed SchoolCertItemSeeder

## codeigniterにおけるエンティティと関係
https://forum.codeigniter.com/thread-80298.html
