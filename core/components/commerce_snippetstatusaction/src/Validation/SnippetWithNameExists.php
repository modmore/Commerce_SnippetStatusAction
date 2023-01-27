<?php

namespace modmore\Commerce_SnippetStatusAction\Validation;

use modmore\Commerce\Admin\Widgets\Form\Validation\Rule;
use modmore\Commerce\Services\I18n;

class SnippetWithNameExists extends Rule
{
    /**
     * @var \modmore\Commerce\Adapter\AdapterInterface
     */
    private $adapter;

    public function __construct(\modmore\Commerce\Adapter\AdapterInterface $adapter)
    {

        $this->adapter = $adapter;
    }

    /**
     * @param $value
     * @return bool|string
     */
    public function isValid($value)
    {
        return $this->adapter->getCount('modSnippet', ['name' => $value]) === 1
            ? true
            : 'commerce_snippetstatusaction.snippet_nf';
    }
}
