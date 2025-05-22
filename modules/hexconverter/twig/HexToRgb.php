<?php

namespace hexconverter\twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HexToRgb extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('hexToRgb', [$this, 'hexToRgb']),
        ];
    }

    public function hexToRgb(string $hex): string
    {
        // Vorverarbeitung
        $hex = trim($hex);         // entfernt Leerzeichen etc.
        $hex = ltrim($hex, '#');   // entfernt führendes "#"

        // 3-stellige in 6-stellige Notation umwandeln
        if (strlen($hex) === 3) {
            $hex = $hex[0] . $hex[0] .
                $hex[1] . $hex[1] .
                $hex[2] . $hex[2];
        }

        // Nur fortfahren, wenn der HEX-Wert wirklich gültig ist
        if (strlen($hex) !== 6 || !ctype_xdigit($hex)) {
            return 'rgb(97, 165, 128)';
        }

        // Umwandlung in Dezimal
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        return "rgb($r, $g, $b)";
    }
}
