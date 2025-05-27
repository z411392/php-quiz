<?php

namespace z411392\PhpQuiz\Modules\BalanceManaging\Domain\Entities;

/**
 * 
 * | id | balance |
 * |----|---------|
 * | 1  | 5000.00 |
 * | 2  | 3200.50 |
 * | 3  | 0.00    |
 * | 4  | 150.75  |
 * | 5  | 105     |
 * 
*/

// 寫成 Domain Model
class BankAccount_1
{
    protected int $id;
    protected string $balance;

    public function __construct(int $id, string $balance)
    {
        $this->id = $id;
        $this->balance = $balance;
    }

    public function deposit(string $amount) {
        $this->balance = bcadd($this->balance, $amount);
    }

    public function withdraw(string $amount) {
        $this->balance = bcsub($this->balance, $amount);
    }

    public function getBalance() {
        return $this->balance;
    }
}
