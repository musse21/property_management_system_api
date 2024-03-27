<?php

namespace App\Http\Services\AccountServices\Services;

use App\Models\Account;
use App\Models\Owner\Owner;

trait GetAccounts
{
    public function getAccountName($id)
    {
        $account = Account::query()->where('id', '=', $id)->first();

        if ($account instanceof Account) {
            if ($account->account_type == Account::ACCOUNT_TYPES[0]) {
                $owner = Owner::query()->where('id', '=', $id)->first();
                if ($owner instanceof Owner) {
                    return $owner->name;
                } else {
                    $stuff = Stuff::query()->where('id', '=', $id)->first();
                    if ($stuff instanceof Stuff) {
                        return $stuff->name;
                    }
                }
            }
        }
    }
}
