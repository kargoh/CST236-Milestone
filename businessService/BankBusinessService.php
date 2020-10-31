<?php

    class BankBusinessService {

        function transaction($transfer) {
/*
            $db = new Database();
            $conn = $db->getConnection();

            $conn->autocommit(FALSE);
            $conn->begin_transaction();

            $checking = new CheckAccountDataService($conn);
            $checkingBalance = $checking->getBalance();
            $okChecking = $checking->updateBalance($checkingbalnce - $transfer);

            $savings = new SavingsAccountDataService($conn);
            $savingsBalance = $savings->getBalance();
            $okSavings = $savings->updateBalance($savingsBalance + $transfer);

            echo "checking: " . $okChecking;
            echo "savigns: " . $okSavigns;

            if ($okChecking && $okSavings && $checkingBalance > 0 && $savingsBalance > 0) {
                echo "comitted";
                $conn->commit();
            } else {
                echo "rollback";
                $conn->rollback();
            }
*/
            
        }

    }

?>