<?php

namespace Mbilling\Common\Exception;

class UnauthorizedException extends ApiResponseException
{
    const HTTP_CODE = 401;
}