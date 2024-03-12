<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class AlunniController {

        function index(Request $request, Response $response, $args) {
            $classroom = new classe();
            $response->getBody()->write($classroom->toString());
            return $response;
        }

        function show(Request $request, Response $response, $args) {
            $classroom = new classe();
            $response->getBody()->write($classroom->getAlunno($args['nome']));
            return $response;
        }
    }

    function createAlunni(Request $request, Response $response, $args) {
        $classroom = new classe();

        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body, true);

        $nome = $parseBody['nome'];
        $cognome = $parseBody['cognome'];
        $eta = $parseBody['eta'];

        $alunno = new Alunno($nome, $cognome, $eta);

        $classroom->addAlunno($alunno);

        return $response->withStatus(201);
    }

    function updateAlunni(Request $request, Response $response, $args) {
        
        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body,true);
        $classroom = new classe();
        $alunno = $classroom->findByName($args["nome"]);

        if($alunno != null) {
            $alunno->setNome($parseBody["nome"]);
            $alunno->setCognome($parseBody["cognome"]);
            $alunno->setEta($parseBody["eta"]);
            return $response->withStatus(200);
        } else {
            return $response->withStatus(404);
        }
    }

    function deleteAlunni(Request $request, Response $response, $args) {
        
        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body,true);
        $classroom = new classe();
        $alunno = $classroom->findByName($args["nome"]);

        if($alunno != null) {
            if($classroom->eliminaAlunno($alunno) == true) {
                return $response->withStatus(200);
            } else{
                return $response->withStatus(402);
            }
            
        } else {
            return $response->withStatus(404);
        }
    }
?>