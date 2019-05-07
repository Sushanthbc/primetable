<?php
class Solution {

    function __construct() {
        // We can initialize $numbersNeeded which is used for creating matrix of n prime numbers,
        // Not needed now for sake of requirement/simplicity.
    }
    
    /**
     * isPrime Method determines whether a given number is prime
     * @param int - number to verify
     * @return bool | integer
     */
    function isPrime($number){
        for ($i = 2; $i < $number; $i++) {  
            if ($number % $i == 0) {  
                return FALSE; // Not a prime number if it is divisible by any other number.
            }
        }
        return $number; // return the prime number
    }

    /**
     * getPrimeNumbers Method provides array of n prime numbers
     * @param int - Required size of the prime number array
     * @return array - array of n prime numbers
     */
    function getPrimeNumbers($countUpto = 10) {
        $primeNumbers = [];
        $number = 2;
        for ($count = 0; $count < $countUpto; ) {
            if ($this->isPrime($number)) {
                $primeNumbers[] = $this->isPrime($number);
                $count++;
            }
            $number++;
        }
        return $primeNumbers;
    }
        
    /**
     * drawTable Method creates table like(matrix) structure depending on the values provided
     * @param - array - used to draw table
     */
    function drawTable($rowValue) {
        $colValue = $rowValue;
        $rowNumbers = count($rowValue);
        $colNumbers = count($colValue);
        echo "<table border =\"0\" style='border-collapse: collapse; border-spacing: 5px;'>";
        echo "<tr style='border-bottom:1px dotted black;'> \n";
        echo "<td> &nbsp; &nbsp;|</td>";
        foreach ($rowValue as $value) {
            echo "<td style='padding: 7px; text-align:right'>". $value ."</td>";
        }
        echo "</tr>";
        
        $colSpan = $colNumbers+1;
        echo "<tr><td colspan='". $colSpan ."'>";
            echo "<table border =\"0\" style='border-collapse: collapse;'>";
            for ($row=0; $row < $rowNumbers; $row++) {
                echo "<tr> \n";
                for ($col=0; $col < $colNumbers; $col++) {
                    if ($col==0) {
                        echo "<td>$rowValue[$row] | </td> \n";
                    }
                    $product = $rowValue[$row] * $colValue[$col];
                    echo "<td style='padding: 7px; text-align:right'>$product</td> \n";
                }
                echo "</tr>";
            }
            echo "</table>";        
        echo "</td></tr>";
        echo "</table>";
    }
}


$sol = new solution();

// Please change this number to get desired number of elements in the matrix
$numbersNeeded = 15; 

// Prepare array of prime numbers with desired length
$primeNumberList  = $sol->getPrimeNumbers($numbersNeeded);

// Create table/matrix of desired length
$sol->drawTable($primeNumberList);
