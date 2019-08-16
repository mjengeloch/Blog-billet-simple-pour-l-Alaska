<?php
namespace App\Backend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ChaptersFormBuilder;
use \OCFram\FormHandler;

class HomeController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');
    
    $this->managers->getManagerOf('Chapters')->delete($chaptersId);
    $this->managers->getManagerOf('Comments')->deleteFromChapters($chaptersId);

    $this->app->user()->setFlash('La chapters a bien été supprimée !');

    $this->app->httpResponse()->redirect('.');
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
    
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
    
    $this->app->httpResponse()->redirect('.');
  }

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des chapters');

    $manager = $this->managers->getManagerOf('Chapters');

    $this->page->addVar('listeChapters', $manager->getList());
    $this->page->addVar('numberChapters', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'une chapters');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une chapters');
  }

  public function executeUpdateComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Modification d\'un commentaire');

    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'chapterNumber' => $request->postData('chapterNumber'),
        'content' => $request->postData('content')
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');

      $this->app->httpResponse()->redirect('/admin/');
    }

    $this->page->addVar('form', $form->createView());
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $chapters = new Chapters([
        'chapterNumber' => $request->postData('chapterNumber'),
        'title' => $request->postData('title'),
        'content' => $request->postData('content')
      ]);

      if ($request->getExists('id'))
      {
        $chapters->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la chapters est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $chapters = $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id'));
      }
      else
      {
        $chapters = new Chapters;
      }
    }

    $formBuilder = new ChaptersFormBuilder($chapters);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Chapters'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash($chapters->isNew() ? 'La chapters a bien été ajoutée !' : 'La chapters a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/admin/');
    }

    $this->page->addVar('form', $form->createView());
  }
}