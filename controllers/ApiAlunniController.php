<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class ApiAlunniController {

        function index(Request $request, Response $response, $args) {
            $classroom = new classe();
            $response->getBody()->write(json_encode($classroom));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }

        function show(Request $request, Response $response, $args) {
            $classroom = new classe();
            
            if($classroom->getApiAlunno($args['nome']) == null) {
                $response->getBody()->write("Alunno non trovato");
                return $response->withHeader("Content-Type", "application/json")->withStatus(404);
            } else {
                $response->getBody()->write(json_encode($classroom->getApiAlunno($args['nome'])));
                return $response->withHeader("Content-Type", "application/json")->withStatus(200);
            }
        }
    }

?>