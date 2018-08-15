<?php
class Node {

  public $data = NULL;
  public $next = NULL;

  public function __construct (string $data = NULL) {
    $this->data = $data;
  }
}

class LinkedList implements Iterator{
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

  public function deleteFirst () {
     if ($this->firstNode !== NULL) {
         if($this->firstNode->next !== NULL) {
           $this->firstNode= $this->firstNode->next;
         } else {
           $this->firstNode = NULL;
         }
         $this->totalNodes--;
         return true;
     }
     return false;
  }

  public function deleteLast() {
          if ($this->firstNode !== NULL) {
              $currentNode = $this->firstNode;
              if ($currentNode->next === NULL) {
                  $this->firstNode = NULL;
              } else {
                  $previousNode = NULL;

                  while ($currentNode->next !== NULL) {
                      $previousNode = $currentNode;
                      $currentNode = $currentNode->next;
                  }

                  $previousNode->next = NULL;
                  $this->totalNodes--;
                  return TRUE;
              }
          }
          return FALSE;
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


 public function delete(string $query = NULL) {
     if ($this->firstNode) {
       $previous = NULL;
       $currentNode=$this->firstNode;
       while ($currentNode !== NULL) {
             if ($currentNode->data === $query) {
                if ($currentNode->next === NULL) {
                    $previous->next = NULL;
                 } else {
                        $previous->next = $currentNode->next;
                 }

                 $this->_totalNode--;
                break;
              }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
        }
     }
  }

  public function reverse() {
        if ($this->firstNode !== NULL) {
            if ($this->firstNode->next !== NULL) {
                $reversedList = NULL;
                $next = NULL;
                $currentNode = $this->firstNode;
                while ($currentNode !== NULL) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->firstNode = $reversedList;
            }
        }
    }
    public function getNthNode(int $n = 0) {
          $count = 1;
          if ($this->firstNode !== NULL) {
              $currentNode = $this->firstNode;
              while ($currentNode !== NULL) {
                  if ($count === $n) {
                      return $currentNode;
                  }
                  $count++;
                  $currentNode = $currentNode->next;
              }
          }
      }

  public function current() {
     return $this->currentNode->data;
   }

  public function next() {
     $this->currentPosition++;
     $this->currentNode = $this->currentNode->next;
   }

  public function key() {
      return $this->_currentPosition;
  }

  public function rewind() {
      $this->currentPosition = 0;
      $this->currentNode = $this->firstNode;
  }

  public function valid() {
      return $this->currentNode !== NULL;
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
$radioheadAlbums->deleteFirst();
$radioheadAlbums->deleteLast();
$radioheadAlbums->delete("On a friday");
$radioheadAlbums->reverse();
echo $radioheadAlbums->getNthNode(4)->data;


foreach ($radioheadAlbums as $title) {
    echo $title . "\n";
}

 ?>
