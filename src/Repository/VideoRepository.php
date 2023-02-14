<?php

declare(strict_types=1);

namespace src\mvc\Repository;

use src\mvc\Entity\Video;

class VideoRepository
{
    public function __construct(private \PDO $pdo)
    {
        
    }

    public function add(Video $video): Video
    {
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $video->url);
        $stmt->bindValue(2, $video->title);

        $stmt->execute();
        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));
        
        return $video;
    }
}
