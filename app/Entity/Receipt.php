<?php

declare(strict_types = 1);

namespace App\Entity;

use App\Traits\HasTimeStamps;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('receipts')]
class Receipt {

    use HasTimeStamps;

    #[Id, Column(options: ['unsigned' => true]), GeneratedValue]
    private int $id;

    #[Column(name: 'file_name')]
    private string $fileName;

    #[ManyToOne(inversedBy: 'receipts')]
    private Transaction $transaction;

    public function getId(): int {

        return $this->id;
    }

    public function getFileName(): string {

        return $this->fileName;
    }

    public function setFileName(string $fileName): self {

        $this->fileName = $fileName;
        return $this;
    }

    public function getTransaction(): Transaction {

        return $this->transaction;
    }

    public function setTransaction(Transaction $transaction): self {

        $transaction->addReceipt($this);

        $this->transaction = $transaction;
        return $this;
    }
}