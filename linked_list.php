<?php
class Node {

  public $data = NULL;
  public $next = NULL;

  public function __construct (string $data = NULL) {
    $this->data = $data;
  }
}

class LinkedList {
  private $firstNode = NULL;
  private $totalNodes = 0;

  public function insert (string $data = NULL) {
    $newNode = new Node($data);
    if($this->firstNode === NULL) {
      $this->firstNode = $newNode;
    } else {
      $currentNode = $this->firstNode;
      while ($currentNode->next != NULL ) {
        $currentNode=$currentNode->next;
      }
      $currentNode->next = $newNode;
    }
    $this->totalNodes++;
    return TRUE;
  }

  public function insertAtFirst (string $data= NULL) {
    $newNode = new Node($data);
    if ($this->firstNode===NULL) {
        $this->firstNode = &$newNode;
    } else {
      $currentNode =$this->firstNode;
      $this->firstNode= &$newNode;
      $this->firstNode->next= $currentNode;
    }
    $this->totalNodes++;
    return true;
  }


  public function display (){
    echo "Total: " . $this->totalNodes . " \n";
    $currentNode = $this->firstNode;
    while  ($currentNode !== NULL ) {
      echo $currentNode->data . ". \n";
      $currentNode = $currentNode->next;
    }
  }
}




$radioheadAlbums= new LinkedList;
$radioheadAlbums->insert("The bends");
$radioheadAlbums->insert("OK Computer");
$radioheadAlbums->insert("Kid A");
$radioheadAlbums->insert("Amnesiac");
$radioheadAlbums->insertAtFirst("Pablo Honey");
$radioheadAlbums->insertAtFirst("On a friday");
$radioheadAlbums->display();





 ?>
