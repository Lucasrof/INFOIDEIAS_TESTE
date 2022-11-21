<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano)
    {
        $anoString = (string)$ano;

        if ($ano < 100) {
            $seculo = substr($anoString, 0, 1);
            return 1;
        } else if ($ano < 1000) {
            $seculo = substr($anoString, 0, 1);
        } else {
            $seculo = substr($anoString, 0, 2);
        }

        if (is_int($ano / 100)) {
            return intval($seculo);
        } else {
            return intval($seculo) + 1;
        }

        return intval($seculo);
    }



    /*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero)
    {
        $primos = [];

        for ($i = 2; $i < $numero; $i++) {
            if ($this->verificaPrimo($i)) {
                array_push($primos, $i);
            }
        }

        $last = array_pop($primos);

        return intval($last);
    }


    function verificaPrimo($numero)
    {
        if (!is_numeric($numero))
            return false;
        for ($i = 2; $i < $numero; $i++) {
            if (($numero % $i) == 0) {
                return false;
            }
        }
        return true;
    }



    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr)
    {
        $newArray = [];

        foreach($arr as $itens){
            foreach($itens as $item){
                array_push($newArray , $item);
            }
        }
        sort($newArray);

        $segundoMaior = array_slice($newArray, -2, 1);

        return $segundoMaior[0];
    }


    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */

    public function SequenciaCrescente(array $arr)
    {

        //Não consegui concluir a função pois na teoria que segui acabou não dando certo, estava tentando verificar se o array continha números iguais, e se removendo esse segundo número igual ele virava um array crescente
        //e depois se ele encontrava algum número menor na sua sequencia tipo 10 ,20,30,40,2 e se removendo o que estava errado ( no caso o 2 ) ele virava um array crescente, e depois juntei essas duas informações para definir o resultado.  

        $temNumeroIgual = false;
        $numeroIgual = 0;
        $resultado = $this->verificaSeECrescente($arr);

        $ocorrencias = 0;
        $sizeArray = count($arr);

        $crescente = false;
        $igual = false;

        if($resultado == true){
            return true;
        }
        
        foreach($arr as $keyArray => $t){
            foreach($arr as $verifyArray){
            if($verifyArray == $t){
                $temNumeroIgual = true;
                $numeroIgual = $t;
                }
            }

            if($keyArray + 1 < $sizeArray ){
                if($arr[$keyArray + 1] > $t){
                    $arrayAuxiliar1 = $arr;

                    array_splice($arrayAuxiliar1, $keyArray + 1 , 1);
                    $crescente =  $this->verificaSeECrescente($arr);
                }
            }
            
        }

        if($temNumeroIgual == true){
            $index = -1;
            foreach($arr as $key => $t){
                if($t == $numeroIgual ){
                    $index = $key;
                }
                }

        $arrayAuxiliar2 = $arr;

            array_splice($arrayAuxiliar2, $index, 1);
            $igual =  $this->verificaSeECrescente($arr);
        }


        return $igual && $crescente ? true : false;

    }

    function verificaSeECrescente($array){
        $sizeArray = count($array);


     foreach($array as $keyArray => $t){
            if($keyArray + 1 < $sizeArray ){
                if($array[$keyArray + 1] < $t){
                    return false;
                }
            }
            
        }
        return true;
    }
    
}
