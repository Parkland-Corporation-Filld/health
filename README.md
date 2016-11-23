# Filld Laravel / Lumen Health check
A simple plugin for Laravel / Lumen, which enumerates your database connections,
and returns a JSON block showing if the connections are healthy or not.

```JSON
{
  "status": true,
  "dbs": {
    "DB_1": true,
    "DB_2": true,
    "DB_3": true
  }
}
```


## Installation

### Laravel
Register the Service provider in `config/app.php`

```PHP
'providers' => [
    // Other Service Providers

    App\Providers\ComposerServiceProvider::class,
],
```

### Lumen
Register the Service provider in `bootstrap/app.php`:

```PHP
$app->register(Filld\Health\Providers\HealthServiceProvider::class);
```
