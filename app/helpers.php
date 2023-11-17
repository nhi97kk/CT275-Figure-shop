<?php

if (!function_exists('http_accept_json')) {
    function http_accept_json()
    {
        return isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/json') !== false);
    }
}

if (!function_exists('redirect')) {
    // Chuyển hướng đến một trang khác
    function redirect($location, array $data = [])
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        header('Location: ' . $location, true, 302);
        exit();
    }
}

if (!function_exists('session_get_once')) {
    // Đọc và xóa một biến trong $_SESSION
    function session_get_once($name, $default = null)
    {
        $value = $default;
        if (isset($_SESSION[$name])) {
            $value = $_SESSION[$name];
            unset($_SESSION[$name]);
        }
        return $value;
    }
}

function handle_photo_upload(): bool | string
{
    if (!isset($_FILES['photo'])) {
        return false;
    }

    $photo = $_FILES['photo'];
    $photo_name = $photo['name'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_size = $photo['size'];
    $photo_error = $photo['error'];

    if ($photo_error !== 0 || $photo_size > 10000000) {
        return false;
    }

    $photo_new_name = uniqid() . '_' . $photo_name;
    $photo_destination = __DIR__ . '/../public/uploads/' . $photo_new_name;
    if (move_uploaded_file($photo_tmp_name, $photo_destination)) {
        return $photo_new_name;
    }
    return false;
}

function remove_photo_file(string $filename): bool
{
    $photo_path = __DIR__ . '/../public/uploads/' . $filename;
    if (file_exists($photo_path)) {
        return unlink($photo_path);
    }
    return false;
}

function html_escape(string|null $text): string
{
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8', false);
}