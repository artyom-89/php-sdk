<?php

namespace Mbilling\Common\Exception;

class ForbiddenException extends ApiResponseException
{
    const HTTP_CODE = 403;
}