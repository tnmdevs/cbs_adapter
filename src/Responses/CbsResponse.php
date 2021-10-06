<?php


namespace TNM\CBS\Responses;


use TNM\CBS\Utilities\ErrorMessageTransformer;

class CbsResponse
{
    protected ?string $response;
    private array $prefixes = ['soapenv:', 'bcs:', 'bcc:', 'cbs:', 'ars:', 'arc:'];
    protected string $responseNamespace;
    protected string $contentTag;
    protected array $content;

    public function __construct(string $responseNamespace, string $contentTag = '', ?string $response = '')
    {
        $this->response = $response;
        $this->responseNamespace = $responseNamespace;
        $this->contentTag = $contentTag;
        $this->content = $this->getContents();
    }

    public function customerDoesNotExist(): bool
    {
        return $this->status() == 20000003;
    }

    public function notSuccessful(): bool
    {
        return !$this->success();
    }

    public function success(): bool
    {
        return $this->status() == 0;
    }

    public function status(): string
    {

        return $this->valid() ? $this->array()['Body'][$this->responseNamespace]['ResultHeader']['ResultCode'] : 500;
    }

    private function valid(): bool
    {
        return isset($this->array()['Body'][$this->responseNamespace]['ResultHeader']);
    }

    public function array(): array
    {
        return $this->toArray($this->response);
    }

    private function toArray(?string $xml): array
    {
        if (!is_string($xml)) return array();

        $value = json_decode(json_encode(simplexml_load_string($this->stripPrefixes($xml))), true);
        return is_array($value) ? $value : array();
    }

    private function stripPrefixes(string $xml): string
    {
        foreach ($this->prefixes as $prefix) $xml = str_replace($prefix, '', $xml);
        return $xml;
    }

    public function getMessage(): string
    {
        $message = $this->valid()
            ? $this->array()['Body'][$this->responseNamespace]['ResultHeader']['ResultDesc']
            : 'Request failed. Please try again later';

        return (new ErrorMessageTransformer($message))->getMessage();
    }

    public function toString(): string
    {
        return $this->response;
    }

    public function getBody(): array
    {
        return $this->valid() ? $this->array()['Body'][$this->responseNamespace] : [];
    }

    public function hasContent(): bool
    {
        return isset($this->getBody()[$this->contentTag]);
    }

    public function hasNoContent(): bool
    {
        return !$this->hasContent();
    }

    public function getContents(): array
    {
        return $this->hasContent() ? $this->getBody()[$this->contentTag] : [];
    }

    public function isInsufficientBalanceError(): bool
    {
        return false;
    }
}
