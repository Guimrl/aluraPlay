<?php

declare(strict_types=1);

use src\mvc\Controller\{
    NewVideoController,
    EditVideoController,
    VideoFormController,
    VideoListController,
    DeleteVideoController,
    LoginFormController,
    LoginController
};

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => VideoFormController::class,
    'GET|/editar-video' => VideoFormController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/novo-video' => NewVideoController::class,
    'POST|/editar-video' => EditVideoController::class,
    'POST|/login' => LoginController::class,
];
