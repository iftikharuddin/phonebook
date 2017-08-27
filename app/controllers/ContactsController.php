<?php

class ContactsController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->title = "Contacts";
    	$this->view->contacts = Contacts::find();
    }

    // Generate form for New record
    public function newAction()
    {
    }

    // Create New record
    public function createAction()
    {
    	$contact = new Contacts();
    	$contact->name = $this->request->getPost('name');
    	$contact->email = $this->request->getPost('email');
    	$contact->phone = $this->request->getPost('phone');
    	$success = $contact->save();

    	if($success){
    		$this->flash->success('Contact successfuly created');
    		$this->dispatcher->forward(['action'=>'index']);
    	}else{
    		$this->flash->error('Following errors occured:');
    		foreach ($contact->getMessages() as $msg) {
    			$this->flash->error($msg);
    		}
    		$this->dispatcher->forward(['action'=>'new']);
    	}
    }

    // Generate Edit Form
    public function editAction($id)
    {
    	$contact = Contacts::findFirst($id);
    	if(!$contact){
    		$this->dispatcher->forward(['action'=>'index']);
    	}else{
    		$this->tag->displayTo("id", $contact->id);
    		$this->tag->displayTo("name", $contact->name);
    		$this->tag->displayTo("email", $contact->email);
    		$this->tag->displayTo("phone", $contact->phone);
    	}
    }
  

    // Update a Record
    public function updateAction()
    {
    	if(!$this->request->isPost()){
    		$this->flash->error("Invalid request");
    		$this->dispatcher->forward(['action'=>'index']);
    	}else{
    		$id = $this->request->getPost('id');
    		$contact = Contacts::findFirst($id);
    		if(!$contact){
    			$this->flash->error('No record found!');
    			$this->dispatcher->forward(['action'=>'index']);
    		}else{
    			$contact = new Contacts();
		    	$contact->name = $this->request->getPost('name');
		    	$contact->email = $this->request->getPost('email');
		    	$contact->phone = $this->request->getPost('phone');
		    	$success = $contact->save();

		    	if($success){
		    		$this->flash->success('Contact successfuly Updated');
		    		$this->dispatcher->forward(['action'=>'index']);
		    	}else{
		    		$this->flash->error('Following errors occured:');
		    		foreach ($contact->getMessages() as $msg) {
		    			$this->flash->error($msg);
		    		}
		    		$this->dispatcher->forward(array(
		    				"action" => "edit",
		    				"params" => array($contact->id)
		    		));
		    	}
    		}
    	}
    }

    // To delete a Record
    public function deleteAction($id)
    {
    	$contact = Contacts::findFirst($id);
    	if(!$contact){
    		$this->flash->error('This doesnt exist baby');
    	}else{
    		if(!$contact->delete()){
    			foreach ($contact->getMessages() as $msg) {
    				$this->flash->error($msg);
    			}
    		}else{
    			$this->flash->error('Deleted successfuly');
    		}
    	}

    	$this->dispatcher->forward(['action'=>'index']);
    }

}

