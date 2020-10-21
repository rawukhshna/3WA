<?php

namespace Twitter\Controller;

use Exception;
use Twitter\Database\Connection;
use Twitter\Exception\MissingTweetIdException;
use Twitter\Http\Request;
use Twitter\Http\Response;
use Twitter\Model\TweetModel;
use Twitter\View\Renderer;

class TweetController
{
    protected Request $request;
    protected Renderer $renderer;
    protected TweetModel $model;

    public function __construct(Request $request, Renderer $renderer, TweetModel $model)
    {
        $this->request = $request;
        $this->renderer = $renderer;
        $this->model = $model;
    }
    public function createTweet(): Response
    {
        if ($this->request->isMethod('POST')) {


            $this->model->save('Lior', $this->request->get('content'));

            $response = new Response();
            $response->setHeader('Location', '/');
            $response->setStatusCode(302);

            return $response;
        }
        $html = $this->renderer->Display('home');
        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent($html);

        return $response;
    }

    public function deleteTweet(): Response
    {
        $id = $this->request->get('tweet_id');

        if ($id === null) {
            throw new MissingTweetIdException("Vous devez fournir l'identifiant du tweet à supprimer pour poursuivre la requête.");
        }

        $this->model->delete($id);

        $response = new Response;
        $response->setStatusCode(302);
        $response->setHeader('Location', '/');

        return $response;
    }
}
