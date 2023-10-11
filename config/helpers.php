<?php

use src\{Database\Cache,
    Error,
    Session,
    Slug\Slug,
    UUid,
    Redirect,
    Router\Router,
    Logger,
    Csrf,
    Crypto,
    Carbon};

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Query\Builder;
use Valitron\Validator;

/**
 * @return \src\Carbon
 */
function carbon(): Carbon
{
    return Carbon::getInstance();
}

/**
 * @return \src\Crypto
 */
function crypto(): Crypto
{
    return new Crypto(FRAMEWORK_CRYPTO_KEY, FRAMEWORK_CRYPTO_CIPHER ?? 'AES-128-ECB');
}

/**
 * @return \src\Router\Router
 */
function router(): Router
{
    return Router::getInstance();
}

/**
 * @return \Valitron\Validator
 */
function validator(): Validator
{
    return Validator::getInstance($_POST);
}

/**
 * @param $name
 *
 * @return bool|array
 */
function old($name): string|array|null
{
    $data = validator()->data();
    if (isset($data[$name])) {
        return $data[$name];
    }

    return null;
}

/**
 * @return \src\Error
 */
function error(): Error
{
    return Error::getInstance(validator());
}

/**
 * @return \src\Logger
 */
function logger(): Logger
{
    return Logger::getInstance();
}

/**
 * @param string $path
 *
 * @return string
 */
function site(string $path = ''): string
{
    $base = defined(FRAMEWORK_BASE_URL) . '/' ?? '/';

    return $base . $path;
}

/**
 * @param $path
 *
 * @return string
 */
function assets($path): string
{
    return site('public/assets/' . $path);
}

/**
 * @return \src\Session
 */
function session(): Session
{
    return Session::getInstance();
}

/**
 * @param string|null $url
 *
 * @return \src\Redirect
 */
function redirect(string|null $url = null): Redirect
{
    return Redirect::getInstance($url);
}

/**
 * @return \src\Slug\Slug
 */
function slug(): Slug
{
    return Slug::getInstance();
}

/**
 * @param string $string
 * @param array|string|null $options
 *
 * @return string
 */
function slugify(string $string, array|string $options = null): string
{
    return slug()->slugify($string, $options);
}

/**
 * @return \src\UUid
 */
function uuid(): UUid
{
    return UUid::getInstance();
}

/**
 * @return \src\Csrf
 */
function csrf(): Csrf
{
    return new Csrf();
}

/**
 * @return string
 */
function csrf_field(): string
{
    return "<input type=\"hidden\" class=\"form-control\" name=\"_token\" value=\"" . \csrf()->get_token() . "\" />" . PHP_EOL;
}

/**
 * @param $table
 *
 * @return \Illuminate\Database\Query\Builder
 */
function db($table): Builder
{
    return Manager::table($table);
}

/**
 * @param string $key
 *
 * @return \src\Database\Cache
 */
function cache(string $key = ''):Cache{
    return Cache::getInstance($key);
}