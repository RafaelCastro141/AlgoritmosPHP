<?php
    class Algoritmo{
        public static $dp;
        public static $sa, $sb, $n, $m;
        
        public static function LCS($s1, $s2){//o algoritmo recebe duas STRINGS e retorna a maior sequência comum entra elas, em tempo O(n * m) onde n é o comprimento da primeira string, e m o comprimento da segunda.
        
            Algoritmo::$sa = str_split($s1);
            Algoritmo::$sb = str_split($s2);
            Algoritmo::$n = strlen($s1);
            Algoritmo::$m = strlen($s2);
            
            Algoritmo::initDp();
            
            return Algoritmo::solve(0, 0);
        }
        
        private static function initDp(){
            $arr = array();
            
            for($i = 0 ; $i < Algoritmo::$m ; $i++){
                $arr[$i] = -1;
            }
            
            for($i = 0 ; $i < Algoritmo::$n ; $i++){
                Algoritmo::$dp[$i] = $arr;
            }
        }
        
        private static function solve($i, $j){
            
            if($i == Algoritmo::$n){
                return 0;
            }
            
            if($j == Algoritmo::$m){
                return 0;
            }

            $ans = &Algoritmo::$dp[$i][$j];
            
            if($ans != -1){
                return $ans;
            }
            
            if(Algoritmo::$sa[$i] == Algoritmo::$sb[$j]){
                return $ans = 1 + Algoritmo::solve($i + 1, $j + 1);
            }else{
                return $ans = max(Algoritmo::solve($i + 1, $j), Algoritmo::solve($i, $j + 1));
            }
        }
    }
?>

