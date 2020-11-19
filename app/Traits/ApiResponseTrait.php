<?php
namespace App\Traits;

interface StandardCode {
    const UNKNOWN_ERROR = 0000;
    /* ------- Request ------------------*/
    const INVALID_PARAMS = 1019;
    const ERROR_CODE_UNAUTHORIZED = 1001;
    const HTTP_ERROR_CODE_UNAUTHORIZED = 401;
    const HTTP_ERROR_BAD_REQUEST = 400;
    const ERROR_CODE_BAD_REQUEST = 1002;
    /* ------- OAUTH ------------------*/
    const LOGIN_OAUTH_FAILED = 6001;
}

trait ApiResponseTrait {

    protected function returnSuccess($data = null)
    {
        $return = ['success' => 1];
        if(!empty($data)){
            $return['data'] = $data;
        }
        return response()->json($return);
    }

    protected function returnFailed($code = StandardCode::UNKNOWN_ERROR,
                                    $data = null,
                                    $mess = null,
                                    $statusCode = 400){
        $return['success'] = 0;
        $return['code'] = $code;
        if(!empty($mess)) {
            $return['mess'] = $mess;
        }
        if(!empty($data)) {
            $return['data'] = $data;
        }
        return response()->json($return, $statusCode);
    }

    protected function returnError($error_code, $mess = null, $return_code = 400){
        if(empty($mess)){
            $mess = [__('messages.error_mess.server_error')];
        } else if ( !is_array($mess)){
            $mess = [$mess];
        }

        return response()->json([
            'success' => 0,
            'error_code' => $error_code,
            'msg' => $mess,
        ], $return_code);
    }

    protected function returnUnAuthorizedError($mess = null)
    {
        if(empty($mess)){
            $mess = [__('messages.error_mess.unauthorized')];
        } elseif (!is_array($mess)){
            $mess = [$mess];
        }

        return $this->returnError(StandardCode::ERROR_CODE_UNAUTHORIZED,
            $mess,
            StandardCode::HTTP_ERROR_CODE_UNAUTHORIZED);
    }

    protected function returnBadRequestError($mess = null)
    {
        if(empty($mess)){
            $mess = [__('messages.error_mess.bad_request')];
        } elseif (!is_array($mess)){
            $mess = [$mess];
        }

        return $this->returnError(StandardCode::ERROR_CODE_BAD_REQUEST,
            $mess,
            StandardCode::HTTP_ERROR_BAD_REQUEST);
    }


}
