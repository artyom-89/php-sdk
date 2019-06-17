<?php

namespace Mbilling\Common\Exception;

class InternalServerErrorException extends ApiResponseException
{
    const HTTP_CODE = 500;
}