<?php
// contactForm/send.php

// フォームからの値を取得
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// 送信先のメールアドレス（自分のアドレスに変更してください）
$to = 'yuki.freelife@gmail.com';
$subject = 'お問い合わせフォームからのメッセージ';
$body = "お名前：{$name}\nメールアドレス：{$email}\n\n【お問い合わせ内容】\n{$message}";

// 送信処理（日本語メールのために mb_send_mail を使用）
mb_language('Japanese');
mb_internal_encoding('UTF-8');

if (mb_send_mail($to, $subject, $body, "From: {$email}")) {
    echo "送信が完了しました。ありがとうございます！";
} else {
    echo "送信に失敗しました。時間をおいて再度お試しください。";
}
?>