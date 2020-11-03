<?php

namespace FreeAbrams\WangEditor;

use Encore\Admin\Extension;

class WangEditor extends Extension
{
    public $name = 'WangEditor';
    protected $view = 'wang-editor';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Wangeditor',
        'path'  => 'WangEditor',
        'icon'  => 'fa-gears',
    ];
}
