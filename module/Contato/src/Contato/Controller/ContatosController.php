<?php

// namespace de localizacao ContatosController.php
namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContatosController extends AbstractActionController
{

    // GET /contatos
    public function indexAction()
    {
        return array('message' => $this->getFlashMessenger());
    }

    // GET /contatos/novo
    public function novoAction()
    {
        return array('message' => $this->getFlashMessenger());
    }

    // POST /contatos/adicionar
    public function adicionarAction()
    {
        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model

                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato criado com sucesso");

                // redirecionar para action index no controller contatos
                return $this->redirect()->toRoute('contatos');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar contato");

                // redirecionar para action novo no controllers contatos
                return $this->redirect()->toRoute('contatos', array('action' => 'novo'));
            }
        }
    }

    // GET /contatos/detalhes/id
    public function detalhesAction()
    {
    }

    // GET /contatos/editar/id
    public function editarAction()
    {
    }

    // PUT /contatos/editar/id
    public function atualizarAction()
    {
    }

    // DELETE /contatos/deletar/id
    public function deletarAction()
    {
    }
    
    // Filter Flash Messenger
    private function getFlashMessenger()
    {
        $messenger = array();
        $flashMessenger = $this->flashMessenger();

        if ($flashMessenger->hasSuccessMessages()){
            $arr = array_shift($flashMessenger->getSuccessMessages());
            $messenger['alert-success'] = $arr;
        }

        if ($flashMessenger->hasErrorMessages()){
            $arr = array_shift($flashMessenger->getErrorMessages());
            $messenger['alert-error'] = $arr;        
        }
        
        return $messenger;
    }    
}