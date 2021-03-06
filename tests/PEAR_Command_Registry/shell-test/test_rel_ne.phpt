--TEST--
shell-test command, rel ne
--SKIPIF--
<?php
if (!getenv('PHP_PEAR_RUNTESTS')) {
    echo 'skip';
}
?>
--FILE--
<?php

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$reg = $config->getRegistry();
$pkg = new PEAR_PackageFile($config);
$info = $pkg->fromPackageFile(dirname(__FILE__) . DIRECTORY_SEPARATOR .
    DIRECTORY_SEPARATOR . 'packagefiles' . DIRECTORY_SEPARATOR . 'package2.xml',
    PEAR_VALIDATE_NORMAL);
$reg->addPackage2($info);
$e = $command->run('shell-test', array(), array('PEAR', 'ne', '1.3.9'));
$phpunit->assertNoErrors('ok 1');
$e = $command->run('shell-test', array(), array('PEAR', 'ne', '1.4.0a2'));
$phpunit->assertNoErrors('ok 2');
echo 'tests done';
?>
--CLEAN--
<?php
require_once dirname(dirname(__FILE__)) . '/teardown.php.inc';
?>
--RETURNS--
0
--EXPECT--
tests done
