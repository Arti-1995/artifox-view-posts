<?php


namespace artifox\ViewPosts\Core;


use artifox\ViewPosts\Helpers\View;


class Shortcode implements \artifox\ViewPosts\Interfaces\ShortcodeInterface
{
    /**
     * @var string
     */
    public string $shortcodeName;

    /**
     * @var string
     */
    public string $configId;

    /**
     * @var array
     */
    public array $data;

    protected string $shortcodeID = '';

    /**
     * @inheritDoc
     */
    public function render($atts, $content)
    {
        $attributes = isset($atts) && !empty($atts) ? $atts : [];
        $this->data = $this->setData($attributes, $content);
        return View::render('shortcodes/' . $this->shortcodeName, $this->data);
    }

    /**
     * @inheritDoc
     */
    public function setData(array $atts = [], string $content = ''): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getShortcodeName(): string
    {
        return $this->shortcodeName;
    }

    public function setShortcodeID(string $shortcodeID): void {
        $this->shortcodeID = $shortcodeID;
    }

    public function getShortcodeID(): string {
        return $this->shortcodeID;
    }

    protected function generateIDs(): array {
        if (!$shortcodeID = $this->getShortcodeID()) return [];

        return [
            'wrapper_id' => $shortcodeID . 'WrapperID',
            'box_id' => $shortcodeID . 'BoxID',
            'play_btn_id' => $shortcodeID . 'PlayButtonID',
        ];
    }
}