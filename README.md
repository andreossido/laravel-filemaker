# Filemaker integration for Laravel framework
This integration allows to connect to Filemaker File/Solution/Layout with Laravel framework.<br>
This library depends on https://github.com/andreossido/laravel-odbc

### # How to install
> `composer require abram/laravel-filemaker` To add source in your project

### # Usage Instructions
It's very simple to configure:

**Add database to database.php file**
```PHP
'odbc-connection-name' => [
	'driver' => 'odbc',
	'dsn' => 'OdbcConnectionName',
	'database' => 'DatabaseName',
	'host' => '127.0.0.1',
	'username' => 'username',
	'password' => 'password',
	'options' => [
		'processor' => \Abram\Filemaker\FilemakerProcessor::class,
		'grammar' => [
			'query' => \Abram\Filemaker\FilemakerQueryGrammar::class
		],
	]
]
```
