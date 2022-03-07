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
- Model->chunk() について
- pdfタテ・ヨコ検証　phpオフィシャルから検索
  - https://codeigniter.com/user_guide/cli/cli.html?highlight=cli
- 簡単な帳票を作って
- 資格管理画面
  - マスタがあり、学校が資格を選ぶと学校がその資格を管理できる
  - 学校で取り扱わない資格は表示されない
  - student に紐付いている

# seederの順番
1. php spark db:seed VocabularyBookSeeder
2. php spark db:seed SchoolCategorySeeder
3. php spark db:seed SchoolSeeder
4. php spark db:seed PeriodSeeder
5. php spark db:seed UserCategorySeeder
6. php spark db:seed UserRoleSeeder
7. php spark db:seed UserSeeder
8. php spark db:seed TimeSeeder
9. php spark db:seed StatusSeeder
10. php spark db:seed StatusDetailSeeder
11. php spark db:seed HomeroomSeeder
12. php spark db:seed SubjectSeeder
13. php spark db:seed SubSubjectSeeder
14. php spark db:seed LessonSeeder
15. php spark db:seed AttendanceSeeder
16. php spark db:seed TeacherSeeder
17. php spark db:seed LessonTeacherSeeder
18. php spark db:seed CertificationMasterSeeder

## codeigniterにおけるエンティティと関係
https://forum.codeigniter.com/thread-80298.html
