<?php

ob_start("ob_gzhandler");
define('PATH', dirname(__DIR__));
session_start();

const FRAMEWORK_CRYPTO_KEY = '123123';
const FRAMEWORK_CRYPTO_CIPHER = 'AES-128-ECB';
const FRAMEWORK_BASE_URL = 'http://localhost:3000';
const FRAMEWORK_CSRF = true;
const FRAMEWORK_DATABASE_HOST = '89.252.182.3';
const FRAMEWORK_DATABASE_NAME = 'eskizpsd_framework';
const FRAMEWORK_DATABASE_USER = 'eskizpsd_framework';
const FRAMEWORK_DATABASE_PASS = '&{sP]Ty{=Ke@';