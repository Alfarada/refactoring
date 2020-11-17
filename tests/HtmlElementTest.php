<?php

namespace Tests;

use App\HtmlElement;

class HtmlElementTest extends TestCase
{   
    /** @test */
    function it_checks_if_a_elememt_is_void_or_not()
    {
        $this->assertFalse((new HtmlElement('p'))->isVoid());

        $this->assertTrue((new HtmlElement('img'))->isVoid());
    }

    /** @test */
    function it_generates_a_paragraph_with_content()
    {
        $element = new HtmlElement('p', [], 'Este es el contenido de la etiqueta');

        $this->assertSame(
            '<p>Este es el contenido de la etiqueta</p>',
            $element->render()
        );
    }

    /** @test */
    function it_generates_a_paragraph_with_attribute()
    {
        $element = new HtmlElement('p', ['id' => 'my_paragraph'], 'Este es el contenido de la etiqueta');

        $this->assertSame(
            '<p id="my_paragraph">Este es el contenido de la etiqueta</p>',
            $element->render()
        );
    }

    /** @test */
    function it_generates_a_paragraph_with_multiple_attribute()
    {
        $element = new HtmlElement(
            'p',
            ['id' => 'my_paragraph', 'class' => 'paragraph'],
            'Este es el contenido de la etiqueta'
        );

        $this->assertSame(
            '<p id="my_paragraph" class="paragraph">Este es el contenido de la etiqueta</p>',
            $element->render());
    }

    /** @test */
    function it_generate_elements_with_boolean_attribute()
    {
        $element = new HtmlElement('input', ['required']);

        $this->assertSame(
            '<input required>',
            $element->render());
    }
    
}
