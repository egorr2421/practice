<?php
class Email
{
    private $message = "My firt message!<br>Hy<br><h1>lolka</h1>";
    private $to = "egorr2421@gmail.com";
    private $from =  "yehor.ustymenko@gmail.com";
    private $subject = "Тема сообщения";
    private $headers;

    public function __construct()
    {
        $this->headers="From: {$this->from}\r\nReply-to: {$this->from}\r\nContent-type:text/html; charset=utf-8\r\n";
    }

    public function sendMessage(){
        mail ($this->to,$this->subject,$this->message,$this->headers);
}

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }



}