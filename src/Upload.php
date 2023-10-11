<?php

namespace src;

class Upload
{
    /**
     * @var \src\Upload\Upload
     */
    public \src\Upload\Upload $upload;

    /**
     * @var string
     */
    public string $file;

    /**
     * @var \src\Upload
     */
    public static self $instance;

    /**
     * @param $name
     *
     * @return self
     */
    public static function getInstance($name): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self($name);
        }

        return self::$instance;
    }

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->upload = new \src\Upload\Upload($_FILES[$name]);
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function rename($name): static
    {
        $this->upload->file_new_name_body = $name;

        return $this;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function options(array $options): static
    {
        foreach ($options as $key => $option) {
            $this->upload->{$key} = $option;
        }

        return $this;
    }

    /**
     * @param $width
     * @param $height
     * @param true $crop
     *
     * @return $this
     */
    public function resize($width, $height = null, true $crop = true): static
    {
        $this->upload->image_resize = true;
        $this->upload->image_x = $width;
        if ($height) {
            $this->upload->image_y = $height;
            $this->upload->image_ratio_crop = $crop;
        } else {
            $this->upload->image_ratio_y = true;
        }

        return $this;
    }

    /**
     * @param $ext
     *
     * @return $this
     */
    public function convert($ext): static
    {
        $this->upload->image_convert = $ext;

        return $this;
    }

    /**
     * @param $text
     *
     * @return $this
     */
    public function watermark($text = null): static
    {
        if ($text) {
            $this->upload->image_unsharp = true;
            $this->upload->image_border = '0 0 16 0';
            $this->upload->image_border_color = '#000000';
            $this->upload->image_text = $text;
            $this->upload->image_text_font = 2;
            $this->upload->image_text_position = 'B';
            $this->upload->image_text_padding_y = 2;
        }

        return $this;
    }

    /**
     * @param $prefix
     *
     * @return $this
     */
    public function prefix($prefix): static
    {
        $this->upload->file_name_body_pre = $prefix . '_';

        return $this;
    }

    /**
     * @param $mimes
     *
     * @return $this
     */
    public function allowed($mimes): static
    {
        $this->upload->allowed = $mimes;

        return $this;
    }

    /**
     * @return $this
     */
    public function onlyImages(): static
    {
        $this->upload->allowed = ['image/*'];

        return $this;
    }

    /**
     * @param $path
     *
     * @return $this
     */
    public function to($path): Upload
    {
        $this->upload->image_convert = 'webp';
        $this->upload->file_new_name_body = $this->gen_uuid();
        if ($this->upload->uploaded) {
            $this->upload->process(PATH . '/public/upload/' . $path);
            if ($this->upload->processed) {
                $this->file = $this->upload->file_dst_name;
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->upload->file_dst_name;
    }

    /**
     * @return string
     */
    public function error(): string
    {
        $this->upload->process();

        return $this->upload->error;
    }

    public function __destruct()
    {
        $this->upload->clean();
    }

    /**
     * @return string
     */
    public function gen_uuid(): string
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * @param $path
     *
     * @return string
     */
    public function upload($path, &$error = false):string
    {
        $this->onlyImages();
        if ($errorMsg = $this->error()){
            $error = true;
            return $errorMsg;
        }
        return $this->to($path)->getFile();
    }
}