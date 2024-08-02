<?php

namespace App\Traits;

use Doctrine\ORM\Mapping\Column;

trait HasTimeStamps {

    #[Column(name: 'created_at')]
    protected \DateTime $createdAt;

    #[Column(name: 'updated_at')]
    protected \DateTime $updatedAt;


    public function getCreatedAt(): \DateTime {

        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self {

        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdateAt(): \DateTime {

        return $this->createdAt;
    }

    public function setUpdateAt(\DateTime $updatedAt): self {

        $this->updatedAt = $updatedAt;
        return $this;
    }
}