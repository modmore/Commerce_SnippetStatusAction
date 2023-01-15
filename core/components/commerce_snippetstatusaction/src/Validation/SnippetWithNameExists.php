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
     * @param I18n|null $i18n
     * @param array|null $translations
     * @return bool|string
     */
    public function isValid($value, ?I18n $i18n = null, ?array $translations = [])
    {
        return $this->adapter->getCount('modSnippet', ['name' => $value]) === 1
            ? true
            : 'commerce_snippetstatusaction.snippet_nf';
    }
}
