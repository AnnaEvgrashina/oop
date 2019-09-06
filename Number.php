<?php

/**
 * Class Number
 * Класс для частотных характеристик символов русского и английского алфавита.
 */
class Number
{
    /**
     * Используется для хранения текста.
     *
     * @var string
     */
    private $text;

    /**
     * Используется для хранения английского алфавита.
     *
     * @var array
     */
    private $enAlph = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
    ];

    /**
     * Используется для хранения русского алфавита.
     *
     * @var array
     */
    private $ruAlph = [
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й',
        'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф',
        'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    ];

    /**
     * Массив для хранения посчитанных английских букв.
     *
     * @var array
     */
    private $enCounter = [];

    /**
     * Массив для хранения посчитанных русских букв.
     *
     * @var array
     */
    private $ruCounter = [];

    /**
     * Number constructor.
     *
     * Создание объекта класса Number, перевод всех букв в нижний регистр и подсчёт букв.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = strtolower($text);
        $this->countingLetters();
    }

    /**
     * Функция для подсчёта букв.
     */
    private function countingLetters()
    {
        foreach ($this->enAlph as $item) {
            preg_match_all('/' . $item . '/', $this->text, $matches);
            if (count($matches[0])) {
                $this->enCounter[$item] = count($matches[0]);
            }
        }
        foreach ($this->ruAlph as $item) {
            preg_match_all('/' . $item . '/', $this->text, $matches);
            if (count($matches[0])) {
                $this->ruCounter[$item] = count($matches[0]);
            }
        }
    }

    /**
     * Фукнкция для вывода букв.
     */
    public function show()
    {
        echo "Английский алфавит\n";
        foreach ($this->enCounter as $key => $value) {
            echo "{$key} - {$value}\n";
        }
        echo "\n\n";
        echo "Русский алфавит\n";
        foreach ($this->ruCounter as $key => $value) {
            echo "{$key} - {$value}\n";
        }
        echo "\n\n";
    }
}