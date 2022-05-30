<?php
   class admin
   {
      private $idA;
      private $nomA;
      private $mdpA;
      
      public function __construct($idA, $nomA, $mdpA)
      {
        $this->idA = $idA;
        $this->nomA = $nomA;
        $this->mdpA = $mdpA;
      }
      
      public function getId()
      {
        return $this->idA;
      }

      public function setNom($nomA)
      {
        $this->nomA = $nomA;
      }

      public function getNom()
      {
        return $this->nomA;
      }

      public function setMdp($mdpA)
      {
        $this->mdpA = $mdpA;
      }
      
      public function getMdp()
      {
        return $this->mdpA;
      }
   }
?>
