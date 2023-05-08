Бизнес модель - кафе

Особенности:

повара готовят конкретные блюда
меню формируется на основе готовых блюд
посетитель заказывает блюда из меню
Сделать:
Разработать на php :
Физическая модель данных (в таблицах использовать минимум аттрибутов)
Метод REST API открытия чека
Метод REST API добавление позиции из меню в чек
Метод REST API получения списка популярных поваров за период (критерий популярности - количество заказанных блюд)

API:
1. POST /api/order/new
Открытие чека
Запрос:
Ответ: {"id": int} | MethodNotAllowedHttpException
2. POST /api/order/add-dish
Добавление позиции из меню в чек
Запрос: [menu_id:int, order_id:int, amount:int]
Ответ: {"status": "ok"} | MethodNotAllowedHttpException | BadRequestHttpException | UnknownPropertyException
3. GET /api/order/popular-cooks
Получение списка популярных поваров за период
Запрос: [from:string, to:string]
Ответ: [string] | MethodNotAllowedHttpException