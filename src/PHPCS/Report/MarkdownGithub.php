<?php

namespace Bluecadet\PHPCS\Report;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Reports\Report;

class MarkdownGithub implements MarkdownBase {

  /**
   * {@inheritdoc}
   */
  protected function formatTextColor($text, $color):string {
    // Return if we are not adding colors.
    if (!$this->colors) return $text;

    $string = '${\textsf{\color{' . $color . '}';

    $string .= str_replace(" ", ' \space ', $text);
    $string .= "}}$";

    return $string;
  }
}
