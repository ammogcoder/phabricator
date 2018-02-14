<?php

abstract class PhabricatorDatasourceEngineExtension extends Phobject {

  abstract public function newQuickSearchDatasources();

  final public static function getAllQuickSearchDatasources() {
    $extensions = id(new PhutilClassMapQuery())
      ->setAncestorClass(__CLASS__)
      ->execute();

    $datasources = array();
    foreach ($extensions as $extension) {
      $datasources[] = $extension->newQuickSearchDatasources();
    }

    return array_mergev($datasources);
  }
}
