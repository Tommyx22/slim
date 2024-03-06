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
?>