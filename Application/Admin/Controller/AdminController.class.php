<?php
namespace Admin\Controller;

trait AdminController
{
    public function message(string $message, string $urlForward)
    {
        if (!empty($urlForward)) {
            $second = 5 * 1000;
            $message .= "<script>setTimeout(\"window.location.href ='{$urlForward}';\", $second);</script>";
        }

        $this->getResponse()->view()->assign('message', $message);
        $this->getResponse()->view()->assign('urlForward', $urlForward);
        $this->getResponse()->view()->display('Admin/message.tpl');
        exit();
    }
}
