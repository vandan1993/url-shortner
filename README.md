<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Dependence 

-[Sqlite]
-[ash-jc-allen/short-url]
- [Laravel 9](https://github.com/laravel/framework)
- [PHP 8.2](https://www.php.net/releases/8.1/en.php)

## Sqlite3  Configuration
- Install php dependency  
```bash 
  sudo apt install php-sqlite3
  sudo apt-get install php-bcmath
  ```
## PostMan
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/1703458-d05e27f3-db1e-4915-a40a-fdd283b6cadd?action=collection%2Ffork&collection-url=entityId%3D1703458-d05e27f3-db1e-4915-a40a-fdd283b6cadd%26entityType%3Dcollection%26workspaceId%3D493d307c-7d94-48dc-8f0a-e77eb6cd153f)


## Api Routes
- Url Resize 

    Url - http://127.0.0.1:8000/api/urlResize
    Method POST
    Request Body
    {
        "url" :"https://code.tutsplus.com/tutorials/exception-handling-in-laravel--cms-30210",
        "singleuse" : true
    }

- Retrive short url
    Method POST
    Url - http://127.0.0.1:8000/api/getShortUrl

    Request Body
    {
        "url" :"https://code.tutsplus.com/tutorials/exception-handling-in-laravel--cms-30210"
    }

- List
    Method GET
    http://127.0.0.1:8000/api/getAllUrl
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
