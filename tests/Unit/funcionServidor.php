<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServidorFunctionTest extends TestCase
{
    /**
     * Verifica que la aplicación devuelve una respuesta exitosa en la ruta principal.
     *
     * @return void
     */
    public function test_application_returns_successful_response():void
    {
        // Enviar una solicitud GET a la ruta principal
        $response = $this->get('/');

        // Verificar que la respuesta tiene un estado 200
        $response->assertStatus(200);
    }
}
