<?php namespace Dashboard\Api;


use BaseController;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HTTPResponse;

class ApiController extends \Controller {

    /**
     * The HTTP response code (using the Symfony\Component\HttpFoundation\Response class)
     * @var int
     */
    protected $statusCode = HTTPResponse::HTTP_OK;

    protected $entityType = 'Record';


    function __construct()
    {
        // is this right?
        $this->beforeFilter('auth');
    }

    /**
     * Gets the HTTP code
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the status code
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Gets the type of record, e.g. 'Contact'
     * @return string
     */
    public function getEntityType()
    {
        return $this->entityType;
    }

    /**
     * Sets the type of record, e.g. 'Contact'
     * @param string $entityType
     */
    public function setEntityType($entityType)
    {
        $this->entityType = $entityType;
    }

    /**
     * Returns a response in an APIy kinda way
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Responds with HTTP code 201
     * @param bool $message
     * @return mixed
     */
    public function respondCreated($message = FALSE)
    {
        if ( ! $message) $message = $this->getEntityType() . ' created';

        return $this->setStatusCode(HTTPResponse::HTTP_CREATED)->respond([
            'status' => 'success',
            'message' => $message
        ]);
    }

    /**
     * Responds with HTTP code 202
     * @param bool $message
     * @return mixed
     */
    public function respondUpdated($message = FALSE)
    {
        if ( ! $message) $message = $this->getEntityType() . ' Updated';

        return $this->setStatusCode(HTTPResponse::HTTP_ACCEPTED)->respond([
            'status' => 'success',
            'message' => $message
        ]);
    }

    /**
     * Returns a 404 error
     * @param bool|string $message
     * @return mixed
     */
    public function respondNotFound($message = FALSE)
    {
        if ( ! $message) $message = $this->getEntityType() . ' Not Found!';

        return $this->setStatusCode(HTTPResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Returns a readable response, with a key of 'error'
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }



    /**
     * Failed validation
     * @param string $message
     * @return mixed
     */
    public function respondValidationFailed($message = 'Failed Validation!')
    {
        return $this->setStatusCode(HTTPResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * Responds with an internal error (good for when an exception is thrown)
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(HTTPResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Responds explaining the request wasn't written correctly
     * @param string $message
     * @return mixed
     */
    public function respondUserError($message = 'Request not formed well')
    {
        return $this->setStatusCode(HTTPResponse::HTTP_BAD_REQUEST)->respondWithError($message);
    }




}