<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('presence-online-users', function ($user) {
    return $user; // Xác thực người dùng
});

Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('lich-su-thue-channel', function ($user) {
    return true; // Điều kiện truy cập kênh, ví dụ: kiểm tra người dùng
});

Broadcast::channel('chat.{phong_chat_id}', function ($user, $phong_chat_id) {
    return $user->isInChat($phong_chat_id); // Kiểm tra nếu user thuộc phòng chat
});

Broadcast::channel('tin-nhan-moi-channel', function ($user) {
    return true; // Điều kiện truy cập kênh, ví dụ: kiểm tra người dùng
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('lichSuThues', function () {
    return true;
});
