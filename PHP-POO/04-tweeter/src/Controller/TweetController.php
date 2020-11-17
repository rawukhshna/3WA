<?php

namespace Twitter\Controller;

use Twitter\Exception\MissingTweetIdException;
use Twitter\Http\JsonResponse;
use Twitter\Http\RedirectResponse;
use Twitter\Http\Request;
use Twitter\Http\Response;
use Twitter\Model\Entity\Tweet;
use Twitter\Model\TweetModel;
use Twitter\View\Renderer;

class TweetController
{

  protected Renderer $renderer;
  protected TweetModel $model;

  public function __construct(Renderer $renderer, TweetModel $model)
  {
    $this->renderer = $renderer;
    $this->model = $model;
  }

  public function createTweet(Request $request): Response
  {

    //1. j'arrive sur le formulaire

    if ($request->isMethod('POST')) {


      $tweet = new Tweet('Mika', $request->get('content'));

      $this->model->save($tweet);

      //Enregistrer le tweet en db
      return new RedirectResponse("/");
    }

    // RENDERER
    $tweets = $this->model->findAll();


    if ($request->get('format') === 'json') {
      $tweetsArray = $this->transformTweetsToArray($tweets);

      return new JsonResponse($tweetsArray);
    }

    $html = $this->renderer->display('home', ['tweets' => $tweets]);

    return new Response($html);
  }

  public function deleteTweet(Request $request): Response
  {

    $id = $request->get('tweet_id');

    if ($id === null) {
      throw new MissingTweetIdException("Vous devez préciser l'identifiant du tweet à supprimer (tweet_id).");
    }

    $this->model->delete($id);

    return new RedirectResponse("/");
  }

  protected function transformTweetsToArray(array $tweets): array
  {
    return array_map(fn(Tweet $tweet) => $tweet->transformToArray(), $tweets);
  }
}
