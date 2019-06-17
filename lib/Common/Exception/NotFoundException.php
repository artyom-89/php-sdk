<?php

namespace Mbilling\Common\Exception;

class NotFoundException extends ApiResponseException
{
    const HTTP_CODE = 404;
}