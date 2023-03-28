<?php

class UserModel{
        private $id = 0;
        private $name = "";
        private $linkedinURL = "";
        private $githubURL = "";

        public function __construct()
        {
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of linkedinURL
         */ 
        public function getLinkedinURL()
        {
                return $this->linkedinURL;
        }

        /**
         * Set the value of linkedinURL
         *
         * @return  self
         */ 
        public function setLinkedinURL($linkedinURL)
        {
                $this->linkedinURL = $linkedinURL;

                return $this;
        }

        /**
         * Get the value of githubURL
         */ 
        public function getGithubURL()
        {
                return $this->githubURL;
        }

        /**
         * Set the value of githubURL
         *
         * @return  self
         */ 
        public function setGithubURL($githubURL)
        {
                $this->githubURL = $githubURL;

                return $this;
        }
    }