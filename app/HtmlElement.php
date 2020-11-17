<?php

namespace App;

class HtmlElement
{
    private $name;
    private $content;
    private $attributes;

    public function __construct(string $name, array $attributes = [], $content = null)
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->content = $content;
    }

    public function render()
    {
        $result = $this->open();

        if ($this->isVoid()) {

            return $result;
        }

        $result .= $this->content();

        $result .= $this->close();

        return $result;
    }

    public function open(): string 
    {

        if (!empty($this->attributes)) {

            $htmlAttributes = '';

            foreach ($this->attributes as $attribute => $value) {

                if (is_numeric($attribute)) {

                    $htmlAttributes .= ' ' . $value;
                } else {

                    $htmlAttributes .= ' ' . $attribute . '="' . htmlentities($value, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
            // Abrir etiqueta con atributo

            $result = '<' . $this->name . $htmlAttributes . '>';
        } else {


            //Abrir etiqueta sin atributos

            $result = '<' . $this->name . '>';
        }

        return $result;
    }

    
    public function isVoid(): bool
    {
        return in_array($this->name, ['br', 'hr', 'img', 'img', 'input']);
    }
    
    public function content(): string
    {
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }

    public function close(): string
    {
        return '</' . $this->name . '>';
    }
}
