<?php


namespace TNM\CBS\Services;


use Illuminate\Support\Facades\Event;
use TNM\CBS\Events\CbsRequestEvent;
use TNM\CBS\Responses\CbsResponse;

abstract class CbsFakeService
{
    abstract protected function getResponseNamespace(): string;

    protected function getContentTag(): string
    {
        return '';
    }

    abstract protected function getRequestStubPath(): string;


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
