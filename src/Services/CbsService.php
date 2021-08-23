<?php


namespace TNM\CBS\Services;


use Exception;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use TNM\CBS\Events\CbsExceptionEvent;
use TNM\CBS\Events\CbsRequestEvent;
use TNM\CBS\Events\CbsResponseEvent;
use TNM\CBS\Responses\CbsResponse;

abstract class CbsService
{
    abstract protected function getRequestStubPath(): string;

    abstract protected function getResponseNamespace(): string;

    abstract protected function getRequestEndpoint(): string;

    protected function getContentTag(): string
    {
        return '';
    }

    private function getRequestBody(array $attributes): string
    {
        $stub = file_get_contents(package_path($this->getRequestStubPath()));

        $attributes = array_merge([
            'username' => config('cbs.username'),
            'password' => config('cbs.password')
        ], $attributes);

        foreach ($attributes as $placeholder => $value)
            $stub = str_replace(sprintf('{{%s}}', $placeholder), $value, $stub);

        return $stub;
    }

    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse
    {

        $attributes = array_merge($attributes, ['trans_id' => trans_id()]);
        $requestBody = $this->getRequestBody($attributes);
        Event::dispatch(new CbsRequestEvent(['payload' => $attributes, 'body' => $requestBody], class_basename(static::class)));

        try {

            $response = Http::withBody($requestBody, 'text/xml')
                ->timeout(config('cbs.timeout'))
                ->post(sprintf('%s/%s', config('cbs.base_url'), $this->getRequestEndpoint()));

            $cbsResponse = new $responseClass($this->getResponseNamespace(), $this->getContentTag(), $response->body());
            Event::dispatch(new CbsResponseEvent($attributes, $cbsResponse));
            return $cbsResponse;
        } catch (Exception $exception) {
            Event::dispatch(new CbsExceptionEvent($attributes, $exception));
            return new $responseClass($this->getResponseNamespace());
        }
    }
}
