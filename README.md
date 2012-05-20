Silex-Twig-Simple-Path-Extension
================================

This is a simple twig extension for silex to generate urls

Usage
```
require_once __DIR__ . '/silex.phar';

$app = new Silex\Application();
$app['debug'] = true;
$app['autoloader']->registerNamespaces(array('Toranj'   => __DIR__.'/vendor'));
$app->register(
    new Silex\Provider\TwigServiceProvider(),
    array(
         'twig.path' => __DIR__ . '/views',
         'twig.class_path' => __DIR__ . '/vendor/twig/lib',
    )
);

/* @var Twig_Environment $twig */
$twig = $app['twig'];
$twig->addExtension(new \Toranj\Twig\Extension\ToranjExtension($app));

$app->get('/', function() use (&$app)
    {
        return $app['twig']->render('index.html.twig', array());
    });

$app->run();
```

And then, in your twig file:
```
{{path('homepage')}}
```
