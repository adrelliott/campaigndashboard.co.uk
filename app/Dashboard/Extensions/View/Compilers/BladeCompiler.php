<?php namespace Dashboard\View\Compilers;

use Illuminate\View\Compilers\BladeCompiler as BaseCompiler;
use Illuminate\View\Compilers\CompilerInterface;

class BladeCompiler extends BaseCompiler implements CompilerInterface {

    public function addToFooter($item)
    {
        $this->footer[] = $item;
    }

}