<?php
// src/VersionControl/GitCommandBundle/Entity/GitDiffLine.php

/*
 * This file is part of the GitCommandBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VersionControl\GitCommandBundle\Entity;

/**
 * Git Diff Line:.
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
class GitDiffLine
{
    const NOCHANGE = 0;

    const ADDED = 1;

    const REMOVED = 2;

    /**
     * @var int
     */
    protected $type;

    /**
     * The line content.
     *
     * @var string
     */
    protected $line;

    /**
     * The line number. Can be a number or string eg '...'.
     *
     * @var string
     */
    protected $lineNumber;

    /**
     * Sets line and line type.
     *
     * @param string $line The line content
     */
    public function __construct($line)
    {
        $this->line = $line;

        $firstCharacter = substr($line, 0, 1);

        if ($firstCharacter !== false) {
            if ($firstCharacter == '+') {
                $this->type = self::ADDED;
               // $type = Line::ADDED;
            } elseif ($firstCharacter == '-') {
                $this->type = self::REMOVED;
            } else {
                $this->type = self::NOCHANGE;
            }
        } else {
            $this->type = self::NOCHANGE;
        }
    }

    /**
     * Get Line type.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets line type.
     *
     * @param int $type
     *
     * @return \VersionControl\GitCommandBundle\Entity\GitDiffLine
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets line content.
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Gets line number. This can be a string.
     *
     * @return string
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Sets line content.
     *
     * @param string $lineNumber
     *
     * @return \VersionControl\GitCommandBundle\Entity\GitDiffLine
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;

        return $this;
    }
}
