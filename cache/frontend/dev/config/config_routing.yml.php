<?php
// auto-generated by sfRoutingConfigHandler
// date: 2009/10/21 18:23:15
$map = array();
$map['homepage'] = new sfRoute('/', array (
  'module' => 'default',
  'action' => 'index',
), array (
), array (
  'suffix' => '',
  'variable_prefixes' => 
  array (
    0 => ':',
  ),
  'segment_separators' => 
  array (
    0 => '/',
    1 => '.',
  ),
  'variable_regex' => '[\\w\\d_]+',
  'text_regex' => '.+?',
  'generate_shortest_url' => true,
  'extra_parameters_as_query_string' => true,
  'load_configuration' => true,
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '1',
  'logging' => '1',
  'variable_prefix_regex' => '(?:\\:)',
  'segment_separators_regex' => '(?:/|\\.)',
  'variable_content_regex' => '[^/\\.]+',
));
$map['homepage']->setCompiledData(array (
  'tokens' => 
  array (
    0 => 
    array (
      0 => 'separator',
      1 => '',
      2 => '/',
      3 => NULL,
    ),
    1 => 
    array (
      0 => 'separator',
      1 => '/',
      2 => '/',
    ),
  ),
  'default_parameters' => 
  array (
  ),
  'default_options' => 
  array (
    'load_configuration' => true,
    'suffix' => '',
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
  ),
  'options' => 
  array (
    'suffix' => '',
    'variable_prefixes' => 
    array (
      0 => ':',
    ),
    'segment_separators' => 
    array (
      0 => '/',
      1 => '.',
    ),
    'variable_regex' => '[\\w\\d_]+',
    'text_regex' => '.+?',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
    'load_configuration' => true,
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'variable_prefix_regex' => '(?:\\:)',
    'segment_separators_regex' => '(?:/|\\.)',
    'variable_content_regex' => '[^/\\.]+',
  ),
  'pattern' => '/',
  'regex' => '#^

/$#x',
  'variables' => 
  array (
  ),
  'defaults' => 
  array (
    'module' => 'default',
    'action' => 'index',
  ),
  'requirements' => 
  array (
  ),
  'suffix' => '/',
));
$map['default_index'] = new sfRoute('/:module', array (
  'action' => 'index',
), array (
  'module' => '[^/\\.]+',
), array (
  'suffix' => '',
  'variable_prefixes' => 
  array (
    0 => ':',
  ),
  'segment_separators' => 
  array (
    0 => '/',
    1 => '.',
  ),
  'variable_regex' => '[\\w\\d_]+',
  'text_regex' => '.+?',
  'generate_shortest_url' => true,
  'extra_parameters_as_query_string' => true,
  'load_configuration' => true,
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '1',
  'logging' => '1',
  'variable_prefix_regex' => '(?:\\:)',
  'segment_separators_regex' => '(?:/|\\.)',
  'variable_content_regex' => '[^/\\.]+',
));
$map['default_index']->setCompiledData(array (
  'tokens' => 
  array (
    0 => 
    array (
      0 => 'separator',
      1 => '',
      2 => '/',
      3 => NULL,
    ),
    1 => 
    array (
      0 => 'variable',
      1 => '/',
      2 => ':module',
      3 => 'module',
    ),
  ),
  'default_parameters' => 
  array (
  ),
  'default_options' => 
  array (
    'load_configuration' => true,
    'suffix' => '',
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
  ),
  'options' => 
  array (
    'suffix' => '',
    'variable_prefixes' => 
    array (
      0 => ':',
    ),
    'segment_separators' => 
    array (
      0 => '/',
      1 => '.',
    ),
    'variable_regex' => '[\\w\\d_]+',
    'text_regex' => '.+?',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
    'load_configuration' => true,
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'variable_prefix_regex' => '(?:\\:)',
    'segment_separators_regex' => '(?:/|\\.)',
    'variable_content_regex' => '[^/\\.]+',
  ),
  'pattern' => '/:module',
  'regex' => '#^
/(?P<module>[^/\\.]+)
$#x',
  'variables' => 
  array (
    'module' => ':module',
  ),
  'defaults' => 
  array (
    'action' => 'index',
  ),
  'requirements' => 
  array (
    'module' => '[^/\\.]+',
  ),
  'suffix' => '',
));
$map['default'] = new sfRoute('/:module/:action/*', array (
), array (
  'module' => '[^/\\.]+',
  'action' => '[^/\\.]+',
), array (
  'suffix' => '',
  'variable_prefixes' => 
  array (
    0 => ':',
  ),
  'segment_separators' => 
  array (
    0 => '/',
    1 => '.',
  ),
  'variable_regex' => '[\\w\\d_]+',
  'text_regex' => '.+?',
  'generate_shortest_url' => true,
  'extra_parameters_as_query_string' => true,
  'load_configuration' => true,
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '1',
  'logging' => '1',
  'variable_prefix_regex' => '(?:\\:)',
  'segment_separators_regex' => '(?:/|\\.)',
  'variable_content_regex' => '[^/\\.]+',
));
$map['default']->setCompiledData(array (
  'tokens' => 
  array (
    0 => 
    array (
      0 => 'separator',
      1 => '',
      2 => '/',
      3 => NULL,
    ),
    1 => 
    array (
      0 => 'variable',
      1 => '/',
      2 => ':module',
      3 => 'module',
    ),
    2 => 
    array (
      0 => 'separator',
      1 => '',
      2 => '/',
      3 => NULL,
    ),
    3 => 
    array (
      0 => 'variable',
      1 => '/',
      2 => ':action',
      3 => 'action',
    ),
    4 => 
    array (
      0 => 'separator',
      1 => '',
      2 => '/',
      3 => NULL,
    ),
    5 => 
    array (
      0 => 'text',
      1 => '/',
      2 => '*',
      3 => NULL,
    ),
  ),
  'default_parameters' => 
  array (
  ),
  'default_options' => 
  array (
    'load_configuration' => true,
    'suffix' => '',
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
  ),
  'options' => 
  array (
    'suffix' => '',
    'variable_prefixes' => 
    array (
      0 => ':',
    ),
    'segment_separators' => 
    array (
      0 => '/',
      1 => '.',
    ),
    'variable_regex' => '[\\w\\d_]+',
    'text_regex' => '.+?',
    'generate_shortest_url' => true,
    'extra_parameters_as_query_string' => true,
    'load_configuration' => true,
    'default_module' => 'default',
    'default_action' => 'index',
    'debug' => '1',
    'logging' => '1',
    'variable_prefix_regex' => '(?:\\:)',
    'segment_separators_regex' => '(?:/|\\.)',
    'variable_content_regex' => '[^/\\.]+',
  ),
  'pattern' => '/:module/:action/*',
  'regex' => '#^
/(?P<module>[^/\\.]+)
/(?P<action>[^/\\.]+)
(?:(?:/(?P<_star>.*))?
)?
$#x',
  'variables' => 
  array (
    'module' => ':module',
    'action' => ':action',
  ),
  'defaults' => 
  array (
  ),
  'requirements' => 
  array (
    'module' => '[^/\\.]+',
    'action' => '[^/\\.]+',
  ),
  'suffix' => '',
));
return $map;
