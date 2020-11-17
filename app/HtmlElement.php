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
        return $this->isVoid()
            ? $this->open()
            : $this->open().$this->content().$this->close();

    }

    public function open(): string
    {
        return '<' . $this->name . $this->attributes() . '>';
    }

    public function attributes(): string
    {   
        return array_reduce(
            array_keys($this->attributes),
            fn($result, $attribute) => $result . $this->renderAttributes($attribute),
            ''
        );

    }

    protected function renderAttributes($attribute)
    {
        return is_numeric($attribute)
            ? ' ' . $this->attributes[$attribute]
            : ' ' . $attribute . '="' . htmlentities($this->attributes[$attribute], ENT_QUOTES, 'UTF-8') . '"';
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