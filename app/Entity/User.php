<?php

declare(strict_type = 1);

namespace App\Entity;

use App\Traits\HasTimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('users')]
class User {

    use HasTimeStamps;

    #[Id, Column(options: ['unsigned' => true]), GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $email;

    #[Column]
    private string $password;

    #[OneToMany(mappedBy: 'user', targetEntity: Transaction::class)]
    private Collection $transactions;

    #[OneToMany(mappedBy: 'user', targetEntity: Category::class)]
    private Collection $categories;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): int {

        return $this->id;
    }

    public function getName(): string {

        return $this->name;
    }

    public function setName(string $name): self {

        $this->name = $name;
        return $this;
    }

    public function getEmail(): string {

        return $this->email;
    }

    public function setEmail(string $email): self {

        $this->email = $email;
        return $this;
    }

    public function getPassword(): string {

        return $this->password;
    }

    public function setPassword(string $password): self {

        $this->password = $password;
        return $this;
    }

    public function getCategories(): ArrayCollection|Collection {

        return $this->categories;
    }

    public function addCategory(Category $category) :self  {

        $this->categories->add($category);
        return $this;
    }

    public function getTransactions(): ArrayCollection|Collection {

        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction) :self  {

        $this->transactions->add($transaction);
        return $this;
    }
}