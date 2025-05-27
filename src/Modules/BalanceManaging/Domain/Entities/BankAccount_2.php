<?php

namespace z411392\PhpQuiz\Modules\BalanceManaging\Domain\Entities;

// use z411392\PhpQuiz\Modules\BalanceManaging\Exceptions\AccountNotFound;
use z411392\PhpQuiz\Modules\BalanceManaging\Exceptions\InsufficientBalance;
use Throwable;

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

// 寫成 Activated Record
class BankAccount_2
{
    protected int $id;
    protected string $balance;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function deposit(string $amount)
    {
        try {
            /**
             * select `balance` from `balances` where `id` = :accountId for update;
             */
            // if (is_null($balance)) throw new AccountNotFound();
            $newBalance = bcadd($this->balance, $amount);
            /**
             * update `balances` set `balance` = :newBalance where `id` = :accountId;
             */
            $this->balance = $newBalance;
            // 寫入日誌
            // commit
        } catch (Throwable $thrown) {
            // 寫入日誌
            // rollback
            throw $thrown;
        }
    }

    public function withdraw(string $amount)
    {
        try {
            /**
             * select `balance` from `balances` where `id` = :accountId for update;
             */
            // if (is_null($balance)) throw new AccountNotFound();
            if (bccomp($this->balance, $amount) < 0) throw new InsufficientBalance();
            $newBalance = bcsub($this->balance, $amount);
            /**
             * update `balances` set `balance` = :newBalance where `id` = :accountId;
             */
            $this->balance = $newBalance;
            // 寫入日誌
            // commit
        } catch (Throwable $thrown) {
            // 寫入日誌
            // rollback
            throw $thrown;
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }
}
