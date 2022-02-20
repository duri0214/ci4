## TODO
- リポジトリ層の操作を整備（テンプレートに表示）
- 複数のリポジトリ操作をサービス層に持っていく
  - とともに、ドメイン層も整備することになると思う
- CSVアップロード機能
  - ユーザーテーブルをダイナミックに作れる？
- 年度更新

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

## codeigniterにおけるエンティティと関係
https://forum.codeigniter.com/thread-80298.html

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
