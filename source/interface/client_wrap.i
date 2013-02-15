%module client_wrap

%{
#include "../client/client_wrap.h"

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

%typemap(in) std::string {
    $1 = Z_STRVAL_PP($input);
}

%typemap(out) std::string {
    ZVAL_STRING($result, $1.c_str(), 1)
}

%include "../client/client_wrap.h"
