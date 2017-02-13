<?php

namespace Vistik\Checks;

use Exception;
use Illuminate\Support\Facades\DB;

class DatabaseOnlineHealthCheck extends HealthCheck
{

    public function run(): bool
    {
        try {
            if (DB::connection()->getPdo()) {
                return true;
            }
        } catch (Exception $e) {
            $this->setError($e->getMessage());
        }

        return false;
    }
}
