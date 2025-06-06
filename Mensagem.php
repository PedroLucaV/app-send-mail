<?php

class Mensagem{
    private string $destiny;
    private string $title;
    private string $message;

    public function __construct(string $destiny, string $title, string $message){
        $this->destiny = $destiny;
        $this->title = $title;
        $this->message = $message;
    }

    public function getDestiny(): string{
        return $this->destiny;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getEmailData(): string {
        return "Destiny: {$this->destiny} <br>Title: {$this->title} <br> {$this->message}";
    }

    public function mensagemValida(){
        if(empty($this->destiny) || empty($this->title) || empty($this->message)){
            return false;
        }else{
            return true;
        }
    }
}