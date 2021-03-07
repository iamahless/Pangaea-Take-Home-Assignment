php artisan serve

curl -X POST -H "Content-Type: application/json" -d '{ "url": "http://localhost:3001/test1"}' http://127.0.0.1:8000/api/subscribe/topic1
curl -X POST -H "Content-Type: application/json" -d '{ "url": "http://localhost:3002/test2"}' http://127.0.0.1:8000/api/subscribe/topic2
curl -X POST -H "Content-Type: application/json" -d '{"message": "hello"}' http://127.0.0.1:8000/api/publish/topic1
