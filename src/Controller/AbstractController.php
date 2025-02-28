<?php

namespace App\Controller;

abstract class AbstractController {
    /**
     * Рендеринг шаблона.
     *
     * @param string $template Имя шаблона (без расширения .php)
     * @param array $data Данные для передачи в шаблон
     */
    protected function render(string $template, array $data = []): void {
        // Извлекаем переменные из массива $data
        extract($data);

        // Подключаем шаблон
        require __DIR__ . '/../../../templates/' . $template . '.php';
    }
}