<?php

use src\mvc\Entity\Video;
use src\mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header('Location: /?sucesso=0');
    exit();
}
$title = filter_input(INPUT_POST, 'title');
if ($title === false) {
    header('Location: /?sucesso=0');
    exit();
}

$repository = new VideoRepository($pdo);

if ($repository->add(new Video($url, $title)) === false) {
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}

