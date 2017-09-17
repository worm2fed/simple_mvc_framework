<?php

namespace core;


use core\exceptions\ImageException;

/**
 * Class ImageHandler
 * @package core
 */
class ImageHandler {
    private $_image;
    private $_image_type;

    /**
     * Load image
     *
     * @param string $filename
     * @throws ImageException
     */
    public function __construct(string $filename)
    {
        $image_info = getimagesize($filename);
        $this->_image_type = $image_info[2];
        // Create image
        switch ($this->_image_type) {
            case IMAGETYPE_JPEG:
                $this->_image = imagecreatefromjpeg($filename);
                break;
            case IMAGETYPE_GIF:
                $this->_image = imagecreatefromgif($filename);
                break;
            case IMAGETYPE_PNG:
                $this->_image = imagecreatefrompng($filename);
                break;
            default:
                throw new ImageException("`$this->_image_type type does not supported`", E_USER_ERROR);
        }
    }

    /**
     * Save image to server
     *
     * @param string $filename
     * @param int $image_type
     * @param int $compression
     * @param int|null $permissions
     * @throws ImageException
     */
    public function save(string $filename, int $image_type = IMAGETYPE_JPEG, int $compression = 75,
                         int $permissions = null)
    : void {
        switch ($image_type) {
            case IMAGETYPE_JPEG:
                imagejpeg($this->_image, $filename, $compression);
                break;
            case IMAGETYPE_GIF:
                imagegif($this->_image, $filename);
                break;
            case IMAGETYPE_PNG:
                imagepng($this->_image, $filename);
                break;
            default:
                throw new ImageException("`$image_type type does not supported`", E_USER_ERROR);
        }
        // Set permissions
        if (!is_null($permissions)) {
            chmod($filename, $permissions);
        }
    }

    /**
     * Show image without saving
     *
     * @param int $image_type
     * @throws ImageException
     */
    public function output(int $image_type = IMAGETYPE_JPEG)
    : void {
        switch ($image_type) {
            case IMAGETYPE_JPEG:
                imagejpeg($this->_image);
                break;
            case IMAGETYPE_GIF:
                imagegif($this->_image);
                break;
            case IMAGETYPE_PNG:
                imagepng($this->_image);
                break;
            default:
                throw new ImageException("`$image_type type does not supported`", E_USER_ERROR);
        }
    }

    /**
     * Get width
     *
     * @return int
     */
    function getWidth()
    : int {
        return imagesx($this->_image);
    }

    /**
     * Get height
     *
     * @return int
     */
    function getHeight()
    : int {
        return imagesy($this->_image);
    }

    /**
     * Resize height
     *
     * @param int $height
     */
    function resizeToHeight(int $height)
    : void {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    /**
     * Resize width
     *
     * @param int $width
     */
    function resizeToWidth(int $width)
    : void {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    /**
     * Scale by percent
     *
     * @param int $scale
     */
    function scale(int $scale)
    : void {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width, $height);
    }

    /**
     * Resize width and height
     *
     * @param int $width
     * @param int $height
     */
    function resize(int $width, int $height)
    : void {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->_image, 0, 0, 0, 0, $width, $height,
            $this->getWidth(), $this->getHeight());
        $this->_image = $new_image;
    }
}
