<?php
/**
 * User: Hossein Bukhamseen
 */

namespace Toranj\Twig\Extension;

class PathExtension extends  \Twig_Extension {
    private $app;

    function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }


    public function getFunctions()
    {
        return array(
            'path'    => new \Twig_Function_Method($this, 'path'),
        );
    }

    public function path($path_name,$param=array()) {
        return $this->app['url_generator']->generate($path_name,$param);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'toranj_path';
    }
}
