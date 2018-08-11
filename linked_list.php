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

  public function insertBefore(string $data= NULL, string $query= NULL) {
    $newNode = new Node($data);

    if ($this->firstNode) {
        $previous= NULL;
        $currentNode=$this->firstNode;

        while ($currentNode != NULL) {
          if ($currentNode->data === $query) {
              $newNode->next = $currentNode;
              $previous->next = $newNode;
              $this->totalNodes++;
              break;
          }
          $previous= $currentNode;
          $currentNode=$currentNode->next;
          }
      }
  }

  public function insertAfter(string $data= NULL, string $query= NULL) {
    $newNode = new Node($data);

    if ($this->firstNode) {
      $nextNode= NULL;
      $currentNode=$this->firstNode;
      while ($currentNode!= NULL) {
        if ($currentNode->data === $query) {
            if($nextNode !== NULL) {
              $newNode->next=$nextNode;
            }
              $currentNode->next = $newNode;
              $this->totalNodes++;
              break;
        }
        $currentNode=$currentNode->next;
        $nextNode=$currentNode->next;
    }

  }

}
  public function search (string $data= NULL) {
    if ($this->totalNodes) {
        $currentNode= $this->firstNode;
        while($currentNode != NULL) {
          if ($currentNode->data ===$data) {
            return $currentNode;
          }
          $currentNode=$currentNode->next;
        }

    }
      return false;
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
$radioheadAlbums->search("Pablo Honey");
$radioheadAlbums->insertBefore("King of Limbs", "Amnesiac");
$radioheadAlbums->insertAfter("In rainbows", "Kid A");
print_r($radioheadAlbums->display());




 ?>
