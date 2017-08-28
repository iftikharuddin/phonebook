<?php

class ApiController extends ControllerBase
{

    public function indexAction()
    {
    	
    }

    // Get all contacts
    public function contactsAction(){
    	$contacts = Contacts::find();
    	return json_encode($contacts);
    }

    // Get a Contact
    public function contactAction($id){
    	$contact = Contacts::find($id);
    	return json_encode($contact);
    }

    // Delete a Contact
    public function deleteContactAction($id){
    	$contact = Contacts::find($id);
    	$contact->delete();
    }



}

