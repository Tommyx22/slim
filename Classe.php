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

        function findByName($nome) {

            $alunno = null;

            foreach($this->arrayAlunni as $e) {
                if($nome == $e->getNome()) {
                    $alunno = new Alunno($e->getNome(),$e->getCognome(),$e->getEta());
                    break;
                }
            }
            
            return $alunno;
        }

        function eliminaAlunno($alunno) {
            $key = array_search($alunno, $this->arrayAlunni);
            if($key != false) {
                unset($this->arrayAlunni[$key]);
                return true;
            }
            return false;
        }

        function addAlunno($alunno) {
            array_push($this->arrayAlunni, $alunno);
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