Upmind Task: Jokes API Integration

PHP пакет и функционалност за извличане на шеги чрез адаптери, свързани с различни API-та от rapidapi.com. 
В проекта са включени два основни адаптера:

JokeProgramming, JokeScience: Извличат шеги

В rapidapi не успях да намеря API, което да връща списък с шеги, за да мога да извикам например определен брой (n) шеги наведнъж.

Винаги се връща по един запис, с различен response.

Изисквания за работа с API

Необходимо е да имате API ключ, който може да се получи след регистрация в rapidapi.com.
Всеки API е свързан с уникален x-rapidapi-host, който се задава при извикване на заявката.

Unit Тест

Проверка дали API адаптерите връщат масив от шеги и дали са представени като JSON. 

Промени

Api връзките не са актуални затова доабвих други от rapidapi.com. 

Пример за иснтанциране на JokeScience адаптера

$apiKey = "your_api_key";

$url = "api-endpoint";

$host = "your-rapidapi-host";

$jokeScience = new JokeScience($apiKey, $url, $host);

$jokes = $jokeScience->getJokes();

print_r($jokes);

В unit test съм включил своя API ключ за тестови цели
