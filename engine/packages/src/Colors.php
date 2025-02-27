<?php

/**
 * Class Colors
 *
 * Colored CLI Output
 *
 * @author JR
 * @see https://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
 * @version 1.0
 * @editors Claudio Santoro
 */
class Colors
{
    /**
     * Foreground Colors
     *
     * @var array
     */
    private $foreground_colors = [];

    /**
     * Background Colors
     *
     * @var array
     */
    private $background_colors = [];

    /**
     * Colors constructor.
     */
    public function __construct()
    {
        // Set up shell colors
        $this->foreground_colors['black'] = '0;30';
        $this->foreground_colors['dark_gray'] = '1;30';
        $this->foreground_colors['blue'] = '0;34';
        $this->foreground_colors['light_blue'] = '1;34';
        $this->foreground_colors['green'] = '0;32';
        $this->foreground_colors['light_green'] = '1;32';
        $this->foreground_colors['cyan'] = '0;36';
        $this->foreground_colors['light_cyan'] = '1;36';
        $this->foreground_colors['red'] = '0;31';
        $this->foreground_colors['light_red'] = '1;31';
        $this->foreground_colors['purple'] = '0;35';
        $this->foreground_colors['light_purple'] = '1;35';
        $this->foreground_colors['brown'] = '0;33';
        $this->foreground_colors['yellow'] = '1;33';
        $this->foreground_colors['light_gray'] = '0;37';
        $this->foreground_colors['white'] = '1;37';

        $this->background_colors['black'] = '40';
        $this->background_colors['red'] = '41';
        $this->background_colors['green'] = '42';
        $this->background_colors['yellow'] = '43';
        $this->background_colors['blue'] = '44';
        $this->background_colors['magenta'] = '45';
        $this->background_colors['cyan'] = '46';
        $this->background_colors['light_gray'] = '47';
    }

    /**
     * Get the Current Instance of the ColorsCLI Class
     *
     * Singleton Method
     *
     * @return Colors
     */
    public static function getInstance()
    {
        static $instance = null;

        if (null === $instance) {
            /** @var Colors $instance */
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Return the Colored String
     *
     * @param string $string
     * @param null $foreground_color
     * @param null $background_color
     * @return string
     */
    public function getString($string, $foreground_color = null, $background_color = null)
    {
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($this->background_colors[$background_color])) {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        return $colored_string;
    }

    /**
     * Get All Foreground Colors
     *
     * @return array
     */
    public function getForegroundColors()
    {
        return array_keys($this->foreground_colors);
    }

    /**
     * Get All Background Colors
     *
     * @return array
     */
    public function getBackgroundColors()
    {
        return array_keys($this->background_colors);
    }
}
