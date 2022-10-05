# Отчёт к лабораторной работе №1
## Текст задания
Цель работы - спроектировать и разработать систему авторизации пользователей на протоколе HTTP. 
Выполненные требования:
- функциональность входа/выхода, 
- хранение паролей в хешированном виде, 
- форма регистрации, 
- хранение хеша пароля с солью.
## Пользовательский интерфейс (Figma)
Необходимо создать три страницы: входа, регистрации и главную страницу сайта.
1. Страница входа
![clipboard](https://i.imgur.com/8t54fgR.png)
2. Страница регистрации
![clipboard](https://i.imgur.com/85pZ43M.png)
3. Главная страница сайта
![clipboard](https://i.imgur.com/eRGGoVz.png)
Доступ к третьей странице невозможен не вошедшему на сайт пользователю.
## Пользовательские сценарии работы
1. Пользователь вводит в адресной строке signup.php и попадает на форму регистрации. Вводит данные, но пользователь с таким именем уже зарегистрирован - на экране появляется сообщение "Username already taken!". Тогда, при регистрации с другим ником, пользователь переходит на страницу входа и после повторного ввода данных попадает на сайт.
2. Пользователь вводит в адресной строке signin.php и попадает на форму входа. Вводит данные, но неверно - появляется сообщение "Wrong login or password!". Пользователь повторн вводит данные и успешно попадает на сайт.
3. Пользователь вводит в адресной строке index.php и оказывается перенаправлен на страницу со входом. Вводит свои верные данные и попадает на сайт.
## Описание API сервера и хореографии
## Описание структуры базы данных
Для администрирования сервера MySQL и просмотра содержимого базы данных используется браузерное приложение phpMyAdmin. Используется 5 столбцов:
1. "id" типа int с автоматическим приращением для выдачи уникальных id каждому зарегистрированному пользователю,
2. "user_name" типа varchar для хранения логина пользователя,
3. "auth_token" типа bigint для хранения значения токена этого пользователя (значения кукис),
4. "password" типа varchar для хранения пароля пользователя в хешированном виде,
5. "salt" типа varchar для хранения соли, применяемой для хеширования пароля.

Пример того, как данные пользователей выглядят в базе данных.
![clipboard](https://i.imgur.com/eHHsJWd.png)

## Описание алгоритмов
## Примеры HTTP запросов/ответов
![Untitled](https://i.imgur.com/A8BQFNH.png)
![Untitled2](https://i.imgur.com/2aSd0GB.png)
## Значимые фрагменты кода