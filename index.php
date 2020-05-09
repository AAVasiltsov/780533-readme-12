<?php
require_once('helpers.php');

$user_name = 'Alexadnr'; // укажите здесь ваше имя
$posts =
[
    [
        'type' => 'post-quote',
        'title' => 'Цитата',
        'description' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'userName' => 'Лариса',
        'avatarImg' => 'userpic-larisa-small.jpg',
    ],
    [
        'type' => 'post-text',
        'title' => 'Игра престолов',
        'description' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'userName' => 'Владик',
        'avatarImg' => 'userpic.jpg',
    ],
    [
        'type' => 'post-photo',
        'title' => 'Наконец, обработал фотки!',
        'description' => 'rock-medium.jpg',
        'userName' => 'Виктор',
        'avatarImg' => 'userpic-mark.jpg',
    ],
    [
        'type' => 'post-photo',
        'title' => 'Моя мечта',
        'description' => 'coast-medium.jpg',
        'userName' => 'Лариса',
        'avatarImg' => 'userpic-larisa-small.jpg',
    ],
    [
        'type' => 'post-link',
        'title' => 'Лучшие курсы',
        'description' => 'www.htmlacademy.ru',
        'userName' => 'Владик',
        'avatarImg' => 'userpic.jpg',
    ],
];
function cutDescription($str, $maxLength = 300)
{
    if (mb_strlen($str) > $maxLength) {
        $delimiter  = ' ';
        $ellipsis = '...';
        $linkMore = '<a class="post-text__more-link" href="#">Читать далее</a>';
        $arrayWords = explode($delimiter, $str);
        $length = 0;
        $resultArray = [];
        foreach ($arrayWords as $words) {
            $length += mb_strlen($words);
            $resultArray[] = $words;
            if ($length > $maxLength) {
                break;
            }
        }
        $resultStr = implode($delimiter, $resultArray) . $ellipsis . $linkMore;
        return "<p>{$resultStr}</p>";
    }
    return "<p>{$str}</p>";
}

$pageMain = include_template('main.php', ['posts' => $posts]);

$pageLayout = include_template('layout.php', ['content' => $pageMain, 'title' => $user_name]);

print($pageLayout);
?>

