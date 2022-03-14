<?php


namespace TNM\CBS\Services;

use TNM\CBS\Responses\CbsResponse;

abstract class CBSBaseService
{
    private array $doNotSanitize=[
        'username',
        'password',
        'voucher',
        'properties'
    ];
    abstract protected function getRequestStubPath(): string;

    abstract protected function getResponseNamespace(): string;

    abstract protected function getRequestEndpoint(): string;

    protected function getContentTag(): string
    {
        return '';
    }

    protected function sanitize(string $placeholder, ?string $value): string
    {
        if(in_array($placeholder,$this->doNotSanitize)) return $value;

        if(preg_match('/^(comment)/',$placeholder)) return $value;

        return $value?preg_replace($this->getReplacePattern($placeholder), '', $value):'';
    }

    protected function getReplacePattern(string $pattern): string
    {
        $patterns = [
            'email' => '/[^ A-Za-z0-9@.\-]/',
            'normal' => '/[^ A-Za-z0-9._\-]/'
        ];

        return $patterns[$pattern] ?? $patterns['normal'];
    }

    protected function validate(string $placeholder, ?string $value): string
    {
        $validations = [
            'email' => 'is_valid_email'
        ];

        if(isset($validations[$placeholder]) && function_exists($validations[$placeholder])){
            return call_user_func($validations[$placeholder], $value) ? $value : '';
        }
        return  $value;
    }

    protected function getRequestBody(array $attributes): string
    {
        $stub = file_get_contents(package_path($this->getRequestStubPath()));

        $attributes = array_merge([
            'username' => config('cbs.username'),
            'password' => config('cbs.password')
        ], $attributes);

        foreach ($attributes as $placeholder => $value) {
                 $value = $this->validate($placeholder, $this->sanitize($placeholder, $value));

            $stub = str_replace(sprintf('{{%s}}', $placeholder), $value, $stub);
        }

        return $stub;
    }

    abstract public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}
