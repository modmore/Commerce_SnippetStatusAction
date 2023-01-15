<?php
namespace modmore\Commerce_SnippetStatusAction\Modules;
use modmore\Commerce\Admin\Widgets\Form\DescriptionField;
use modmore\Commerce\Modules\BaseModule;
use modmore\Commerce\Dispatcher\EventDispatcher;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

class SnippetStatusAction extends BaseModule {

    public function getName()
    {
        $this->adapter->loadLexicon('commerce_snippetstatusaction:default');
        return $this->adapter->lexicon('commerce_snippetstatusaction');
    }

    public function getAuthor()
    {
        return 'modmore';
    }

    public function getDescription()
    {
        return $this->adapter->lexicon('commerce_snippetstatusaction.description');
    }

    public function initialize(EventDispatcher $dispatcher)
    {
        // Load our lexicon
        $this->adapter->loadLexicon('commerce_snippetstatusaction:default');

        // Add the xPDO package, so Commerce can detect the derivative classes
        $root = dirname(dirname(__DIR__));
        $path = $root . '/model/';
        $this->adapter->loadPackage('commerce_snippetstatusaction', $path);
    }

    public function getModuleConfiguration(\comModule $module)
    {
        $fields = [];

        $fields[] = new DescriptionField($this->commerce, [
            'description' => $this->adapter->lexicon('commerce_snippetstatusaction.instructions'),
        ]);

        return $fields;
    }
}
