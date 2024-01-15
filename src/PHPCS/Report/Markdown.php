<?php

namespace Bluecadet\PHPCS\Report;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Reports\Report;

class Markdown extends MarkdownBase {

  /**
   * {@inheritdoc}
   */
  protected function formatTextColor($text, $color):string {
    // Return if we are not adding colors.
    if (!$this->colors) return $text;

    $string = "<span style=\"color: " . $color . "\">";
    $string .= $text;
    $string .= "</span>";

    return $string;
  }
}
