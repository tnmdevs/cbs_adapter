<?php


namespace TNM\CBS\Utilities;


class ErrorMessageTransformer
{
    private ?string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        $this->formatMessage();
        return CBS::ERRORS_MAP[$this->message] ?? $this->message;
    }

    private function formatMessage(): void
    {
        $message = preg_replace('/(CBS\d+)|(\d+)|(C_\d+)/', '', $this->message);
        $this->message = str_contains($this->message, ': ') ? $this->getHumanizedMessage($message) : $message;
    }

    private function getHumanizedMessage($message)
    {
        $parts = explode(': ', $message, 2);
        return $parts[1];
    }
}