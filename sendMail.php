<?php
$subject = 'PRACTICE 1';
echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";
$firstName = 'Andrew';
$text1 = "firstName: {$firstName}" . "\n";
$text2 = "lastName: Dybko" . "\n";
$text3 = "group: 539a" . "\n";
$message = $text1 . $text2 . $text3;
echo $message;
$headers = 'From: student.539a.SMTP@gmail.com';
mail('dybkoandrej@gmail.com', $subject, $message, $headers);
?>
