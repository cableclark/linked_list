<?php
 require "linked_list.php";

 class CircularLinkedList extends LinkedList {
   public $firstNode= null;
   private $totalNodes= 0;

   public function insert (string $data = null) {

      $newNode = new Node ($data);

      if ($this->firstNode === null) {
          $this->firstNode =&$newNode;

      } else {
          $currentNode = $this->firstNode;
          while ($currentNode->next !== $this->firstNode ) {
                $currentNode == $currentNode->next;
          }
          $currentNode->next= $newNode;
      }
        $newNode->next = $this->firstNode;
        $this->totalNodes++;
        return true;

   }
 }


$newList = new CircularLinkedList();
$newList->insert("Fender");
$newList->insert("Washburn");

print_r($newList->firstNode->next);
