%module registrar_client

%{
#include "../client/registrar_client.h"

using namespace zero_cache;
%}

%include "std_string.i"

%typemap(in) Connection
{
    $1 = Connection(Z_STRVAL_PP($input));
}

%typemap(in) SocketType
{
    $1 = SocketType(Z_LVAL_PP($input));
}

%typemap(in) void* {
    $1 = Z_STRVAL_PP($input);
}

%typemap(out) void* {
    ZVAL_STRING($result, (char*)$1, 1)
}

%include "../client/registrar_client.h"
