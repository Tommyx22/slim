<?php
    class classe implements JsonSerializable{

        private $arrayAlunni = array();

        function classe() {
    
            $this->arrayAlunni = array(
                new Alunno("davide", "xie", 21),
                new Alunno("tommaso", "lanini", 19),
                new Alunno("vincenzo", "langone", 20)
            );
        }

        function getAlunno($nome) {
            
            $string = "";

            foreach($this->arrayAlunni as $e) {
                if($e->getNome() == $nome) {
                    $string = $e->toString();
                }
            }

            if($string == "") {
                return "Alunno non trovato";
            }

            return $string;
        }

        function getApiAlunno($nome) {

            $alunno = null;

            foreach($this->arrayAlunni as $e) {
                if($e->getNome() == $nome) {
                    $alunno = $e;
                    break;
                }
            }
            return $alunno;
        }

        function jsonSerialize() {

            $element = [
                "alunni"=>$this->arrayAlunni
            ];

            return $element;

        }

        function toString() {

            $string = "";

            foreach($this->arrayAlunni as $e) {
                $string = $string . $e->toString();
            }
            return $string;
        }

    }
?>