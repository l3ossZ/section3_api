*ขออภัยสำหรับกรณีนี้เนื่องจากไม่เคยเรียนและเขียน framwork ของ back-end ที่กำหนดให้จึงขอเขียน ใน framework ที่เขียนเป็น (php laravel)*

*SETUP*
require docker to run
1. clone project 
2. cd to path project
3. docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html \
-w /var/www/html laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
4. cp .env.example .env
5. ./vendor/bin/sail up -d
6. ./vendor/bin/sail artisan key:generate
7. ./vendor/bin/sail artisan migrate --seed

8. test restapi with postman

*Postman Setup*
header 
accept application/json


*date format is yyyy-mm-dd*

*BOOKS*
localhost/api/books GET/POST
localhost/api/books/{bookid} DELETE/PUT/GET

*AUTHORS*
*จะเห็นความสัมพันธ์ของ author กับ books ที่ GET แบบ id*
localhost/api/authors GET/POST
localhost/api/authors/{authorid} DELETE/PUT/GET

