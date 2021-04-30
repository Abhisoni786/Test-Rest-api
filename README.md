# Sample api codes

This is Sample api build in core PHP. It is follows the mac pattern [Model api Controller] request. No external Php library is required except Pdo
for work with sql queries.

## File structure
``` 
├──  api
│     ├── allUsers.php     
│     └── rest of api endpoint
├── config
│     └── Database.php
├── controller
│     └── HomeController.php
└──helper
    └── Utils.php
```
The following api <b>allUsers.php</b> take the data from post method and out it into <strong>Json</strong> format.

# Test

At the initial users table is null , Add single row and observe the result

````SQL 
INSERT INTO `users` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES ('1', 'Abhishek', 'asdk', 'ACTIVE', current_timestamp(), current_timestamp());
````

## Result Responses



### All Users

Success response

<b>BASE URL:</b>  ```::1/testApi/api/allUsers.php```

Http method ``GET``

```json
{
  "error": false,
  "code": 200,
  "users": [
    {
      "id": "109850",
      "username": "Abhishek",
      "password": "1234df",
      "status": "ACTIVE",
      "created_at": "2021-04-30 10:36:11",
      "updated_at": "2021-04-30 10:36:11"
    }
  ]
}
```
Error response
```json
{
  "error": true,
  "code": 409,
  "message": "No users found!"
}
```

### Add Users

Http method ``PoST``

<b>BASE URL:</b>  ```::1/testApi/api/addUser.php```


Success response
```json
{
  "error": false,
  "code": 200,
  "message": "'User added"
}
```
Error response
```json
{
  "error": true,
  "code": 409,
  "message": "Could not add user"
}
```

## Setup guide

One Api client is required
- [PostMan](https://www.postman.com/) 
- [Insomnia Core or Designer](https://insomnia.rest/) *Recommended 


Copyright &copy;[theninjacoders](https://theninjacoder.com/)
