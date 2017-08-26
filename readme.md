### Install by composer

        composer require acrossoffwest/shorter:dev-master
        
### Configure

Add line to `config/app.php` 

        'providers' => [
                ...
                Acrossoffwest\Shorter\Providers\ShorterServiceProvider::class,
                ...
        
            ],
            
### Publish Styles

        php artisan vendor:publish --tag=public
        
### Run migrations

        php artisan migrate
        
### Open Shorter:

        http://yourproject.com/shorter/
        
### API Method for generate short url

    Request Method: Post
    Request Url: http:://yourproject.com/api/shorter/generate
    Request Data: url (Validate rules: (https|http|ftp)://*.*)
    