<?php
$emails = [
    'a@b.c',
    'some.one@wherever.org',
    '@domain.com',
    'user1@localhost',
    'admin.at.yahoo.com',
    'domain.com@user',
    '.name@domain.biz',
    'name.@domain.biz',
    'user.name@company.gov',
    'UPPER@CASE.es'
];

$pattern = '/^[a-z0-9][a-z0-9.\-+_!%]*(?<!\.)@[a-z0-9-]+(?:\.[a-z]{2,})?$/i';
foreach ( $emails as $email ) {
    echo "$email    ";
    echo preg_match($pattern, $email) ? 'OK' : 'KO';
    echo "\n";
}