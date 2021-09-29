<?php


namespace TNM\CBS\Services;


use Illuminate\Support\Facades\Event;
use TNM\CBS\Events\CbsRequestEvent;
use TNM\CBS\Responses\CbsResponse;

abstract class CbsFakeService extends CBSBaseService
{
    protected function getRequestEndpoint(): string
    {
        return '';
    }
    protected function getContentTag(): string
    {
        return '';
    }

    private function getFilePath(): string
    {
        $namespace = explode("\\", get_class($this));
        $baseServiceDepth = 3;
        $pathLength = $baseServiceDepth + 1;
        return implode('/', array_slice($namespace, $baseServiceDepth, count($namespace) - $pathLength));
    }

    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse
    {
        $attributes = array_merge($attributes, ['trans_id' => trans_id()]);
        $requestBody = $this->getRequestBody($attributes);
        Event::dispatch(new CbsRequestEvent(['payload' => $attributes, 'body' => $requestBody], class_basename(static::class)));

        return new $responseClass(
            $this->getResponseNamespace(),
            $this->getContentTag(),
            file_get_contents(sprintf('%s/%s/response.xml', __DIR__, $this->getFilePath()))
        );
    }
}
