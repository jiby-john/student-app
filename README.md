To configure student-app follow the steps mentioned below

1.Clone student-app project using following command
 git clone https://github.com/jiby-john/student-app

2.Setup project in your machine by configuring database first
	Go to .env in the root directory and configure your database there.

3.After setting database,we need to set create tables ,to create tables use following command
 	php artisan migrate

4.To seed teacher dummy data run following command from the project root directory
 	php artisan db:seed --class=TeacherTableSeeder

5.To run the project run following command from the project root directory
	php artisan serve
  Then go to your browser and take the url which is obtained from the commandline
